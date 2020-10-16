<?php
	include "config/config.php";
	$basesql  = $sql  = 'SELECT * FROM op_direct_master_base
	ORDER BY planning_date DESC
	LIMIT 1';
	$basequery = mysqli_query($conn,$basesql); 
	$base_num_rows = mysqli_num_rows($basequery);
	if($base_num_rows>0){
		$base_data = mysqli_fetch_assoc($basequery);
	}else{
		$base_data  = [];
	}
	$senario1sql  = $sql  = 'SELECT * FROM op_direct_master_senario_1
	ORDER BY planning_date DESC
	LIMIT 1';
	$senario1query = mysqli_query($conn,$senario1sql); 
	$senario1_num_rows = mysqli_num_rows($senario1query);
	if($senario1_num_rows>0){
		$senario1_data = mysqli_fetch_assoc($senario1query);
	}else{
		$senario1_data  = [];
	}


	$senario2sql  = $sql  = 'SELECT * FROM op_direct_master_senario_2
	ORDER BY planning_date DESC
	LIMIT 1';
	$senario2query = mysqli_query($conn,$senario2sql); 
	$senario2_num_rows = mysqli_num_rows($senario2query);
	if($senario2_num_rows>0){
		$senario2_data = mysqli_fetch_assoc($senario2query);
	}else{
		$senario2_data  = [];
	}

	$senario3sql  = $sql  = 'SELECT * FROM op_direct_master_senario_3
	ORDER BY planning_date DESC
	LIMIT 1';
	$senario3query = mysqli_query($conn,$senario3sql); 
	$senario3_num_rows = mysqli_num_rows($senario3query);
	if($senario3_num_rows>0){
		$senario3_data = mysqli_fetch_assoc($senario3query);
	}else{
		$senario3_data  = [];
	}
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
				<div class="filter-wrapper">
					<form class="scenario-filter-form">
						<div class="nomination-filter-wrapper">
							<h4>choose a Nomination Scenario</h4>
							<div class="filter-list flex">
								<div class="form-checkbox">
									<input id="base-scenario" class="checkbox-custom scenario_check" type="checkbox" name="scenario" value="base_scenario" checked="" />
									<label for="base-scenario" class="checkbox-custom-label">
										<span>Base Scenario</span>
									</label>
								</div>
								<div class="form-checkbox">
									<input id="scenario-1" class="checkbox-custom scenario_check" type="checkbox" name="scenario" value="scenario_1">
									<label for="scenario-1" class="checkbox-custom-label">
										<span>Scenario 01</span>
									</label>
								</div>
								<div class="form-checkbox">
									<input id="scenario-2" class="checkbox-custom scenario_check" type="checkbox" name="scenario" value="scenario_2">
									<label for="scenario-2" class="checkbox-custom-label">
										<span>Scenario 02</span>
									</label>
								</div>
								<div class="form-checkbox">
									<input id="scenario-3" class="checkbox-custom scenario_check" type="checkbox" name="scenario" value="scenario_3">
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
									<input id="month-1" class="checkbox-custom" type="checkbox" name="scenario" value="month" checked="" />
									<label for="month-1" class="checkbox-custom-label">
										<span>Month</span>
									</label>
								</div>
								<div class="form-checkbox">
									<input id="m1" class="checkbox-custom" type="checkbox" name="scenario" value="M+1" checked="" />
									<label for="m1" class="checkbox-custom-label">
										<span>M+1</span>
									</label>
								</div>
								<div class="form-checkbox">
									<input id="m2" class="checkbox-custom" type="checkbox" name="scenario" value="M+2" checked="" />
									<label for="m2" class="checkbox-custom-label">
										<span>M+2</span>
									</label>
								</div>
								<div class="form-checkbox">
									<input id="m3" class="checkbox-custom" type="checkbox" name="scenario" value="M+3" checked="" />
									<label for="m3" class="checkbox-custom-label">
										<span>M+3</span>
									</label>
								</div>
							</div>
						</div>
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
									<td data-value="1127" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="1127" data-dcq="1000" data-operation="2000"><span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="1127" data-dcq="1000" data-operation="2000"><span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="1127" data-dcq="1000" data-operation="2000"><span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
								</tr>
								<tr>
									<th>GoT Others</th>
									<td data-value="1691" data-dcq="1491" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="1127" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="1127" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="1127" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
								</tr>
								<tr>
									<th>Myanmar</th>
									<td data-value="581" data-dcq="581" data-operation="1000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="1127" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="1127" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="1127" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
								</tr>
								<tr>
									<th>LNG Term</th>
									<td data-value="660" data-dcq="660" data-operation="0">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="1127" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="1127" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="1127" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
								</tr>
								<tr>
									<th>LNG Spot</th>
									<td data-value="100" data-dcq="100" data-operation="0">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="1127" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="1127" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
									<td data-value="1127" data-dcq="1000" data-operation="2000">
										<span class="null-value">-</span>
										<span class="operational-maximum-value"></span>
										<span class="dcq-value"></span>
									</td>
								</tr>
								<tr>
									<th>LNG <br/>
										<span>(By 3rd Party)</span></th>
										<td data-value="0" data-dcq="0" data-operation="0">
											<span class="null-value">-</span>
											<span class="operational-maximum-value"></span>
											<span class="dcq-value"></span>
										</td>
										<td data-value="1127" data-dcq="1000" data-operation="2000">
											<span class="null-value">-</span>
											<span class="operational-maximum-value"></span>
											<span class="dcq-value"></span>
										</td>
										<td data-value="1127" data-dcq="1000" data-operation="2000">
											<span class="null-value">-</span>
											<span class="operational-maximum-value"></span>
											<span class="dcq-value"></span>
										</td>
										<td data-value="1127" data-dcq="1000" data-operation="2000">
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
							<span><b>1127 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value supply-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b>1691 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value supply-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b>100 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value supply-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b>650 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value supply-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b>0 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value supply-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b>681 </b>MMSCFD</span>
						</li>
					</ul>
					<ul class="gas-pipeline-value-lists" id="conversion-category">
						<li class="gas-pipeline-value conversion-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b>2918 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value conversion-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b>1867 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value conversion-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b>686 </b>MMSCFD</span>
						</li>
					</ul>
					<ul class="gas-pipeline-value-lists" id="transmission-category">
						<li class="gas-pipeline-value transmission-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b>14,896 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value transmission-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b>3330 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value transmission-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b>452 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value transmission-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b>140 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value transmission-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b>720 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value transmission-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b>1693 </b>MMSCFD</span>
						</li>
					</ul>
					<ul class="gas-pipeline-value-lists" id="salessector-category">
						<li class="gas-pipeline-value salessector-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b>7054 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value salessector-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b>3448 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value salessector-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b>2993 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value salessector-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b>1491 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value salessector-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b>3782 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value salessector-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b>2374 </b>MMSCFD</span>
						</li>
					</ul>
					<ul class="gas-pipeline-value-lists" id="demandendnode-category">
						<li class="gas-pipeline-value demandendnode-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b>1915 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value demandendnode-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b>1915 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value demandendnode-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b>475 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value demandendnode-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b>1899 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value demandendnode-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b>1915 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value demandendnode-value"><img src="images/awesome-weight-hanging.svg" alt="Icon" class="inactive-img" />
							<img src="images/awesome-weight-hanging-active.svg" alt="Icon" class="active-img" />
							<span><b>1915 </b>Tn/d</span>
						</li>
						<li class="gas-pipeline-value demandendnode-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b>475 </b>MMSCFD</span>
						</li>
						<li class="gas-pipeline-value demandendnode-value"><img src="images/open-droplet.svg" class="inactive-img" alt="Icon" />
							<img src="images/open-droplet-active.svg" class="active-img" alt="Icon" />
							<span><b>1899 </b>MMSCFD</span>
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
		$(document).ready(function(){
			//getvaluesdata('getvaluesdata');
			$(document).on('click','.scenario_check',function(){
				var checked_senario = "";
				if($(this).is(':checked') ){
					getvaluesdata($(this).val());
				}else{
					$('.scenario_check').each(function(){
						if($(this).is(':checked') ){
							checked_senario  = $(this).val();
						}
					})
					getvaluesdata(checked_senario);
				}
			})
		})

		getvaluesdata  = function(scenario){
			$.ajax({
		        type      : 'POST',
		        url       : "<?= _URL ?>"+'ajax/get_value_data.php',
		        data      : {scenario : scenario},
		        dataType  : 'json'
		    })
		    .done(function(data){
		        
		    })
		}
	</script>
