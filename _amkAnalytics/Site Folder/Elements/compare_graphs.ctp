<div id='graphs'>
	<div class='graph-container'>
		<h2>RQ</h2>
		<p>(all quotients are 7 year moving average)</p><br/>
		<div id="rqhist" style="float: left"></div>
	</div>
	<div class='graph-container'>
		<h2>AQ</h2>
		(all quotients are 7 year moving average)</p><br/>
		<div id="aqhist" style="float: left"></div>
	</div>
	<div class='graph-container'>
		<h2>R&amp;D Variance</h2><br/>
		<div id="rstar" style="float: left"></div>
	</div>
	<div class='graph-container'>
		<h2>Advertising Variance</h2><br/>
		<div id="astar" style="float: left"></div>
	</div>
	<!-- <div class='clear'></div> -->
</div>

<script type='text/javascript'>
var data = <?php echo json_encode($reports); ?>;

var aqHist = new Array();
var rqHist = new Array();

var actualRd  = new Array();
var actualAdv = new Array();

$.each(data, function(num, rep){ 
	aqHist[num]      = {data: new Array(), label: rep.Report.symbol};
	rqHist[num]      = {data: new Array(), label: rep.Report.symbol};
	actualRd[num]    = {data: new Array(), label: rep.Report.symbol};
	actualAdv[num]   = {data: new Array(), label: rep.Report.symbol};

	$.each(rep.ReportData, function(idx, val){
		aqHist[num].data[idx] = [val.year, val.aq];
		rqHist[num].data[idx] = [val.year, val.rq];

		actualRd[num].data[idx]  = [val.year, val.rd_under_ratio];
		actualAdv[num].data[idx] = [val.year, val.adv_under_ratio];
	});
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

$('#rqhist').width(graphWidth);
$('#rqhist').height(graphHeight);

$.plot($('#rqhist'), rqHist, flotOptions);

$('#rstar').width(graphWidth);
$('#rstar').height(graphHeight);
$.plot($('#rstar'), actualRd);

$('#aqhist').width(graphWidth);
$('#aqhist').height(graphHeight);
$.plot($('#aqhist'), aqHist);

$('#astar').width(graphWidth);
$('#astar').height(graphHeight);
$.plot($('#astar'), actualAdv);
</script>