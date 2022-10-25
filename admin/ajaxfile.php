
<?php
// include 'config.php';
require_once './dbcon.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($link,$_POST['search']['value']); // Search value

## Date search value
$searchByFromdate = mysqli_real_escape_string($link,$_POST['searchByFromdate']);
$searchByTodate = mysqli_real_escape_string($link,$_POST['searchByTodate']);
$searchByid = mysqli_real_escape_string($link,$_POST['searchByid']);

## Search 
$searchQuery = " ";
if($searchValue != ''){
    $searchQuery = " and (atten like '%".$searchValue."%') ";
}

// Date filter
if($searchByFromdate != '' && $searchByTodate != ''){
    $searchQuery .= " and (date between '".$searchByFromdate."' and '".$searchByTodate."' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($link,"select count(*) as allcount from attandance WHERE `id`='$searchByid'");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($link,"select count(*) as allcount from attandance WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Presence count
$sel = mysqli_query($link,"select count(*) as allcount from attandance WHERE `id`='$searchByid' AND `atten`='1'");
$records = mysqli_fetch_assoc($sel);
$totalPresent = $records['allcount'];

## Fetch records
$empQuery = "select * from attandance WHERE `id`='$searchByid' ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($link, $empQuery);
$data = array();
while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
    	"id"=>$row['id'],
    	"roll_num"=>$row['roll_num'],
    	"stu_name"=>$row['stu_name'],
    	"date"=>$row['date'],
    	"atten"=>$row['atten']
    );
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
	"iTotalPresent" => $totalPresent,
    "aaData" => $data
);

echo json_encode($response);
die; ?>