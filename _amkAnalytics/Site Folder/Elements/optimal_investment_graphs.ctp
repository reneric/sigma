<div class='graph-container'>
	<h2><?php echo $report['Report']['symbol']; ?> R&amp;D Spending</h2><br/>
	<div id="rstar" style="float: left"></div>
	<div class='clear'></div>
</div>
<div class='graph-container'>
	<h2><?php echo $report['Report']['symbol']; ?> Advertising Spending</h2><br/>
	<div id="astar" style="float: left"></div>
	<div class='clear'></div>
</div>


<script type='text/javascript'>
var data = <?php echo json_encode($report['ReportData']); ?>;

var aqHist = new Array();
var rqHist = new Array();

var rstarActual = new Array();
var rstarIdeal  = new Array();

var astarActual = new Array();
var astarIdeal  = new Array();

$.each(data, function(idx, val){
	rstarActual[idx]  = [val.year, val.rd];
	rstarIdeal[idx]   = [val.year, val.rstar];

	astarActual[idx] = [val.year, val.adv];
	astarIdeal[idx]  = [val.year, val.astar];
});

var graphHeight = 300;
var graphWidth  = 300;

var flotOptions = {
	legend: {
		show: true,
		position: "ne",
		margin: [0,0]
	}
}

$('#rstar').width(graphWidth);
$('#rstar').height(graphHeight);
$.plot($('#rstar'), [{label: 'Actual', data: rstarActual}, {label: 'Optimal', data: rstarIdeal}]);

$('#astar').width(graphWidth);
$('#astar').height(graphHeight);
$.plot($('#astar'), [{label: 'Actual', data: astarActual}, {label: 'Optimal', data: astarIdeal}]);

<?php
	if(!$report['Report']['has_rq'])
		echo "$('#rstar').parent().css('display', 'none');";
		echo "$('#astar').parent().css('margin-right', 0);";
	if(!$report['Report']['has_aq'])
	{
		echo "$('#astar').parent().css('display', 'none');";
		echo "$('#rstar').parent().css('margin-right', 0);";
	}
?>
</script>
