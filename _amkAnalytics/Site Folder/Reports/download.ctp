<?php
	$fp = fopen('php://output', 'w');
	fputcsv($fp, array($report['Report']['symbol'], $report['Report']['company_name']));
	fputcsv($fp, array('Year', 'RQ', 'Actual R&D', 'R-Star', 'R&D Underspend Ratio', 'RQ Trend', 'AQ', 'Actual Advertising Spend', 'A-Star', 'Advertising Underspend Ratio'));
	foreach($report['ReportData'] as $data){
		$tmp = array($data['year'], $data['rq'], $data['rd'], $data['rstar'], $data['rd_under_ratio'], $data['rq_trend'], $data['aq'], $data['adv'], $data['astar'], $data['adv_under_ratio']);
		fputcsv($fp, $tmp);
	}
?>