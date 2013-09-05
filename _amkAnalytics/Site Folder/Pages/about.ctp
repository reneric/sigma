<div style='margin-right: 35px'>
	<h2>The Intangibles Measurement Problem</h2><br/>
	<?php echo $this->Html->image('qMaze.jpg', array('alt' => 'Maze', 'class' =>'about-img left'));?>
	<p>There is no question that investments in “intangible assets” such as R&amp;D and advertising are important both to firms and to the economy. But how does a company know whether it’s pursuing the right R&amp;D projects or advertising campaigns, or whether it’s conducting them in the best manner possible? How does it even know how much to spend on R&amp;D or advertising, or if any of it matters?<br/><br/>

	The trouble with existing measures of R&amp;D effectiveness is they don’t answer any of these questions. Moreover they are problematic for fundamental reasons as well. Neither R&amp;D spending nor patents reliably predict market value. Year after year Booz &amp; Company publishes “The Global Innovation 1000.” And year after year, the consulting giant points out that R&amp;D spending does not correlate with market value or growth. Their 2010 report argues, <i>“Spending more on R&amp;D won’t drive results. The most crucial factors are strategic alignment and a culture that supports innovation.”</i><br/><br/>

	Is Booz &amp; Company right? Until recently, we had no way to know, because there were no good measures of R&amp; D effectiveness. At best, this is soft science driven more by intuition than fact.
	</p><br/><br/><br/>


	<h2>The AMK Analytics solution</h2><br/>
	<?php echo $this->Html->image('maze.jpg', array('alt' => 'Maze', 'class' =>'about-img left'));?>
		<p>Recent advances in statistical software enabled the creation of new measures of effectiveness for R&amp;D and advertising, RQ and AQ, that are universal, uniform and reliable. Moreover, they can be calculated from readily available financial data.<br/><br/></p>

	<p>RQ and AQ are the most intuitive measures you could construct for intangibles’ effectiveness. In fact they are so intuitive they occurred to Dr. Knott in her first year as a PhD student. The problem at the time was the lack of software to estimate them. Even five years ago, the software took overnight to generate results.</p>

	<p>RQ and AQ are derived from the production function from classic economics which defines the relationship between firm inputs and their output. The version seen in textbooks typically considers the two main tangible inputs: capital and labor, and is written as follows:</p>

	<div class='formula'>Y = K<sup>&alpha;</sup>L<sup>&beta;</sup></div>

	<p>Where Y is output, K is capital and L is labor. The exponents,  and , called the output elasticity of capital and labor, respectively, tell us in a very precise way how productive each input is in generating output. A 1% increase in capital increases a firm’s output  a 1% increase in labor increases a firm’s output %.</p>

	<p>RQ and AQ are obtained by expanding the production function to include the two important intangible assets: R&amp;D and advertising.</p>

	<div class='formula'>Y = K<sup>&alpha;</sup>L<sup>&beta;</sup>R<sup>&gamma;</sup>A<sup>&delta;</sup></div>

	<p>
	The raw measure, &gamma;, is the output elasticity of R&amp;D investment. The raw measure &delta; is the output elasticity of advertising investment. Thus both measures are simply doing with R&amp;D and advertising what everyone has been doing for years with capital and labor. To support intuition, we rescale &gamma; and &delta; to match the human IQ scale. An RQ or AQ of 100 is the average across all US traded firms engaged in R&amp;D and/or advertising in the base year (2010). The majority of firms (67%) have RQs and AQs which fall between 85 and 115.</p><br/><br/>

	<p>Accordingly, AmkANALYTICS provides a clear explanation of the marginal effects of R&amp;D or advertising spending. These in turn define the optimal intangible investments for firms as well as the market value of those investments.</p>
	<?php echo $this->Html->link('Download the white paper', '/files/mkt-value-paper-ssrn.pdf', array('class' => 'blue-grad')); ?>
	<div style="margin-top:30px;float:left;"><h2>Estimating RQ and AQ on your own</h2><br/>
	<p style="margin-bottom:10px;">The estimation methodology for RQ and AQ is transparent.  It has been in the public domain since 2008, the year when the foundational paper “"R&D Returns Causality: Absorptive Capacity or Organizational IQ” was published.  Accordingly, you can estimate RQ and AQ yourself (unlike HOLT’s innovation premium and McKinsey’s innovation ranking system, which are proprietary).</p>  
	
	<p style="margin-bottom:10px;">The tutorial here describes how to estimate RQ and AQ on a regular basis.  Firms find this valuable because they can use “real numbers” to generate the top-level (company-wide) estimate.  More importantly however, internal estimation allows firms to generate division-level estimates of RQ and R* (and AQ and A*).  Such division level estimates 1) inform how investment should be allocated across divisions, and 2) support internal benchmarking and diffusion of best practices (by identifying which divisions have higher/lower R&D effectiveness).</p>  
	
	<p style="margin-bottom:10px;">While straightforward, the estimation methodology requires firms to subscribe to Compustat, and also requires them to use fairly sophisticated statistical software.  To make the estimation accessible to a broader audience, the editors at Harvard 
		<p style="margin-bottom:10px;">Business Review asked me to create a spreadsheet example of the methodology as part of “The Trillion Dollar R&D Fix”.  This was a very simplified approach that leads to substantial errors.  In fact the raw RQ for the fictitious firm in the Excel example is high by a factor of two.  I included a caution in the article comparing the two estimates, but it appears to have been deleted in final edit.</p>
	
	<p style="margin-bottom:10px;">Because erroneous estimates of RQ could create worse problems than the current problem of not knowing RQ, I have created this tutorial.</p>

<p style="margin-bottom:10px;">If after reading the tutorial you decide you want internal capability but want help developing and validating it, Berkeley Research Group (BRG) can help.  BRG can also help if you don’t want internal capability, but do want divisional estimates for RQ and AQ.  Of course if you don’t need internal estimates, the simplest approach to obtaining your RQ and AQ each year is simply to purchase them here.</p></div>




</div>