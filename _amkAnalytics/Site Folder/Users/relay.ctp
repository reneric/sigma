<?php
	if(isset($redirect_url))
		echo AuthorizeNetDPM::getRelayResponseSnippet($redirect_url);
	else
		echo "Error, check your MD5 setting";
?>