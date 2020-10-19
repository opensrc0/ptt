<?php
	include "config/config.php";
	
	$planning_datesql  = 'SELECT DISTINCT planning_date FROM op_direct_master_base';
	$planning_datequery = mysqli_query($conn,$planning_datesql); 
	$planning_datebase_num_rows = mysqli_num_rows($planning_datequery);
	$selectedDate = '';

	if($planning_datebase_num_rows>0){
		$planning_date = '';
		
		for($i = 0; $i < $planning_datebase_num_rows; $i++) {
			
			$base_data1 = mysqli_fetch_assoc($planning_datequery);
			if($i === 0) {
				$selectedDate = $base_data1;
			}
			$planning_date .= '<option>'.$base_data1['planning_date'].'</option>';
			// $revision_name .= '<option>'.$base_data1['revision_name'].'</option>';
			// $months[$base_data1['op_direct_master_base_id']] =  $base_data1['months'];
		}
	}else{
		$base_data  = [];
	}

	// $selectedDate = mysqli_fetch_assoc($planning_datequery);



	$basesql = 'SELECT DISTINCT revision_name FROM op_direct_master_base where planning_date = "'.$selectedDate['planning_date'].'"';
	$basequery = mysqli_query($conn,$basesql); 
	$base_num_rows = mysqli_num_rows($basequery);

	if($base_num_rows>0){
		$revision_name = '';
		for($i = 0; $i < $base_num_rows; $i++) {
			$base_data1 = mysqli_fetch_assoc($basequery);
			$revision_name .= '<option>'.$base_data1['revision_name'].'</option>';
			// $months[$base_data1['op_direct_master_base_id']] =  $base_data1['months'];
		}
	}else{
		$base_data  = [];
	}

	// print_r($base_data);
	// printf($base_data['	']);
	// printf($base_data['revision_name']);
	// print_r($base_data['planning_date']);
	// print_r($base_data['months']);
	
	// exit;

	// $senario1sql  = $sql  = 'SELECT * FROM op_direct_master_senario_1
	// ORDER BY planning_date DESC
	// LIMIT 1';
	// $senario1query = mysqli_query($conn,$senario1sql); 
	// $senario1_num_rows = mysqli_num_rows($senario1query);
	// if($senario1_num_rows>0){
	// 	$senario1_data = mysqli_fetch_assoc($senario1query);
	// }else{
	// 	$senario1_data  = [];
	// }
	// print_r($senario1sql);


	// $senario2sql  = $sql  = 'SELECT * FROM op_direct_master_senario_2 ORDER BY planning_date DESC LIMIT 1';
	// $senario2query = mysqli_query($conn,$senario2sql); 
	// $senario2_num_rows = mysqli_num_rows($senario2query);
	// if($senario2_num_rows>0){
	// 	$senario2_data = mysqli_fetch_assoc($senario2query);
	// }else{
	// 	$senario2_data  = [];
	// }
	// print_r($senario2_data);

	// $senario3sql  = $sql  = 'SELECT * FROM op_direct_master_senario_3
	// ORDER BY planning_date DESC
	// LIMIT 1';
	// $senario3query = mysqli_query($conn,$senario3sql); 
	// $senario3_num_rows = mysqli_num_rows($senario3query);
	// if($senario3_num_rows>0){
	// 	$senario3_data = mysqli_fetch_assoc($senario3query);
	// }else{
	// 	$senario3_data  = [];
	// }
	// print_r($senario3_data);

	// $datesql  = $sql  = 'SELECT planning_date FROM op_direct_master_base
	// ORDER BY planning_date DESC
	// LIMIT 4';
	// $datequery = mysqli_query($conn,$datesql); 
	// $base_num_rows = mysqli_num_rows($datequery);
	// $date  =  [];

	// // printf($base_num_rows);
	// if($base_num_rows>0){
	// 	while($row = mysqli_fetch_assoc($datequery)) {
	// 	    $date[] = $row['planning_date'];
	// 	}
	// }else{
	// 	$base_data  = [];
	// }
	// $date = array_reverse($date);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="Interaction One Solution Pvt Ltd" />
	<link rel="icon" type="image/png" href="images/favicon.ico">
	<title>PTT - Gas Value Chain</title>
	<link rel="stylesheet" type="text/css" href="styles/index.css">
