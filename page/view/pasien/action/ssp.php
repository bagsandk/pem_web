<?php
ob_start();
session_start();
if (isset($_SESSION['iduser'])) {
	include '../../../config/db.php';
	$database = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	$primarykey = 'idpasien';
	$columns = array(
		'idpasien',
		'nik',
		'nmpasien',
		'tanggal_lahir',
		'jk',
		'agama',
		'pekerjaan',
		'alamat',
		'tempat_lahir',
	);
	$from = 'pasien';
	$primarykey = $primarykey != '' ? $primarykey . ',' : '';
	$sql = "SELECT {$primarykey} " . implode(',', $columns) . " FROM {$from} WHERE 1 = 1";
	if (isset($_GET['search']['value']) && $_GET['search']['value'] != '') {
		$search = $_GET['search']['value'];
		$where  = '';
		for ($i = 0; $i < count($columns); $i++) {
			$where .= $columns[$i] . ' LIKE "%' . $search . '%"';
			if ($i < count($columns) - 1) {
				$where .= " OR ";
			}
		}
		$sql .= " AND (" . $where . ")";
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
			$fields[] = $row['idpasien'];
			$fields[] = $row['nik'];
			$fields[] = $row['nmpasien'];
			$fields[] = $row['jk'];
			$fields[] = $row['tempat_lahir'] . ' / '.$row['tanggal_lahir'] ;
			$fields[] = $row['agama'];
			$fields[] = $row['pekerjaan'];
			$fields[] = $row['alamat'];
		}
		$datatable['data'][] = $fields;
	}
	$data->close();
	echo json_encode($datatable);
}
