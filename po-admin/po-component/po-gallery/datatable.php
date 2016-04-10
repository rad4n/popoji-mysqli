<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	header('location:404.php');
}else{
include_once '../../../po-library/po-database.php';
include_once '../../../po-library/po-function.php';

$tableroleaccess = new PoTable('user_role');
$currentRoleAccess = $tableroleaccess->findByAnd(id_level, $_SESSION['leveluser'], module, gallery);
$currentRoleAccess = $currentRoleAccess->current();

if($currentRoleAccess->read_access == "Y"){

    $aColumns = array( 'id_gallery', 'id_album', 'title', 'picture' );

    $sIndexColumn = "id_gallery";

    $sTable = "gallery";

    $gaSql['user']       = DATABASE_USER;
    $gaSql['password']   = DATABASE_PASS;
    $gaSql['db']         = DATABASE_NAME;
    $gaSql['server']     = DATABASE_HOST;

    $gaSql['link'] =  mysqli_connect( $gaSql['server'], $gaSql['user'], $gaSql['password'],$gaSql['db']  ) or
        die( 'Could not open connection to server' );

    //mysqli_select_db( $gaSql['db'], $gaSql['link'] ) or
        //die( 'Could not select database '. $gaSql['db'] );

    $sLimit = "";
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
        $sLimit = "LIMIT ".mysqli_real_escape_string($gaSql['link'], $_GET['iDisplayStart'] ).", ".
            mysqli_real_escape_string($gaSql['link'], $_GET['iDisplayLength'] );
    }

    $sOrder = "";
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = "ORDER BY  ";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
        {
            if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
            {
                $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
                    ".mysqli_real_escape_string($gaSql['link'], $_GET['sSortDir_'.$i] ) .", ";
            }
        }

        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == "ORDER BY" )
        {
            $sOrder = "";
        }
    }

    $sWhere = "";
    if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
    {
        $sWhere = "WHERE (";
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string($gaSql['link'], $_GET['sSearch'] )."%' OR ";
        }
        $sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ')';
    }

    for ( $i=0 ; $i<count($aColumns) ; $i++ )
    {
        if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
        {
            if ( $sWhere == "" )
            {
                $sWhere = "WHERE ";
            }
            else
            {
                $sWhere .= " AND ";
            }
            $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string($gaSql['link'],$_GET['sSearch_'.$i])."%' ";
        }
    }

    $sQuery = "
        SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
        FROM   $sTable
        $sWhere
        $sOrder
        $sLimit
    ";
    $rResult = mysqli_query($gaSql['link'], $sQuery ) or die(mysqli_connect_error());

    $sQuery = "
        SELECT FOUND_ROWS()
    ";
    $rResultFilterTotal = mysqli_query($gaSql['link'], $sQuery) or die(mysqli_connect_error());
    $aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
    $iFilteredTotal = $aResultFilterTotal[0];

    $sQuery = "
        SELECT COUNT(".$sIndexColumn.")
        FROM   $sTable
    ";
    $rResultTotal = mysqli_query(  $gaSql['link'],$sQuery ) or die(mysqli__connect_error());
    $aResultTotal = mysqli_fetch_array($rResultTotal);
    $iTotal = $aResultTotal[0];

    $output = array(
        "sEcho" => intval($_GET['sEcho']),
        "iTotalRecords" => $iTotal,
        "iTotalDisplayRecords" => $iFilteredTotal,
        "aaData" => array()
    );

	$no = 1;
    while ( $aRow = mysqli_fetch_array( $rResult ) )
    {
        $row = array();
		$tableroleaccess = new PoTable('user_role');
		$currentRoleAccess = $tableroleaccess->findByAnd(id_level, $_SESSION['leveluser'], module, 'gallery');
		$currentRoleAccess = $currentRoleAccess->current();
        for ( $i=1 ; $i<count($aColumns) ; $i++ )
        {
			$valid = $aRow['id_album'];
			$tablealbum = new PoTable('album');
			$currentAlbum = $tablealbum->findBy(id_album, $valid);
			$currentAlbum = $currentAlbum->current();
			if($currentRoleAccess->delete_access == "Y"){
				$tbldelete = "<a class='btn btn-xs btn-danger alertdel' id='$aRow[id_gallery]'><i class='fa fa-times'></i></a>";
			}
			$checkdata = "<div class='text-center'><input type='checkbox' id='titleCheckdel' /><input type='hidden' class='deldata' name='item[$no][deldata]' value='$aRow[id_gallery]' disabled></div>";
			$row[] = $checkdata;
			$row[] = $aRow['id_gallery'];
			$row[] = $currentAlbum->title;
			$row[] = $aRow['title'];
			$row[] = "<a href='../po-content/po-upload/$aRow[picture]'>Image</a>";
			$row[] = "<div class='text-center'><div class='btn-group btn-group-xs'>
					<a href='admin.php?mod=gallery&act=edit&id=$aRow[id_gallery]' class='btn btn-xs btn-default' id='$aRow[id_gallery]'><i class='fa fa-pencil'></i></a>
					$tbldelete
			</div></div>";
        }
        $output['aaData'][] = $row;
	$no++;
    }

    echo json_encode( $output );
}
}
?>