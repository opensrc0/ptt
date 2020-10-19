<?php
include "../config/config.php";
if (isset($_POST)) {
	$scenario  = trim($_POST['scenario']);
	$monthvalue = $_POST['monthValue'];
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
	}
	if(!empty($table)){
		$sql  = 'SELECT * FROM '.$table.'
        WHERE planning_date = "'.$monthvalue.'"';
        print_r($sql);
        exit;
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
				'data'=> [
					'supply_pttep_input' => '',
					'supply_got_other_input' => '',
					'supply_spot_lng_input' => '',
					'supply_lng_contract_input' => '',
					'supply_spot_lng_tp_input' => '',
					'supply_myanmar_import_input' => '',
					'supply_got_input' => '',
					'conversion_pttep' => '',
					'conversion_pttgsp_c1' => '',
					'conversion_lng_terminal_c1' => '',
					'transmission_pttgsp_c2' => '',
					'transmission_pttgsp_lpg' => '',
					'transmission_refinery' => '',
					'transmission_superheader' => '',
					'transmission_superheader_ngv' => '',
					'transmission_superheader_indusers' => '',
					'transmission_superheader_opg' => '',
					'sales_petchem_c2' => '',
					'sales_petchem_c3' => '',
					'sales_petchem_lpg' => '',
					'sales_petchem_ngl' => '',
					'sales_lpg_domestic' => '',
					'sales_opg' => '',
					'demand_gc_c2' => '',
					'demand_gc_c3' => '',
					'demand_gc_lpg' => '',
					'demand_gc_ngl' => '',
					'demand_lpg_or' => '',
					'demand_lpg_other' => '',
					'demand_c1_gpsc' => '',
					'demand_other' => '',
					'vf_summary_ptt' => '',
					'vf_summary_thailand' => '',
					'vf_pttep' => '',
					'vf_gsm' => '',
					'vf_gsp' => '',
					'vf_gtm' => '',
					'vf_pttor'=>'',
					'vf_gpsc'=>'',
					'vf_tbu'=>'',
					'vf_total_ptt'=>'',
					'vf_moe' => '',
					'vf_mof'=>'',
					'vf_power_consumers'=>'',
					'vf_total_thailand'=>'',
					'vn_total'=>'',
					'vn_other_feedback'=>'',
					'revision_name'=>'',
					'planning_date'=>''
				]
			);
		}
	}else{
		$return_data  = array(
				'status' =>true,
				'data'=> [
					'supply_pttep_input' => '',
					'supply_got_other_input' => '',
					'supply_spot_lng_input' => '',
					'supply_lng_contract_input' => '',
					'supply_spot_lng_tp_input' => '',
					'supply_myanmar_import_input' => '',
					'supply_got_input' => '',
					'conversion_pttep' => '',
					'conversion_pttgsp_c1' => '',
					'conversion_lng_terminal_c1' => '',
					'transmission_pttgsp_c2' => '',
					'transmission_pttgsp_lpg' => '',
					'transmission_refinery' => '',
					'transmission_superheader' => '',
					'transmission_superheader_ngv' => '',
					'transmission_superheader_indusers' => '',
					'transmission_superheader_opg' => '',
					'sales_petchem_c2' => '',
					'sales_petchem_c3' => '',
					'sales_petchem_lpg' => '',
					'sales_petchem_ngl' => '',
					'sales_lpg_domestic' => '',
					'sales_opg' => '',
					'demand_gc_c2' => '',
					'demand_gc_c3' => '',
					'demand_gc_lpg' => '',
					'demand_gc_ngl' => '',
					'demand_lpg_or' => '',
					'demand_lpg_other' => '',
					'demand_c1_gpsc' => '',
					'demand_other' => '',
					'vf_summary_ptt' => '',
					'vf_summary_thailand' => '',
					'vf_pttep' => '',
					'vf_gsm' => '',
					'vf_gsp' => '',
					'vf_gtm' => '',
					'vf_pttor'=>'',
					'vf_gpsc'=>'',
					'vf_tbu'=>'',
					'vf_total_ptt'=>'',
					'vf_moe' => '',
					'vf_mof'=>'',
					'vf_power_consumers'=>'',
					'vf_total_thailand'=>'',
					'vn_total'=>'',
					'vn_other_feedback'=>'',
					'revision_name'=>'',
					'planning_date'=>''
				]
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