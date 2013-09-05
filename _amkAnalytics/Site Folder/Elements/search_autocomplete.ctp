<script type='text/javascript' defer='defer'>
$('#ReportSearch').autocomplete({source: "<?php echo $this->Html->url(array('controller' => 'Reports', 'action' => 'autocomplete')); ?>",
	minLength: 2});

$('#ReportSearch').bind('autocompleteselect', function(evt, ui){
	evt.preventDefault();
	var val = $('#ReportSearch').val();
	val = val.split(',');

	var term = ui.item.value;
	term += ', ';
	if(val.length > 1)
		term = ' ' + term;

	val[val.length - 1] = term;
	val = val.join(',');
	$('#ReportSearch').val(val);

});

$('#ReportSearch').bind('autocompletefocus', function(evt, ui){
	evt.preventDefault();
});

</script>