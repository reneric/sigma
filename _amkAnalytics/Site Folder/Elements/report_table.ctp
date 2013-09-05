<div style="clear: both"></div>
<h3><?php echo $report['Report']['company_name']; ?></h3>
<?php if(isset($user)) echo $this->Js->link('Save to My Reports', array('controller' => 'Reports', 'action' => 'add', $report['Report']['id']), array('update' => '#ajax-message', 'class' => 'blue-grad')); ?>
<?php echo $this->Html->link('Download as CSV', array('controller' => 'Reports', 'action' => 'download', $report['Report']['id']), array('class' => 'blue-grad download-csv')); ?>
<table class='tablesorter'>
<thead>
	<th title='Year'>Year</th>
	<th title='Normalized measure of R&amp;D expenditure effectiveness. Blank if R&amp;D spending is $0.'>RQ</th>
	<th title='Actual R&amp;D spending ($MM)'>Actual R&amp;D</th>
	<th title='Optimal R&amp;D spending ($MM), based on RQ. Derivative of profits with respect to R&amp;D. Blank if R&amp;D=0 or if elasticity of RQ<0.'>R-Star</th>
	<th title='Ratio of actual to ideal R&amp;D spending (R&amp;D/R-Star). Blank if R&amp;D=0 or if R-Star is blank.'>R&amp;D Underspend Ratio</th>
	<th title='5 year trend RQ scores. RQ(year t)/RQ(year t-5) and AQ(year t)/AQ(year t-5). Blank if no data in t-5.'>RQ Trend</th>
	<th title='Normalized measure of Advertising expenditure effectiveness. Blank if Advertising spending is $0.'>AQ</th>
	<th title='Actual advertising spending ($MM)'>Actual Advertising</th>
	<th title='Optimal advertising spending ($MM), based on AQ. Derivative of profits with respect to Advertising. Blank if Advertising=0 or if elasticity of AQ<0.'>A-Star</th>
	<th title='Ratio of actual to ideal advertising spending (Advertising/A-Star). Blank if Advertising=0 or if A-Star is blank.'>Advertising Underspend Ratio</th>
</thead>
<tbody>
<?php
	foreach($report['ReportData'] as $data)
	{
		echo $this->Html->tableCells(array($data['year'], $data['rq'], $data['rd'], $data['rstar'], $data['rd_under_ratio'], $data['rq_trend'], $data['aq'], $data['adv'], $data['astar'], $data['adv_under_ratio']));
	}
?>
</tbody>
</table>

<?php echo $this->Js->writeBuffer(); ?>