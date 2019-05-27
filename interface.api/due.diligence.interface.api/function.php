<?php
/*
 * http://api.netcube.com.au/projects/netcube/wamp/function.php?action=list_echosign_files_on_depot
 * http://api.netcube.com.au/projects/netcube/wamp/function.php?action=check_if_file_existed_on_depot&order_number=201509031628435868
 */
require_once '../../includes/class/MysqliDb.php';

/*		*/
$ftp_server 		= "14.137.150.88";
$output_array 		= array();
if ( isset($_REQUEST['action']) && !empty($_REQUEST['action']) ) {
	$action = trim($_REQUEST['action']);
}
else {
	$output_array['result']			= "NOK";
	$output_array['info'] 			= "Fail to get the mandatory parameter action";
	echo json_encode($output_array);
	die;
} 

$netcubehub_db 		= new MysqliDb('103.26.63.246', 'bankingn_jerry', 'u_b2z_y5wHEK', 'bankingn_netcubeHub');
if ($netcubehub_db == NULL) {
	$output_array['result']			= "NOK";
	$output_array['info'] 			= "Fail to connect NetCube database: " . $netcubehub_db->getLastError();
	echo json_encode($output_array);
	die;
}


if ($action == "list_echosign_files_on_depot") {
	$ftp_conn = ftp_connect($ftp_server);
	if (!$ftp_conn)
	{
		$output_array['result']		= "NOK";
		$output_array['info'] 		= "Fail to connect to FTP server: " . $ftp_server;
		echo json_encode($output_array);
		die;
	}
	
	$login 		= ftp_login($ftp_conn, "centernetcubecom", "MpwGvI7UfPe0");
	$file_list 	= ftp_nlist($ftp_conn, "/public_html/order_form/pdf/");
	// echo "<pre>"; var_dump($file_list); echo "</pre>"; die;
	// close this connection and file handler
	ftp_close($ftp_conn);
	
	$output_array['result']		= "OK";
	$output_array['info'] 		= sizeof($file_list) . " contract files have been found";
	$output_array['output']		= $file_list;
	echo json_encode($output_array);
}

else if ($action == "check_if_file_existed_on_depot") {
	if ( isset($_REQUEST['order_number']) && !empty($_REQUEST['order_number']) ) {
		$order_number 			= trim($_REQUEST['order_number']);
	}
	else {
		$output_array['result']	= "NOK";
		$output_array['info'] 	= "Fail to get the mandatory parameter order_number";
		echo json_encode($output_array);
		die;
	}
	
	$ftp_conn = ftp_connect($ftp_server);
	if (!$ftp_conn)
	{
		$output_array['result']		= "NOK";
		$output_array['info'] 		= "Fail to connect to FTP server: " . $ftp_server;
		echo json_encode($output_array);
		die;
	}

	$login 		= ftp_login($ftp_conn, "centernetcubecom", "MpwGvI7UfPe0");
	$file_list 	= ftp_nlist($ftp_conn, "/public_html/order_form/pdf/");
	// echo "<pre>"; var_dump($file_list); echo "</pre>"; die;
	// close this connection and file handler
	ftp_close($ftp_conn);
	
	$found 		= false;
	for ($i=0; $i < sizeof($file_list); $i++) {
		if ($file_list[$i] == $order_number . ".pdf") {
			$found = true;
			break;
		}
	}
	if ($found) {
		$output_array['result']		= "OK";
		$output_array['info'] 		= $order_number . ".pdf";
	}
	else {
		$output_array['result']		= "NO";
		$output_array['info'] 		= $order_number . ".pdf not found";
	}
	echo json_encode($output_array);
}


?>