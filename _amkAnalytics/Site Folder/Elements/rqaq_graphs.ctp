<div class='graph-container'>
	<h2><?php echo $report['Report']['symbol']; ?> RQ compared to industry</h2>
	<p>(all quotients are 7 year moving average)</p><br/>
	<div id="rqhist" style="float: left"></div>
	<div class='clear'></div>
</div>
<div class='graph-container'>
	<h2><?php echo $report['Report']['symbol']; ?> AQ compared to industry</h2>
	<p>(all quotients are 7 year moving average)</p><br/>
	<div id="aqhist" style="float: left"></div>
	<div class='clear'></div>
</div>
<!-- <div class='clear'></div> -->

<script type='text/javascript'>
var data = <?php echo json_encode($report['ReportData']); ?>;

var aqHist = new Array();
var rqHist = new Array();

$.each(data, function(idx, val){
	aqHist[idx] = [val.year, val.aq];
	rqHist[idx] = [val.year, val.rq];
});


var industryData = <?php echo isset($report['IndustryAverage']) ? json_encode($report['IndustryAverage']) : '{}'; ?>;

var industryRq = new Array();
var industryAq = new Array();

$.each(industryData, function(idx, val){
	industryRq[idx] = [val.IndustryAverage.year, val.IndustryAverage.rq];
	industryAq[idx] = [val.IndustryAverage.year, val.IndustryAverage.aq];
});

var graphHeight = 300;
var graphWidth  = 300;

var flotOptions = {
	legend: {
		show: true,
		position: "ne",
		margin: [0,0],
		ticks: 30
	}
}

$('#rqhist').width(graphWidth);
$('#rqhist').height(graphHeight);
$.plot($('#rqhist'), [{label: data[0].symbol + ' RQ', data: rqHist}, {label: 'Industry Average', data: industryRq}], flotOptions);

$('#aqhist').width(graphWidth);
$('#aqhist').height(graphHeight);
$.plot($('#aqhist'), [{label: data[0].symbol + ' AQ', data: aqHist}, {label: 'Industry Average', data: industryAq}]);

<?php
	if(!$report['Report']['has_rq'])
		echo "$('#rqhist').parent().css('display', 'none');";
	if(!$report['Report']['has_aq'])
		echo "$('#aqhist').parent().css('display', 'none');";
?>
</script>