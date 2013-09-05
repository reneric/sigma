<?php echo $this->Form->create('Report', array('controller' => 'Reports', 'action' => 'compare')); ?>
<table>
<thead>
<?php echo $this->Html->tableHeaders(array('', 'Symbol', 'Company', 'Data', 'Action')); ?>
</thead>
<tbody>
<tr>	
<td style='width: 40px; padding: 0;' />
<td style='width: 139px; padding: 0;' />
<td style='width: 290px; padding: 0;' />
<td style='width: 110px; padding: 0;' />
<td style='width: 80px; padding: 0;' />
</tr>
<?php
	foreach($reports as $idx => $report)
	{
		if($report['has_rq'] && $report['has_aq'])
			$qData = "RQ & AQ";
		else if($report['has_rq'])
			$qData = "RQ";
		else if($report['has_aq'])
			$qData = "AQ";
		else
			$qData = "No Data";

		echo $this->Html->tableCells(array(
			$this->Form->input('report_' . $idx, array('type' => 'checkbox', 'label' => false, 'value' => $report['id'], 'hiddenField' => false)),
			$report['symbol'], 
			$report['company_name'], 
			$qData,
			$this->Html->link('view', array('controller' => 'Reports', 'action' => 'view', $report['id']))
			));
	}
?>
<tbody>
</table>
<div id='my-reports-box' class='grey-grad'>
	<h2>MY REPORTS</h2>
	<?php echo $this->Form->end('COMPARE'); ?>
</div>