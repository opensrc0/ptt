function baseCase(supply_pttep_input, 
	supply_got_other_input, 
	supply_spot_lng_input, 
	supply_lng_contract_input, 
	supply_spot_lng_tp_input, 
	supply_myanmar_import_input) {
	baseCaseScenario = new Highcharts.Chart({
		chart: {
			renderTo: 'base-chart',
			type: 'pie',
			width: 246,
			height: 246
		},
		title: {
			verticalAlign: 'middle',
			floating: true,
			text: '<i></i>'
		},
		yAxis: {
			title: {
				text: ''
			}
		},
		plotOptions: {
			pie: {
				shadow: false
			}
		},
		series: [{
			data: [   
				{
					name: 'SPOT LNG', 
					y: parseInt(supply_spot_lng_input) || 0, 
					color: '#474295'
				},
				{
					name: 'GoT Others', 
					y: parseInt(supply_got_other_input) || 0, 
					color: '#877D4A' 
				},
				{
					name: 'GoT PTTEP', 
					y: parseInt(supply_pttep_input) || 0, 
					color: '#0FB2EF'
				},
				{
					name: 'LNG(Contract)', 
					y: parseInt(supply_lng_contract_input) || 0, 
					color: '#303D6F'
				},
				{
					name: 'LNG (By 3rd Party)', 
					y: parseInt(supply_spot_lng_tp_input) || 0, 
					color: '#A1E5FF'
				},
				{
					name: 'Myanmar Import', 
					y: parseInt(supply_myanmar_import_input) || 0, 
					color: '#34B233'
				},
			],
			innerSize: 68,
			showInLegend:true,
			dataLabels: {
				enabled: false
			}
		}]
	});
};

function senerio1 (
	supply_pttep_input, 
	supply_got_other_input, 
	supply_spot_lng_input, 
	supply_lng_contract_input, 
	supply_spot_lng_tp_input, 
	supply_myanmar_import_input
) {
	 //scenarioOne
	 scenarioOne = new Highcharts.Chart({
		chart: {
			renderTo: 'scenario1-chart',
			type: 'pie',
			width: 246,
			height: 246
		},
		title: {
			verticalAlign: 'middle',
			floating: true,
			text: '<i></i>'
		},
		yAxis: {
			title: {
				text: ''
			}
		},
		plotOptions: {
			pie: {
				shadow: false
			}
		},
		series: [{
			data: [   
				{
					name: 'SPOT LNG', 
					y: parseInt(supply_spot_lng_input) || 0, 
					color: '#474295'
				},
				{
					name: 'GoT Others', 
					y: parseInt(supply_got_other_input) || 0, 
					color: '#877D4A' 
				},
				{
					name: 'GoT PTTEP', 
					y: parseInt(supply_pttep_input) || 0, 
					color: '#0FB2EF'
				},
				{
					name: 'LNG(Contract)', 
					y: parseInt(supply_lng_contract_input) || 0, 
					color: '#303D6F'
				},
				{
					name: 'LNG (By 3rd Party)', 
					y: parseInt(supply_spot_lng_tp_input) || 0, 
					color: '#A1E5FF'
				},
				{
					name: 'Myanmar Import', 
					y: parseInt(supply_myanmar_import_input) || 0, 
					color: '#34B233'
				},
			],
			innerSize: 68,
			showInLegend:true,
			dataLabels: {
				enabled: false
			}
		}]
	});
}

function senerio2 (
	supply_pttep_input, 
	supply_got_other_input, 
	supply_spot_lng_input, 
	supply_lng_contract_input, 
	supply_spot_lng_tp_input, 
	supply_myanmar_import_input
) {
	//scenarioTwo
	scenarioTwo = new Highcharts.Chart({
		chart: {
			renderTo: 'scenario2-chart',
			type: 'pie',
			width: 246,
			height: 246
		},
		title: {
			verticalAlign: 'middle',
			floating: true,
			text: '<i></i>'
		},
		yAxis: {
			title: {
				text: ''
			}
		},
		plotOptions: {
			pie: {
				shadow: false
			}
		},
		series: [{
			data: [   
				{
					name: 'SPOT LNG', 
					y: parseInt(supply_spot_lng_input) || 0, 
					color: '#474295'
				},
				{
					name: 'GoT Others', 
					y: parseInt(supply_got_other_input) || 0, 
					color: '#877D4A' 
				},
				{
					name: 'GoT PTTEP', 
					y: parseInt(supply_pttep_input) || 0, 
					color: '#0FB2EF'
				},
				{
					name: 'LNG(Contract)', 
					y: parseInt(supply_lng_contract_input) || 0, 
					color: '#303D6F'
				},
				{
					name: 'LNG (By 3rd Party)', 
					y: parseInt(supply_spot_lng_tp_input) || 0, 
					color: '#A1E5FF'
				},
				{
					name: 'Myanmar Import', 
					y: parseInt(supply_myanmar_import_input) || 0, 
					color: '#34B233'
				},
			],
			innerSize: 68,
			showInLegend:true,
			dataLabels: {
				enabled: false
			}
		}]
	});
}