</head>
<body>
	<div class="main-wrapper">
		<div class="scenarios-wrapper flex flexJustifyBetween">
			<div class="scenario-filter-column">
				<a href="#" class="ptt-logo">
					<img src="images/logo-ptt.svg" alt="Logo" />
					<h1>gas value chain</h1>
				</a>
				<div class="flex mt_40">
					<div class="mr_8">
						<div class="white bold mb_4">PLANNING DATE</div>
						<select onchange="dateSelected(event)" id="planningDate">
							<?php echo $planning_date ?>	
						</select>
					</div>

					<div>
						<div class="white bold mb_4">REVISION NAME</div>
						<select id="revision_name" onchange="revisionNameSelected(event)">
							<?php echo $revision_name ?>
						</select>
					</div>
				</div>
				<div class="filter-wrapper">
					<form class="scenario-filter-form">
						<div class="nomination-filter-wrapper">
							<h4>choose a Nomination Scenario</h4>
							<div class="filter-list flex">
								<div class="form-checkbox">
									<input id="base-scenario" class="checkbox-custom scenario_check" type="checkbox" name="scenario" value="base-scenario" checked="" />
									<label for="base-scenario" class="checkbox-custom-label">
										<span>Base Scenario</span>
									</label>
								</div>
								<div class="form-checkbox">
									<input id="scenario-1" class="checkbox-custom scenario_check" type="checkbox" name="scenario" value="scenario-1">
									<label for="scenario-1" class="checkbox-custom-label">
										<span>Scenario 01</span>
									</label>
								</div>
								<div class="form-checkbox">
									<input id="scenario-2" class="checkbox-custom scenario_check" type="checkbox" name="scenario" value="scenario-2">
									<label for="scenario-2" class="checkbox-custom-label">
										<span>Scenario 02</span>
									</label>
								</div>
								<div class="form-checkbox">
									<input id="scenario-3" class="checkbox-custom scenario_check" type="checkbox" name="scenario" value="scenario-3">
									<label for="scenario-3" class="checkbox-custom-label">
										<span>Scenario 03</span>
									</label>
								</div>
							</div>
						</div>
						<div class="monthview-filter-wrapper">
							<h4>select month view</h4>
							<div class="filter-list flex">
								<div class="form-checkbox">
									<input id="m1" class="checkbox-custom" type="radio" name="scenario_date" value="M+1" checked="" />
									<label for="m1" class="checkbox-custom-label">
										<span>M+1</span>
									</label>
								</div>
								
								<div class="form-checkbox">
									<input id="m2" class="checkbox-custom" type="radio" name="scenario_date" value="M+2" />
									<label for="m2" class="checkbox-custom-label">
										<span>M+2</span>
									</label>
								</div>
								<div class="form-checkbox">
									<input id="m3" class="checkbox-custom" type="radio" name="scenario_date" value="M+3" />
									<label for="m3" class="checkbox-custom-label">
										<span>M+3</span>
									</label>
								</div>
							</div>
						</div>
						<!-- <div class="date-filter-wrapper flex">
							<div class="planning-date-wrapper">
								<h4>planning date</h4>
								<select class="planning-date-selection">
									<option>Month</option>
									<option>Month 1</option>
									<option>Month 2</option>
								</select>
							</div>
							<div class="revision-name-wrapper">
								<h4>revision name</h4>
								<select class="revision-name-selection">
									<option>OCT A</option>
									<option>OCT B</option>
									<option>OCT C</option>
								</select>
							</div>
						</div> -->
					</form>
				</div>
			</div>
			<div class="volume-nomination-scenario-column">
				<h3 class="scenario-main-title">Volume nomination scenarios</h3>
				<div class="volume-nomination-scenario-wrapper">
					<div class="scenario-chart-wrapper flex">
						<div class="scenario-chart-box active" id="base-scenario-chart">
							<div class="scenario-title-wrapper">	
								<h4 class="scenario-chart-title">base Case</h4>
								<p class="scenario-chart-description">
									Merit order based allocation
								</p>
							</div>
							<div class="scenario-chart-container">
								<div class="scenario-chart" id="base-chart"></div>
								<div class="scenario-chart-mask"></div>
							</div>
							<div class="scenario-chart-info-wrapper">
								<div class="scenario-info-title">Total</div>
								<div class="scenario-value" id="base-scenario-value"><span><?= (!empty($base_data))?$base_data['vn_total']:""; ?> MMCFD</span></div>
								<div class="scenario-info-title">Other Feedstock</div>
								<div class="scenario-value" id="other-feedstock-value"><span>#<?= (!empty($base_data))?$base_data['vn_other_feedback']:""; ?></span></div>
							</div>
						</div>	
						<div class="scenario-chart-box" id="scenario-1-chart">
							<div class="scenario-title-wrapper">	
								<h4 class="scenario-chart-title">Scenario 1</h4>
								<p class="scenario-chart-description">
									Merit order based allocation
								</p>
							</div>
							<div class="scenario-chart-container">
								<div class="scenario-chart" id="scenario1-chart"></div>
								<div class="scenario-chart-mask"></div>
								
							</div>
							<div class="scenario-chart-info-wrapper">
								<div class="scenario-info-title">Total</div>
								<div class="scenario-value" id="scenario-1-value"><span><?= (!empty($senario1_data))?$senario1_data['vn_total']:""; ?> MMCFD</span></div>
								<div class="scenario-info-title">Other Feedstock</div>
								<div class="scenario-value" id="other-feedstock-value"><span>#<?= (!empty($senario1_data))?$senario1_data['vn_other_feedback']:""; ?></span></div>
							</div>
						</div>	
						<div class="scenario-chart-box" id="scenario-2-chart">
							<div class="scenario-title-wrapper">	
								<h4 class="scenario-chart-title">Scenario 2</h4>
								<p class="scenario-chart-description">
									Merit order based allocation
								</p>
							</div>
							<div class="scenario-chart-container">
								<div class="scenario-chart" id="scenario2-chart"></div>
								<div class="scenario-chart-mask"></div>
							</div>
							<div class="scenario-chart-info-wrapper">
								<div class="scenario-info-title">Total</div>
								<div class="scenario-value" id="scenario-1-value"><span><?= (!empty($senario2_data))?$senario2_data['vn_total']:""; ?> MMCFD</span></div>
								<div class="scenario-info-title">Other Feedstock</div>
								<div class="scenario-value" id="other-feedstock-value"><span>#<?= (!empty($senario2_data))?$senario2_data['vn_other_feedback']:""; ?></span></div>
							</div>
						</div>	
						<div class="scenario-chart-box" id="scenario-3-chart">
							<div class="scenario-title-wrapper">	
								<h4 class="scenario-chart-title">Scenario 3</h4>
								<p class="scenario-chart-description">
									Merit order based allocation
								</p>
							</div>
							<div class="scenario-chart-container">
								<div class="scenario-chart" id="scenario3-chart"></div>
								<div class="scenario-chart-mask"></div>
							</div>
							<div class="scenario-chart-info-wrapper">
								<div class="scenario-info-title">Total</div>
								<div class="scenario-value" id="scenario-3-value"><span><?= (!empty($senario3_data))?$senario3_data['vn_total']:""; ?> MMCFD</span></div>
								<div class="scenario-info-title">Other Feedstock</div>
								<div class="scenario-value" id="other-feedstock-value"><span>#<?= (!empty($senario3_data))?$senario3_data['vn_other_feedback']:""; ?></span></div>
							</div>
						</div>	
					</div>
					<div class="chart-legend-wrapper">
						<ul>
							<li data-legend="#0FB2EF">
								<span></span>GoT PTTEP
							</li>
							<li data-legend="#877D4A">
								<span></span>GoT Others
							</li>
							<li data-legend="#474295">
								<span></span>SPOT LNG
							</li>
							<li data-legend="#303D6F">
								<span></span>LNG (Contract)
							</li>
							<li data-legend="#A1E5FF">
								<span></span>LNG (By 3rd Party)
							</li>
							<li data-legend="#34B233">
								<span></span>Myanmar Import
							</li>
						</ul>
					</div>
					<div class="view-detailed-info-wrapper">
						<div class="view-detail-toggle-button flex">
							<div class="chart-legend-wrapper">
								<ul>
									<li data-legend="#606060">
										<span></span>Operational maximum
									</li>
									<li data-legend="#FFCC40">
										<span></span>DCQ (or equivalent
									</li>
								</ul>
							</div>
							<div class="view-detail-toggle">
								<span>View Detailed Info</span> <img src="images/down-arrow.png" alt="Icon" />
							</div>
						</div>
						<div class="detailed-info-popup">
							<table class="detailed-info-table">
								<tr>
									<th>GoT PTTEP</th>
									<td data-value="<?= (!empty($base_data))?$base_data['supply_pttep_input']:""; ?>" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="<?= (!empty($senario1_data))?$senario1_data['supply_pttep_input']:""; ?>" data-dcq="1000" data-operation="2000"><span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="<?= (!empty($senario2_data))?$senario2_data['supply_pttep_input']:""; ?>" data-dcq="1000" data-operation="2000"><span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="<?= (!empty($senario3_data))?$senario3_data['supply_pttep_input']:""; ?>" data-dcq="1000" data-operation="2000"><span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
								</tr>
								<tr>
									<th>GoT Others</th>
									<td data-value="<?= (!empty($base_data))?$base_data['supply_got_other_input']:""; ?>" data-dcq="1491" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="<?= (!empty($senario1_data))?$senario1_data['supply_got_other_input']:""; ?>" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="<?= (!empty($senario2_data))?$senario2_data['supply_got_other_input']:""; ?>" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="<?= (!empty($senario3_data))?$senario3_data['supply_got_other_input']:""; ?>" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
								</tr>
								<tr>
									<th>Myanmar</th>
									<td data-value="<?= (!empty($base_data))?$base_data['supply_myanmar_import_input']:""; ?>" data-dcq="581" data-operation="1000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="<?= (!empty($senario1_data))?$senario1_data['supply_myanmar_import_input']:""; ?>" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="<?= (!empty($senario2_data))?$senario2_data['supply_myanmar_import_input']:""; ?>" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="<?= (!empty($senario3_data))?$senario3_data['supply_myanmar_import_input']:""; ?>" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
								</tr>
								<tr>
									<th>LNG Term</th>
									<td data-value="<?= (!empty($base_data))?$base_data['conversion_lng_terminal_c1']:""; ?>" data-dcq="750" data-operation="0">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="<?= (!empty($senario1_data))?$senario1_data['conversion_lng_terminal_c1']:""; ?>"" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="<?= (!empty($senario2_data))?$senario2_data['conversion_lng_terminal_c1']:""; ?>"" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="<?= (!empty($senario3_data))?$senario3_data['conversion_lng_terminal_c1']:""; ?>"" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
								</tr>
								<tr>
									<th>LNG Spot</th>
									<td data-value="<?= (!empty($senario3_data))?$senario3_data['supply_spot_lng_input']:""; ?>" data-dcq="100" data-operation="0">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="<?= (!empty($senario1_data))?$senario1_data['supply_spot_lng_input']:""; ?>" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="<?= (!empty($senario2_data))?$senario2_data['supply_spot_lng_input']:""; ?>" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="<?= (!empty($senario3_data))?$senario3_data['supply_spot_lng_input']:""; ?>" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
								</tr>
								<tr>
									<th>LNG <br/>
										<span>(By 3rd Party)</span></th>
										<td data-value="<?= (!empty($base_data))?$base_data['supply_spot_lng_tp_input']:""; ?>" data-dcq="0" data-operation="0">
											<span class="null-value">-</span>
											<span class="operational-maximum-value"></span>
											<span class="dcq-value"></span>
										</td>
										<td data-value="<?= (!empty($senario1_data))?$senario1_data['supply_spot_lng_tp_input']:""; ?>" data-dcq="1000" data-operation="2000">
											<span class="null-value">-</span>
											<span class="operational-maximum-value"></span>
											<span class="dcq-value"></span>
										</td>
										<td data-value="<?= (!empty($senario2_data))?$senario2_data['supply_spot_lng_tp_input']:""; ?>" data-dcq="1000" data-operation="2000">
											<span class="null-value">-</span>
											<span class="operational-maximum-value"></span>
											<span class="dcq-value"></span>
										</td>
										<td data-value="<?= (!empty($senario3_data))?$senario3_data['supply_spot_lng_tp_input']:""; ?>" data-dcq="1000" data-operation="2000">
											<span class="null-value">-</span>
											<span class="operational-maximum-value"></span>
											<span class="dcq-value"></span>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="valueflow-scenario-column">
					<h3 class="scenario-main-title">Value flow under various scenarios</h3>
					<div class="valueflow-scenario-wrapper">
						<div class="valueflow-tab-wrapper flex">
							<div class="valueflow-tab active" data-id="summary">Summary</div>
							<div class="valueflow-tab" data-id="ptt-group">PTT Group</div>
							<div class="valueflow-tab" data-id="thailand">Thailand</div>
						</div>
						<div class="valueflow-tab-content-wrapper">
							<div class="valueflow-tab-content" id="summary">
								<table class="valueflow-table">
									<thead>
										<tr>
											<th></th>
											<th>Base Case
												<p>
													Merit order based allocation
												</p>
											</th>
											<th>Scenario 1
												<p>
													Optimized case w/o use of carry forward
												</p>
											</th>
											<th>Scenario 2
												<p>
													Optimized case with use of carry forward
												</p>
											</th>
											<th>Scenario 3
												<p>
													Manual inputs based on meeting inputs
												</p>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>PTT Group</th>
											<td><?= (!empty($base_data))?$base_data['vf_total_ptt']:'0' ?></td>
											<td data-value="<?= (!empty($senario1_data))?$senario1_data['vf_total_ptt']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario2_data))?$senario2_data['vf_total_ptt']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario3_data))?$senario3_data['vf_total_ptt']:'0' ?>"><span class="valueflow-value"></span></td>
										</tr>
										<tr>
											<th>Thailand</th>
											<td><?= (!empty($base_data))?$base_data['vf_total_thailand']:'0' ?></td>
											<td data-value="<?= (!empty($senario1_data))?$senario1_data['vf_total_thailand']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario2_data))?$senario2_data['vf_total_thailand']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario3_data))?$senario3_data['vf_total_thailand']:'0' ?>"><span class="valueflow-value"></span></td>
										</tr>
									</tbody>
								</table>
							</div>

							<div class="valueflow-tab-content" id="ptt-group">
								<table class="valueflow-table">
									<thead>
										<tr>
											<th></th>
											<th>Base Case
												<p>
													Merit order based allocation
												</p>
											</th>
											<th>Scenario 1
												<p>
													Optimized case w/o use of carry forward
												</p>
											</th>
											<th>Scenario 2
												<p>
													Optimized case with use of carry forward
												</p>
											</th>
											<th>Scenario 3
												<p>
													Manual inputs based on meeting inputs
												</p>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>PTTEP</th>
											<td><?= (!empty($base_data))?$base_data['vf_pttep']:'0' ?></td>
											<td data-value="<?= (!empty($senario1_data))?$senario1_data['vf_pttep']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario2_data))?$senario2_data['vf_pttep']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario3_data))?$senario3_data['vf_pttep']:'0' ?>"><span class="valueflow-value"></span></td>
										</tr>
										<tr>
											<th>GSM</th>
											<td><?= (!empty($base_data))?$base_data['vf_gsm']:'0' ?></td>
											<td data-value="<?= (!empty($senario1_data))?$senario1_data['vf_gsm']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario2_data))?$senario2_data['vf_gsm']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario3_data))?$senario3_data['vf_gsm']:'0' ?>"><span class="valueflow-value"></span></td>
										</tr>
										<tr>
											<th>GSP</th>
											<td><?= (!empty($base_data))?$base_data['vf_gsp']:'0' ?></td>
											<td data-value="<?= (!empty($senario1_data))?$senario1_data['vf_gsp']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario2_data))?$senario2_data['vf_gsp']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario3_data))?$senario3_data['vf_gsp']:'0' ?>"><span class="valueflow-value"></span></td>
										</tr>
										<tr>
											<th>GTM</th>
											<td><?= (!empty($base_data))?$base_data['vf_gtm']:'0' ?></td>
											<td data-value="<?= (!empty($senario1_data))?$senario1_data['vf_gtm']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario2_data))?$senario2_data['vf_gtm']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario3_data))?$senario3_data['vf_gtm']:'0' ?>"><span class="valueflow-value"></span></td>
										</tr>
										<tr>
											<th>PTTGC</th>
											<td><?= (!empty($base_data))?$base_data['vf_pttgc']:'0' ?></td>
											<td data-value="<?= (!empty($senario1_data))?$senario1_data['vf_pttgc']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario2_data))?$senario2_data['vf_pttgc']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario3_data))?$senario3_data['vf_pttgc']:'0' ?>"><span class="valueflow-value"></span></td>
										</tr>
										<tr>
											<th>PTTOR</th>
											<td><?= (!empty($base_data))?$base_data['vf_pttor']:'0' ?></td>
											<td data-value="<?= (!empty($senario1_data))?$senario1_data['vf_pttor']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario2_data))?$senario2_data['vf_pttor']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario3_data))?$senario3_data['vf_pttor']:'0' ?>"><span class="valueflow-value"></span></td>
										</tr>
										<tr>
											<th>GPSC</th>
											<td><?= (!empty($base_data))?$base_data['vf_gpsc']:'0' ?></td>
											<td data-value="<?= (!empty($senario1_data))?$senario1_data['vf_gpsc']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario2_data))?$senario2_data['vf_gpsc']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario3_data))?$senario3_data['vf_gpsc']:'0' ?>"><span class="valueflow-value"></span></td>
										</tr>
										<tr>
											<th>TBU</th>
											<td><?= (!empty($base_data))?$base_data['vf_tbu']:'0' ?></td>
											<td data-value="<?= (!empty($senario1_data))?$senario1_data['vf_tbu']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario2_data))?$senario2_data['vf_tbu']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario3_data))?$senario3_data['vf_tbu']:'0' ?>"><span class="valueflow-value"></span></td>
										</tr>
										<tr>
											<th>Total</th>
											<td><?= (!empty($base_data))?$base_data['vf_total_ptt']:'0' ?></td>
											<td data-value="<?= (!empty($senario1_data))?$senario1_data['vf_total_ptt']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario2_data))?$senario2_data['vf_total_ptt']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario3_data))?$senario3_data['vf_total_ptt']:'0' ?>"><span class="valueflow-value"></span></td>
										</tr>
									</tbody>
								</table>
							</div>

							<div class="valueflow-tab-content" id="thailand">
								<table class="valueflow-table">
									<thead>
										<tr>
											<th></th>
											<th>Base Case
												<p>
													Merit order based allocation
												</p>
											</th>
											<th>Scenario 1
												<p>
													Optimized case w/o use of carry forward
												</p>
											</th>
											<th>Scenario 2
												<p>
													Optimized case with use of carry forward
												</p>
											</th>
											<th>Scenario 3
												<p>
													Manual inputs based on meeting inputs
												</p>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>MoE</th>
											<td><?= (!empty($base_data))?$base_data['vf_moe']:'0' ?></td>
											<td data-value="<?= (!empty($senario1_data))?$senario1_data['vf_moe']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario2_data))?$senario2_data['vf_moe']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario3_data))?$senario3_data['vf_moe']:'0' ?>"><span class="valueflow-value"></span></td>
										</tr>
										<tr>
											<th>MoF</th>
											<td><?= (!empty($base_data))?$base_data['vf_mof']:'0' ?></td>
											<td data-value="<?= (!empty($senario1_data))?$senario1_data['vf_mof']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario2_data))?$senario2_data['vf_mof']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario3_data))?$senario3_data['vf_mof']:'0' ?>"><span class="valueflow-value"></span></td>
										</tr>
										<tr>
											<th>Power Consumers</th>
											<td><?= (!empty($base_data))?$base_data['vf_power_consumers']:'0' ?></td>
											<td data-value="<?= (!empty($senario1_data))?$senario1_data['vf_power_consumers']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario2_data))?$senario2_data['vf_power_consumers']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario3_data))?$senario3_data['vf_power_consumers']:'0' ?>"><span class="valueflow-value"></span></td>
										</tr>
										<tr>
											<th>Total</th>
											<td><?= (!empty($base_data))?$base_data['vf_total_thailand']:'0' ?></td>
											<td data-value="<?= (!empty($senario1_data))?$senario1_data['vf_total_thailand']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario2_data))?$senario2_data['vf_total_thailand']:'0' ?>"><span class="valueflow-value"></span></td>
											<td data-value="<?= (!empty($senario3_data))?$senario3_data['vf_total_thailand']:'0' ?>"><span class="valueflow-value"></span></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="gas-chart-wrapper">
				<div class="gas-pipeline-image-wrapper">
					<img class="gas-pipeline-image" src="images/pipeline-oulined.svg" alt="Image" />
					<ul class="gas-pipeline-value-lists" id="supply-category">
						<li class="gas-pipeline-value supply-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b class="supply_pttep_input">1127 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value supply-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b class="supply_got_other_input">1691 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value supply-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b class="supply_spot_lng_input">100 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value supply-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b class="supply_lng_contract_input">650 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value supply-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b class="supply_spot_lng_tp_input">0 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value supply-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b class="supply_myanmar_import_input">681 </b>MMSCFD</span>
						</li>
					</ul>
					<ul class="gas-pipeline-value-lists" id="conversion-category">
						<li class="gas-pipeline-value conversion-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b class="supply_got_input">2918 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value conversion-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b class="conversion_pttgsp_c1">1867 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value conversion-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b class="conversion_lng_terminal_c1">686 </b>MMSCFD</span>
						</li>
					</ul>
					<ul class="gas-pipeline-value-lists" id="transmission-category">
						<li class="gas-pipeline-value transmission-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b class="transmission_pttgsp_c2">14,896 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value transmission-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b class="transmission_pttgsp_lpg">3330 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value transmission-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b class="transmission_refinery">452 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value transmission-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b class="transmission_superheader_ngv">140 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value transmission-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b class="transmission_superheader_indusers">720 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value transmission-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b class="transmission_superheader_opg">1693 </b>MMSCFD</span>
						</li>
					</ul>
					<ul class="gas-pipeline-value-lists" id="salessector-category">
						<li class="gas-pipeline-value salessector-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b class="sales_petchem_c2">7054 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value salessector-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b class="sales_petchem_c3">3448 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value salessector-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b class="sales_petchem_lpg">2993 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value salessector-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b class="demand_gc_c3">1491 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value salessector-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b class="sales_lpg_domestic">3782 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value salessector-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b class="sales_opg">2374 </b>MMSCFD</span>
						</li>
					</ul>
					<ul class="gas-pipeline-value-lists" id="demandendnode-category">
						<li class="gas-pipeline-value demandendnode-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b class="demand_lpg_or">1915 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value demandendnode-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b class="demand_lpg_other">1915 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value demandendnode-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b class="demand_c1_gpsc">475 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value demandendnode-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b class="demand_other">1899 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value demandendnode-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b class="vf_summary_ptt">1915 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value demandendnode-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b class="vf_summary_ptt">1915 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value demandendnode-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b class="vf_pttep">475 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value demandendnode-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b class="vf_gsm">1899 </b>MMSCFD</span>
						</li>
					</ul>
				</div>
				<div class="chart-category-background-wrapper">
					<ul class="chart-category-list flex">
						<li class="supply-label">Supply</li>
						<li class="conversion-label">Conversion</li>
						<li class="transmission-label">Transmission & Distribution</li>
						<li class="salessector-label">Sales Sector</li>
						<li class="demand-label">Demand End-Node</li>
					</ul>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="scripts/libs/jquery.min.js"></script>
		<script src="scripts/libs/highcharts.js"></script>
		<script type="text/javascript" src="scripts/index.js"></script>
	</body>
	</html>
	<script type="">

		var planningDate = document.querySelector("#planningDate").value;
		var revisionName = document.querySelector("#revision_name").value;
		var type = ['base-scenario'];
		var months = 'M+1';
		// $(document).ready(function(){
		// 	var monthValue = $("input[name=scenario_date]:checked").val();
		// 	getvaluesdata('base_scenario',monthValue);
		// 	$(document).on('click','.scenario_check',function(){
		// 		monthValue = $("input[name=scenario_date]:checked").val();
		// 		var checked_senario = "";
		// 		if($(this).is(':checked') ){
		// 			getvaluesdata($(this).val(), monthValue, 'scenario', planningDate, revisionName);
		// 		}else{
		// 			$('.scenario_check').each(function(){
		// 				if($(this).is(':checked') ){
		// 					checked_senario  = $(this).val();
		// 				}
		// 			})
		// 			getvaluesdata(checked_senario, monthValue, 'scenario', planningDate, revisionName);
		// 		}
		// 	})
		// 	$(document).on('change',"input[name=scenario_date]",function(){
		// 		var monthValue = $(this).val();
		// 		var checked_senario = "";
		// 		$('.scenario_check').each(function(){
		// 			if($(this).is(':checked') ){
		// 				checked_senario  = $(this).val();
		// 			}
		// 		})
		// 		getvaluesdata(checked_senario,monthValue);
		// 	})
		// })

		getvaluesdata  = function(planningDate, revisionName, months, type){
			$.ajax({
		        type      : 'POST',
		        url       : "<?= _URL ?>"+'ajax/get_value_data.php',
		        data      : {
					planningDate: planningDate,
					revisionName: revisionName, 
					months: months, 
					type: type
				},
		        dataType  : 'json'
		    })
		    .done(function(data){
		        if(data.status) {
					$.each(data.data,function(key,val){
						if(val.type === 'base-scenario') {
							baseCase(val.supply_pttep_input, 
								val.supply_got_other_input, 
								val.supply_spot_lng_input, 
								val.supply_lng_contract_input, 
								val.supply_spot_lng_tp_input, 
								val.supply_myanmar_import_input
							);
						}

						if(val.type === 'scenario-1') {
							senerio1(val.supply_pttep_input, 
								val.supply_got_other_input, 
								val.supply_spot_lng_input, 
								val.supply_lng_contract_input, 
								val.supply_spot_lng_tp_input, 
								val.supply_myanmar_import_input
							);
						}

						if(val.type === 'scenario-2') {
							senerio2(val.supply_pttep_input, 
								val.supply_got_other_input, 
								val.supply_spot_lng_input, 
								val.supply_lng_contract_input, 
								val.supply_spot_lng_tp_input, 
								val.supply_myanmar_import_input
							);
						}

						if(val.type === 'scenario-3') {
							senerio3(val.supply_pttep_input, 
								val.supply_got_other_input, 
								val.supply_spot_lng_input, 
								val.supply_lng_contract_input, 
								val.supply_spot_lng_tp_input, 
								val.supply_myanmar_import_input
							);
						}
					})
		        } else {
		        	$(".gas-pipeline-value-lists").each(function(){
		        		$(this).find('li').find('span').find('b').text("");
		        	})
		        }
		    })
		}

		getvaluesdata(planningDate, revisionName, months, type);

		function dateSelected(e) {
			planningDate = e.target.value;
			getvaluesdata(planningDate, revisionName, months, type);
		}

		function revisionNameSelected(e) {
			revisionName = e.target.value;
			getvaluesdata(planningDate, revisionName, months, type);
		}

		$(document).on('click','.scenario_check',function(){
			if($(this).is(':checked') ){
				type.push($(this).val());
			}else{
				// type.splish
				getvaluesdata(planningDate, revisionName, months, '');
			}
			getvaluesdata(planningDate, revisionName, months, [$(this).val()]);

		});

		$(document).on('change',"input[name=scenario_date]",function(){
			months = $(this).val();
			$('.scenario_check').each(function(){
				if($(this).is(':checked')){
					getvaluesdata(planningDate, revisionName, months, type);
				}
			})
		});
	</script>
