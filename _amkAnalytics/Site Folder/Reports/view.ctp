<h2><?php echo $reports[0]['Report']['company_name']; ?></h2><br/>

<?php
	$oldestData = $reports[0]['ReportData'][0];
	$newestData = $reports[0]['ReportData'][count($reports[0]['ReportData']) - 1]; 
?>

<p>amkANALYTICS intangibles quotients, AQ for advertising and RQ for R&amp;D, are the most sophisticated quantitative measures available to quantify the effectiveness of intangible spending.  They are also the most intuitive. Both are derived from the production function from classic economics which defines the relationship between firm inputs and their output. Each captures the marginal increase in revenue obtained from an increase in intangible spending, which ultimately predicts profitability and market value.</p><br/>
<p>Each measure is scaled to match the human IQ scale.  An RQ of 100 is the average across all US traded firms.  The majority of firms (67%) have RQs which fall between 85 and 115.  <?php echo $reports[0]['Report']['company_name']; ?>’s current RQ is <?php echo $newestData['rq']; ?>, and its AQ is <?php echo $newestData['aq']; ?>.</p><br/>
<p>The AQs and RQs plotted below are based on 7-year samples.  For example, the RQ for <?php echo $newestData['year']; ?> is based on the firm’s outputs and matched inputs each year from <?php echo $oldestData['year']; ?>-<?php echo $newestData['year']; ?>.  The firm’s AQ and RQ are also compared to the averages for the industry.</p>

<div class='graphs'>
<?php echo $this->element('rqaq_graphs', array('report' => $reports[0])); ?>
</div>
<div class='clear'></div>
<h2>Translating AQ and RQ into Optimal Investment</h2><br/>
<p>AQ and RQ represent the marginal value of additional investment in intangibles when holding all tangible assets fixed.  Given that, we can define an optimal budget for the firm for each intangible.  In the charts below we compare the optimal investment in intangibles to actual spending.</p><br/>

<h2>Increasing your AQ or RQ Increases Market Value</h2><br/>
<p>
	The most immediate benefit of knowing AQ and RQ intangibles quotients is their value in establishing appropriate budgets to maximize the firm’s investment productivity and market performance.<br/><br/>

	The greatest power in the RQ and AQ measures lies in the firm’s ability to change them over time. Firms can increase their AQ and RQ to maximize the returns on incremental investment in advertising and R&amp;D. When firms improve the productivity of their intangibles, it in turn increases profitability and market value.<br/><br/>

	For firms interested in increasing their AQ or RQ, amkANALYTICS offers custom consulting through our alliance with Berkeley Research Group. Our consultants work with firms to redesign advertising and R&amp;D systems to increase AQ or RQ or to apply AQ and RQ at the division level.
</p><br/>

<div class='graphs'>
<?php echo $this->element('optimal_investment_graphs', array('report' => $reports[0])); ?>
</div>
<div class='clear'></div>

<h2>Changing Your Investment Strategy</h2><br/>
<p>If the firm’s actual investment is within 10 or 20% of optimal investment in either intangible asset, then it probably can identify appropriate candidates for additional investment or current investments that can be curtailed.  However, if the firm is like the majority of US firms, it significantly underinvests in R&amp;D.  amkANALYTICS can help firms in need of expert advice on how to ramp up R&amp;D investment.  Backed by the consulting powerhouse Berkeley Research Group, we provide custom consulting on strategies to appropriately maximize R&amp;D or advertising investment.</p><br/><br/>

<h2>For More Information</h2><br/>

<p class='left' style='margin-right: 40px;'>
amkANALYTICS, LLC<br/>
1601 N. Sepulveda Blvd<br/>
Suite 639<br/>
Manhattan Beach, CA 90266<br/>
Telephone: 800-420-7690<br/>
Email: <a href='mailto:info@amkanalytics.com'>info@amkanalytics.com</a><br/>
<a href='http://www.amkanalytics.com'>www.amkanalytics.com</a><br/>
</p>

<p class='left'>
Berkeley Research Group, LLC<br/>
2049 Century Park East<br/>
Suite 2525<br/>
Los Angeles, CA 90067<br/>
Telephone: 310-499-4750<br/>
Email: <a href='mailto:aknott@brg-expert.com'>aknott@brg-expert.com</a><br/>
<a target='_blank' href='http://www.brg-expert.com'>www.BRG-expert.com</a><br/>
<br/><br/></p>

<div class='clear'></div>

<center><small>Copyright 2011 amkANALYTICS, LLC</small></center>