<?php
ob_start();
session_start();
if (isset($_SESSION['iduser'])) {
	include '../../../config/db.php';
	$database = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	$primarykey = 'iduser';
	$columns = array(
		'iduser',
		'username',
		'password',
		'name',
		'role'
	);
	$from = 'users';
	$primarykey = $primarykey != '' ? $primarykey . ',' : '';
	$sql = "SELECT {$primarykey} ".implode(',', $columns)." FROM {$from}";
	
	if (isset($_GET['search']['value']) && $_GET['search']['value'] != '') {
		$search = $_GET['search']['value'];
		$where  = '';
		for ($i = 0; $i < count($columns); $i++) {
			$where .= $columns[$i].' LIKE "%'.$search.'%"';
			if ($i < count($columns) -1) {
				$where .= " OR ";
			}
		}
		$sql .= " AND (".$where.")";
	}
	$sortColumn = isset($_GET['order'][0]['column']) ? $_GET['order'][0]['column'] : 0;
	$sortDir = isset($_GET['order'][0]['dir']) ? $_GET['order'][0]['dir'] : 'asc';
	$sortColumn = $columns[$sortColumn];
	$sql .= " ORDER BY {$sortColumn} {$sortDir}";
	$count = $database->query($sql);
	$totaldata = $count->num_rows;
	$count->close();
	$start  = isset($_GET['start']) ? $_GET['start'] : 0;
	$length = isset($_GET['length']) ? $_GET['length'] : 10;
	$sql .= " LIMIT {$start}, {$length}";
	$data = $database->query($sql);
	$datatable['draw'] = isset($_GET['draw']) ? $_GET['draw'] : 1;
	$datatable['recordsTotal'] = $totaldata;
	$datatable['recordsFiltered'] = $totaldata;
	$datatable['data'] = array();
	while ($row = $data->fetch_assoc()) {
		$fields = array();
		for ($i = 0; $i < count($columns); $i++) {
			$fields[0] = $row['iduser'];
			$fields[1] = $row['username'];
			$fields[2] = $row['iduser'];
			$fields[3] = $row['name'];
			$fields[4] = $row['role'];
			$fields[5] = $row['iduser'];
		}
		$datatable['data'][] = $fields;
	}
	$data->close();
	echo json_encode($datatable);
}
?>