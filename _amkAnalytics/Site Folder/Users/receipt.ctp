<?php
	if($resp_code == 1){
?>
<div style='width: 650px'>
<h2>Thank you for your purchase!  Your new reports are now viewable in the <i>My Reports</i> section of the website.   Your reports are always viewable in <i>My Reports</i> whenever you are logged in at AMK Analytics.</h2>

<br/>
<?php
		echo "<table id='receipt-table'>";
		echo $this->Html->tableHeaders(array('Name', 'Price'));
		
		foreach($items as $item){
			$price = Configure::read('AMK.report_price');
			echo $this->Html->tableCells(array($item['Report']['company_name'], $this->Number->currency($price, 'USD')));
		}
		echo $this->Html->tableCells(array('-------', ''));
		echo $this->Html->tableCells(array('Total', $this->Number->currency($amount, 'USD')));
		echo "</table>";
	}
	else{
		echo "Sorry, your card has been declined.<br />";
		echo "Reason: " . $reason;
	}
?>
</div>