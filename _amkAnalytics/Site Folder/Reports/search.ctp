<div id='search'>
<?php
	echo $this->Form->create('Report', array('controller' => 'Reports', 'action' => 'search'));
	echo '<h2>Search the AMK Database</h2>';
	echo '<label class="comma">Note: for multiple entries, enter each firm separated by a comma.</label>';
	echo $this->Form->input('search', array('label' => 'Search'));
	

	echo $this->Form->input('industry', array(
		'label' => 'Industry',
		'type' => 'select',
		'options' => $industries,
		'empty' => true
		));
	echo $this->Form->end('GO');

	echo "<div id='search-results-container'><table id='searchResults'>";
	echo $this->Html->tableHeaders(array('Symbol', 'Company', 'RQ', 'AQ', 'Action'));
	if(isset($reports)){
		foreach($reports as $rep){
			if($rep['Report']['demo'])
				$link = $this->Html->link('View', array('controller' => 'Reports', 'action' => 'view', $rep['Report']['id']));
			else
				$link = $this->Js->link('Add to Cart', array('controller' => 'Reports', 'action' => 'addtocart', $rep['Report']['id']), array('update' => '#ajax-message', 'complete' => 'updateCart();', 'class' => 'addToCart'));

			echo $this->Html->tableCells(array(
				$this->Js->link($rep['Report']['symbol'], array('controller' => 'Reports', 'action' => 'addtocart', $rep['Report']['id']), array('update' => '#ajax-message', 'complete' => 'updateCart();')),
				$this->Js->link($rep['Report']['company_name'], array('controller' => 'Reports', 'action' => 'addtocart', $rep['Report']['id']), array('update' => '#ajax-message', 'complete' => 'updateCart();')),
				$rep['Report']['has_rq'] ? 'Yes' : 'No', 
				$rep['Report']['has_aq'] ? 'Yes' : 'No',
				$link
				)
			);
		}
	}
	echo "</table></div>";
?>

<?php 
	if(!isset($user)):
		echo $this->Html->link('Click here to see a sample report', array('controller' => 'Pages', 'action' => 'productscorpsample'), array('class' => 'blue-grad sample'));
	endif;
?>

<div class='clear'></div>

</div>

<?php //if(!isset($user)): ?>
<h2>Can’t find the firm you’re looking for?</h2><br/>

<p style='width: 700px'>The amkANALYTICS database is comprised of publicly reported financial data on hundreds of firms.  Not all firms are represented, due to the fact that not all firms report both R&amp;D and Advertising in their public financial reports.   If a firm is not listed in the database, amkANALYTICS can provide custom services to calculate the RQ and AQ and optimized R&amp;D and Advertising spending levels for any firm. Please Contact Us if you would like more information on Custom Consulting Services.</p>
<?php //endif; ?>

<?php echo $this->element('search_autocomplete'); ?>
<script type='text/javascript'>
function updateCart(){
	<?php echo $this->Js->request(array('controller' => 'Reports', 'action' => 'cartcount'), array('update' => '#items', 'complete' => 'showItems();')); ?>
	function showItems(){
		if($('#items').html() != '' && $('#items').html() != '0')
			$('#items').css('display', 'block');
	}
}
</script>
<?php echo $this->Js->writeBuffer(); ?>