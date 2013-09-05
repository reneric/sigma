<?php
	$fp_sequence = '123' . time();
	$relay = Router::url(array('Controller' => 'Reports', 'action' => 'relay', $reportId, $userId), true);
	echo AuthorizeNetDPM::getCreditCardForm(Configure::read('report_price'), $fp_sequence, $relay, Configure::read('authnet_api_id'), Configure::read('authnet_transaction_key'), Configure::read('authnet_test_mode'), Configure::read('authnet_test_mode'));
?>