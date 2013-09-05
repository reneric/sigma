<div id='ajax-message'></div>
<div id='search' class='subscriber'>
<?php
	if(isset($user)){
		echo $this->Form->create('Report', array('controller' => 'Reports', 'action' => 'search'));
		echo '<h2>Search the AMK Database</h2>';
		echo $this->Form->input('search', array('label' => 'Search:'));

		if(isset($demo) && $demo)
			echo $this->Form->input('demo', array('type' => 'hidden', 'value' => 1));

		echo $this->Form->input('industry', array(
			'label' => 'Industry:',
			'type' => 'select',
			'options' => $industries,
			'empty' => true
			));
		echo $this->Form->end('GO');
	}
?>
</div>
<div class='clear'></div>

<div id='reports'>
<?php
	if(isset($reports)){
		if(count($reports) == 1){
			echo $this->element('report_graphs', array('report' => $reports[0]));
			echo $this->element('report_table', array('report' => $reports[0]));
		}
		else{
			echo $this->element('compare_graphs', array('reports' => $reports));

			foreach($reports as $report)
				echo $this->element('report_table', array('report' => $report));
		}
	}
?>
</div>
<?php echo $this->element('search_autocomplete'); ?>
<div class='clear'></div><br/>
<h2>Can’t find the firm you’re looking for?</h2><br/>

<p style='width: 700px'>The AMK Analytics database is comprised of publicly reported financial data on hundreds of firms.  Not all firms are represented, due to the fact that not all firms report both R&amp;D and Advertising in their public financial reports.   If a firm is not listed in the database, AMK Analytics can provide custom services to calculate the RQ and AQ and optimized R&amp;D and Advertising spending levels for any firm. Please Contact Us if you would like more information on Custom Consulting Services.</p>