function senerio3(
	supply_pttep_input, 
	supply_got_other_input, 
	supply_spot_lng_input, 
	supply_lng_contract_input, 
	supply_spot_lng_tp_input, 
	supply_myanmar_import_input
) {
	   //scenarioThree
	   scenarioThree = new Highcharts.Chart({
		chart: {
			renderTo: 'scenario3-chart',
			type: 'pie',
			width: 246,
			height: 246
		},
		title: {
			verticalAlign: 'middle',
			floating: true,
			text: '<i></i>'
		},
		yAxis: {
			title: {
				text: ''
			}
		},
		plotOptions: {
			pie: {
				shadow: false
			}
		},
		series: [{
			data: [   
				{
					name: 'SPOT LNG', 
					y: parseInt(supply_spot_lng_input) || 0, 
					color: '#474295'
				},
				{
					name: 'GoT Others', 
					y: parseInt(supply_got_other_input) || 0, 
					color: '#877D4A' 
				},
				{
					name: 'GoT PTTEP', 
					y: parseInt(supply_pttep_input) || 0, 
					color: '#0FB2EF'
				},
				{
					name: 'LNG(Contract)', 
					y: parseInt(supply_lng_contract_input) || 0, 
					color: '#303D6F'
				},
				{
					name: 'LNG (By 3rd Party)', 
					y: parseInt(supply_spot_lng_tp_input) || 0, 
					color: '#A1E5FF'
				},
				{
					name: 'Myanmar Import', 
					y: parseInt(supply_myanmar_import_input) || 0, 
					color: '#34B233'
				},
			],
			innerSize: 68,
			showInLegend:true,
			dataLabels: {
				enabled: false
			}
		}]
	});
}

$(document).ready(function() {

	$("body").addClass("loaded");

	$(".chart-legend-wrapper li").each(function(){
		$(this).find("span").css("background-color",$(this).attr("data-legend"));
	});

	$(".view-detail-toggle").on("click",function(){
		$(".detailed-info-popup").slideToggle();
		if ($('.view-detailed-info-wrapper').hasClass('active')) {
			$('.view-detailed-info-wrapper').removeClass('active');
			$(this).find("span").text("View Detailed Info");
		} else {
			$('.view-detailed-info-wrapper').addClass('active');
			$(this).find("span").text("Collapse Detailed Info");
		}
	});

	$(".nomination-filter-wrapper input.checkbox-custom").on("click",function(){
		var checkboxValue = $(this).attr("id");
		if ($(this).is(":checked")) {
			$(".gas-pipeline-value").addClass("active");
			$("#"+checkboxValue+"-chart").addClass("active");
			$("."+checkboxValue+"-table").addClass("active");
			$("."+checkboxValue+"-detail").addClass("active");
		}
		else {
			$(".gas-pipeline-value").addClass("active");
			$("#"+checkboxValue+"-chart").removeClass("active");
			$("."+checkboxValue+"-table").removeClass("active");
			$("."+checkboxValue+"-detail").removeClass("active");
		}
	});

	$(".valueflow-tab").on("click",function(){
		var tabId = $(this).attr("data-id");
		$(".valueflow-tab").removeClass("active");
		$(this).addClass("active");
		$(".valueflow-tab-content").hide();
		$(".valueflow-tab-content#"+tabId).fadeIn();
	});

	$(".detailed-info-table td").each(function(){
		$(this).find(".dcq-value").css("height",(($(this).attr("data-dcq") / 2000) * 100)+"%");
		$(this).find(".operational-maximum-value").css("height",(($(this).attr("data-operation") / 2000) * 100)+"%");
		if(parseInt($(this).data('value')) < 500 ){ 
			$(this).addClass("low-value");
		}
		else{
			$(this).removeClass("low-value");
		}
	});

	$('.valueflow-table th:nth-child(2),.valueflow-table td:nth-child(2)').addClass('base-scenario-table');
	$('.valueflow-table th:nth-child(3),.valueflow-table td:nth-child(3)').addClass('scenario-1-table');
	$('.valueflow-table th:nth-child(4),.valueflow-table td:nth-child(4)').addClass('scenario-2-table');
	$('.valueflow-table th:nth-child(5),.valueflow-table td:nth-child(5)').addClass('scenario-3-table');
	$('.detailed-info-table td:nth-child(2)').addClass('base-scenario-detail');
	$('.detailed-info-table td:nth-child(3)').addClass('scenario-1-detail');
	$('.detailed-info-table td:nth-child(4)').addClass('scenario-2-detail');
	$('.detailed-info-table td:nth-child(5)').addClass('scenario-3-detail');
	$(".base-scenario-detail").addClass("active");
	$(".base-scenario-table").addClass("active");
	$(".valueflow-tab-content-wrapper").height($(".volume-nomination-scenario-wrapper").height() - 19);

	$(".valueflow-table td").each(function(){
		if(parseFloat($(this).data('value')) < 0 ){
			$(this).addClass("negative-flowvalue");
			var valueflowTableVal = $(this).attr("data-value");
			var newValueflowTableVal = valueflowTableVal.replace('-', ''); 
			$(this).attr("data-value",newValueflowTableVal);
			$(this).find(".valueflow-value").css("width",(($(this).attr("data-value") / 10) * 50)+"%");
			$(this).attr("data-value","-"+newValueflowTableVal);
		}
		else{
			$(this).removeClass("negative-flowvalue");
		}
		$(this).not('.negative-flowvalue').find(".valueflow-value").css("width",(($(this).attr("data-value") / 10) * 50)+"%");
		if(parseFloat($(this).data('value')) < 2 ){ 
			$(this).addClass("low-flowvalue");
		}
		else{
			$(this).removeClass("low-flowvalue");
		}
	});
	var baseCaseScenario, scenarioOne, scenarioTwo, scenarioThree;


	baseCase();
        // Create the chart
	senerio1();
	senerio2();
	senerio3();
     
});
/*--END DOCUMENT READY FUNCTION--*/

