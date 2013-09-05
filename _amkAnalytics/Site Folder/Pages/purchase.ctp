<h2>amkANALYTICS offers two purchase options:</h2><br/>

<ul style='list-style-type: disc;' class='indent'>
	<li>Individual reports are available for $500 per company.  Or purchase reports for 5 companies for $2,000.</li>
	<li>Annual subscription access to the entire amkANALYTICS Data Base of over 2,000 companies is available for $30,000. A special introductory rate of $10,000 is available to new subscribers for a limited time.</li>
</ul>
<br/>

<h2>You will receive the following information* for each company
purchased:</h2><br/>

<ul style='list-style-type: disc;' class='indent'>
	<li>RQ and AQ Score</li>
	<li>Industry Average RQ and AQ</li>
	<li>Optimal R&amp;D and advertising levels for investment levels</li>
</ul>
<br/>
<span style='font-size: 90%'>*RQ and AQ results are available only for those companies which report R&amp;D and advertising spending. The search results for each company specify exactly what information is available prior to purchase. In some cases, optimal investment levels may be unavailable for companies whose RQ or AQ results indicate negative returns to investment.</span></p><br/>
<?php
	$text = "<h2>Purchase A Report</h2>
			RQ &amp; AQ Data, including
			optimal investment levels for
			R&amp;D and advertising for a
			single company.
			<div style='margin: 13px 0 0 80px; text-align: left;'><span style='display: block; float: left; width: 145px;'>Single Company:</span>$500<br/><span style='display: block; float: left; width: 145px;'>5 Companies:</span>$2,000</div>";

	echo $this->Html->link($text, array('controller' => 'Users', 'action' => 'register'), array('escape' => false, 'class' => 'purchase-option grey-grad'));
?>

<?php
	$text = "<h2>Subscribe</h2>

			Access to RQ &amp; AQ Data for
			The Entire amkANALYTICS database
			<br /><br />
			<b>
			Unlimited search for over 2,000 publically
			traded companies</b>";

	echo $this->Html->link($text, array('controller' => 'Users', 'action' => 'register', 'subscribe'), array('escape' => false, 'class' => 'purchase-option grey-grad last'));
?>
<div class='clear'></div>