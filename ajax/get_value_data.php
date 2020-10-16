<?php
include "../config/config.php";
if (isset($_POST)) {
	$scenario  = trim($_POST['scenario']);
	switch ($scenario) {
		case 'base_scenario':
			$table  = 'op_direct_master_base';
		break;
		case 'scenario_1':
			$table  = 'op_direct_master_senario_1';
		break;
		case 'scenario_2':
			$table  = 'op_direct_master_senario_2';
		break;
		case 'scenario_3':
			$table  = 'op_direct_master_senario_3';
		break;
		default:
			$table  = 'op_direct_master_base';
		break;
	}
	$sql  = 'SELECT * FROM '.$table.'
	ORDER BY planning_date DESC
	LIMIT 1';
	$query = mysqli_query($conn,$sql); 
	$num_rows = mysqli_num_rows($query);
    if($num_rows>0)
	{
		$res=mysqli_fetch_assoc($query);
		//$users_id=$res['users_id'];
		$return_data  = array(
			'status' =>true,
			'data'=> $res
		);
		
	}
	else
	{
		$return_data  = array(
			'status' =>true,
			'data'=> []
		);
	}
	echo json_encode($return_data);
	
}else{
	$return_data  = array(
		'status' =>false,
		'message'=> 'method not found'
	);
	echo json_encode($return_data);
	exit();
}

?>