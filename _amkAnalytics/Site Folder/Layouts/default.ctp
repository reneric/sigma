<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		amkANALYTICS | Making Intangibles Tangible
	</title>

	<?php
		echo $this->Html->meta('icon');
		echo $this->element('include_scripts');
		echo $scripts_for_layout;
	?>

</head>
<body>
	<script type='text/javascript' defer="defer">
	$(function(){
		$('.tablesorter').tablesorter();
	});
	</script>
	<div id="overlay"></div>
	<div id='ajax-message'><?php echo $this->Session->flash(); ?></div>
	<div id="container">
		<div id="header">
			<?php
					echo "<div id='main-nav-container'>";
						echo $this->Html->link($this->Html->image('logo.png', array('id' => 'logo', 'alt' => 'amkANALYTICS')), '/', array('escape' => false));

						echo "<div id='slogan-container'>";
							echo $this->Html->image('slogan.png', array('id' => 'slogan', 'alt' => 'MAKING INTANGIBLES TANGIBLE'));
							echo "<div id='sign-in' class='parent-menu-item'><a href='/users/login' style='color: #fff'>SIGN IN</a>";
								echo '<div class="sub-menu">';
									echo $this->Form->create('User', array('action' => 'login'));
									echo $this->Form->input('username');
									echo $this->Form->input('password');
									echo $this->Form->end('LOGIN NOW');
								echo "</div>";
							echo '</div>';
						echo "</div>";

						echo "<div id='main-nav'>";
							echo '<div class=parent-menu-item>';
								echo $this->Menu->link('PRODUCTS', array('controller' => 'Pages', 'action' => 'products'));
									echo '<div class="sub-menu">';
										echo $this->Menu->link('Products', array('controller' => 'Pages', 'action' => 'products'));
										echo $this->Menu->link('Corporate Executives', array('controller' => 'Pages', 'action' => 'productscorp'));
										echo $this->Menu->link('Analysts & Portfolio Managers', array('controller' => 'Pages', 'action' => 'productsmngr'));
									echo '</div>';
							echo '</div>';
							echo '<div class=parent-menu-item>';
								echo $this->Menu->link('ABOUT', array('controller' => 'Pages', 'action' => 'about'));
									echo '<div class=sub-menu>';
										echo $this->Menu->link('amkANALYTICS', array('controller' => 'Pages', 'action' => 'about'));
										echo $this->Menu->link('Anne Marie Knott, CEO & Founder', array('controller' => 'Pages', 'action' => 'aboutfounder'));
									echo '</div>';
							echo '</div>';
							echo $this->Menu->link('SEARCH THE DATABASE', array('controller' => 'Reports', 'action' => 'search'));
							echo $this->Menu->link('CASE STUDY', array('controller' => 'Pages', 'action' => 'casestudies'));
							echo "<a href='/blog'>NEWS</a>";
							echo $this->Menu->link('CONTACT', array('controller' => 'Pages', 'action' => 'contact'));
							echo "<div style='display: inline; position: relative;'>";
							if(isset($cart))
								echo "<div id='items'>" . count($cart) . "</div>";
							else
								echo "<div id='items' style='display:none'></div>";
							
							echo $this->Menu->link('VIEW CART', array('controller' => 'Users', 'action' => 'viewcart'), array('class' => 'last'));
							echo "</div>";
						echo '</div>';
						
					echo '<div class="clear"></div></div></div>';

					echo $this->Html->image('blueboxes.png', array('id' => 'blueboxes', 'alt' => 'Reliable Universal Uniform'));

					echo $this->Html->link('<span>PURCHASE</span><br/>amkANALYTICS', array('controller' => 'Pages', 'action' => 'purchase'), array('escape' => false, 'id' => 'register', 'class' => 'grey-grad'));
			?>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			
			<?php echo $content_for_layout; ?>

		</div>
		<div class='clear'></div>
		<div id="footer">
			<?php
						echo "<div id='footer-nav'>";
							echo $this->Html->link('Contact Us', array('controller' => 'Pages', 'action' => 'contact'));
							echo "<a href='/blog/?feed=rss2'>RSS Feed</a>";
							//echo $this->Html->link('Site Map', array('controller' => 'Users', 'action' => 'login'));
							echo "<a href='/blog/'>Newsletter</a>";
						echo '<a>&copy;amkANALYTICS 2012</a></div>';
						
			?>
		</div>
	</div>
	<div id="terms">
		<img class="closebox" src="http://www.taskus.com/wp-content/themes/theme1396/images/custom/closebox.png" />
		<h2>Terms of Service</h2>

		<div id='terms-overflow'>
		<p>
			Welcome to the amkANALYTICS website (the "<b>Site</b>"). The following Terms of Service govern your use of the information, tools, features, functionality, products and services provided through the Site and constitutes an agreement concerning your legal rights and obligations with respect to amkANALYTICS, LLC, its affiliates and subsidiaries (individually and collectively, "<b>we</b>," "<b>us</b>," or "<b>amkANALYTICS</b>"), and of our third party suppliers and marketing partners (our "Third Party Suppliers"). Please read these Terms of Service carefully before using the Site, subscribing to an amkANALYTICS subscription account ("Account"), or purchasing and/or using products or services offered by amkANALYTICS (collectively, "amkANALYTICS Products").<br/><br/>

			BY USING THE SITE OR PURCHASING AND/OR USING AMKANALYTICS PRODUCTS, YOU SIGNIFY YOUR IRREVOCABLE ACCEPTANCE OF THESE TERMS OF SERVICE.<br/><br/>

			amkANALYTICS has the right to revise these Terms of Service (including our Privacy Policy, pricing, refund and cancelation policy), at any time without providing notice to its users by posting the revised Terms of Service on the Site. Your continued use of the Site, any of the amkANALYTICS Products or your Account after any changes to these Terms of Service have been posted, shall be deemed your irrevocable acceptance of those revisions.<br/><br/>

			amkANALYTICS reserves the right to change, modify, suspend or discontinue all or any portion of the Site or any of the amkANALYTICS Products, in its sole discretion, at any time. amkANALYTICS may also impose limits on certain features or restrict your access to parts or the entire Site in its sole discretion and without notice or liability.<br/><br/>
			
			amkANALYTICS reserves the right to refuse to provide you access to the Site or to allow you to purchase and/or use amkANALYTICS Products for any reason.<br/><br/>
		</p>

		<h3>PRIVACY</h3><br/>

		<p>
			Your privacy is very important to us at amkANALYTICS.  We have provided the amkANALYTICS Privacy Policy to explain our privacy practices in detail.<br/><br/>
		</p>

		<h3>LIMITED LICENSE</h3><br/>

		<p>
			amkANALYTICS grants you a non-assignable and non-exclusive limited license to access and use the Site and any of the amkANALYTICS Products for your personal use, subject to all of the terms and conditions of these Terms of Service. However, this license does not allow you to make any commercial use or any derivative use of the Site (including any of its individual elements or content) or any of the amkANALYTICS Products<br/><br/>

			amkANALYTICS Products, including any data and/or reports included therein, are licensed to you for your internal use only.  Regardless of the form or format in which the amkANALYTICS Product is furnished, you agree not to reproduce, reveal, or make available amkANALYTICS Information in whole or part to any third party, except as may be specifically required by law. You acknowledge that amkANALYTICS Products are subject to copyrights and other proprietary rights of amkANALYTICS and you agree you will not commit or permit any act, or omit to commit or permit any act that would impair such rights.<br/><br/>

			No part of the Site may be reproduced, modified, or distributed in any form or manner without the prior written permission of amkANALYTICS; provided no such permission is necessary in connection with the fair use of excerpts of freely available (i.e., available to any visitor to the Site without any requirement of registration or payment of fees) factual information on the Site regarding descriptions of amkANALYTICS and its products and services, and provided such use is in accordance with the United States' copyright laws.<br/><br/>
			
			You agree that you will not duplicate any machine readable media in any form or manner whatsoever, except that you may make one copy solely for backup purposes.  You may not robotically or otherwise automatically access, extract, copy, or collect any information or data from the Site.<br/><br/>

			You acknowledge and agree that amkANALYTICS owns all legal right, title, interest, and intellectual property rights in and to the amkANALYTICS Products, including algorithms and associated data.<br/><br/>
		</p>

		<h3>ACCOUNTS AND SECURITY</h3><br/>
		
		<p>
			To use aspects of the Site, you must register with amkANALYTICS to open an Account. As part of the registration process, you shall provide amkANALYTICS with registration information that is accurate, complete, and up to date. Failure to do so shall constitute a breach of these Terms of Service, which may result in immediate termination of your Account. You promise you will not (i) misrepresent your identity; or (ii) breach any representation, warranty or promise made by you in these Terms of Service regarding your Account.<br/><br/>
			
			Each individual user must register with amkANALYTICS to open an Account.<br/><br/>
			
			You agree and understand that you are responsible for maintaining the confidentiality of passwords associated with any account you use to access the amkANALYTICS Products. It is your sole responsibility to protect your password and not share your password with any other people. Accordingly, you understand and agree that you shall be liable for any activity performed by others using the Site with your login credentials.<br/><br/>
			
			You agree to immediately notify amkANALYTICS of any known or suspected unauthorized use(s) of your Account, or any known or suspected breach of security, including loss, theft, or unauthorized disclosure of your password. amkANALYTICS is not responsible for any loss or damage arising from your failure to maintain the confidentiality of your password.<br/><br/>
			
			amkANALYTICS may immediately terminate your Account, or suspend your access to your Account, in its sole discretion and, without notice, for conduct that amkANALYTICS believes is a violation of these Terms of Service or any other policies or guidelines posted by amkANALYTICS.<br/><br/>
			
			You may only use the Site and/or open an Account if your applicable jurisdiction allows you to accept these Terms of Service.<br/><br/>
	</p>
	
	<h3>DISCLAIMER</h3><br/>
	
	<p>
		THE SITE, THE amkANALYTICS PRODUCTS AND THE DATA, INFORMATION, PRODUCTS, SERVICES AND/OR PROGRAMS PROVIDED THROUGH THE SITE (THE "<b>INFORMATION</b>") ARE PROVIDED ON AN "AS IS" AND "AS AVAILABLE" BASIS FOR YOUR USE, WITHOUT WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION, THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, QUALITY, NON-INFRINGEMENT, AND THOSE ARISING FROM COURSE OF DEALING OR USAGE OF TRADE. NEITHER amkANALYTICS NOR ITS THIRD PARTY SUPPLIERS MAKE ANY WARRANTY AS TO THE ACCURACY, COMPLETENESS, TIMELINESS OR RELIABILITY OF THE SITE, THE amkANALYTICS PRODUCTS OR ANY INFORMATION PROVIDED ON THE SITE. NEITHER amkANALYTICS NOR ITS THIRD PARTY SUPPLIERS WARRANT THAT YOU WILL BE ABLE TO ACCESS OR USE THE SITE, THE amkANALYTICS PRODUCTS OR THE INFORMATION AT THE TIMES OR LOCATIONS OF YOUR CHOOSING; THAT THE SITE, THE amkANALYTICS PRODUCTS OR THE INFORMATION WILL BE UNINTERRUPTED OR ERROR-FREE; THAT DEFECTS WILL BE CORRECTED; OR THAT THE SITE OR THE INFORMATION IS FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS.<br/><br/>
		
		YOU ACKNOWLEDGE THAT THE ENTIRE RISK ARISING OUT OF THE USE OR PERFORMANCE OF THE SITE REMAINS WITH YOU TO THE MAXIMUM EXTENT PERMITTED BY LAW.<br/><br/>
		
		Some jurisdictions do not allow the disclaimer of implied warranties, so the foregoing disclaimer may not apply to you.<br/><br/>
	</P>

	<h3>LIMITATION OF LIABILITY</h3><br/>
	
	<p>
		TO THE MAXIMUM EXTENT PERMITTED BY LAW, amkANALYTICS, ITS AFFILIATES, THIRD PARTY SUPPLIERS, LICENSORS AND BUSINESS PARTNERS, AND THEIR RESPECTIVE DIRECTORS, OFFICERS, SHAREHOLDERS, EMPLOYEES AND AGENTS, (COLLECTIVELY, THE "RELATED PARTIES") SHALL NOT BE LIABLE WITH RESPECT TO ANY SUBJECT MATTER OF THESE TERMS OF SERVICE, WHETHER BASED IN CONTRACT, TORT (INCLUDING NEGLIGENCE), STRICT LIABILITY OR OTHERWISE, FOR (I) ANY DIRECT, INDIRECT, INCIDENTAL, CONSEQUENTIAL, OR SPECIAL DAMAGES, EVEN IF amkANALYTICS AND/OR ANY OF THE RELATED PARTIES HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES, (II) THE USE OR THE INABILITY TO USE THE SITE OR ANY OF THE amkANALYTICS PRODUCTS, OR (III) THE COST OF PROCURING SUBSTITUTE GOODS, SERVICES OR TECHNOLOGY. WITHOUT LIMITING THE FOREGOING, IN NO CASE SHALL THE ENTIRE LIABILITY OF amkANALYTICS OR ANY OF THE RELATED PARTIES TO YOU OR ANY THIRD PARTY EXCEED THE AMOUNT THAT YOU PAID TO amkANALYTICS OR ITS DESIGNEES FOR THE APPLICABLE amkANALYTICS PRODUCT OR $30,000, WHICHEVER IS GREATER.<br/><br/>

		YOUR SOLE REMEDY WITH RESPECT TO ANY PROBLEMS OR DISSATISFACTION WITH THE SITE OR ANY OF THE amkANALYTICS PRODUCTS IS TO TERMINATE YOUR ACCOUNT AND DISCONTINUE ANY USE OF THE SITE AND THE amkANALYTICS PRODUCTS.<br/><br/>
		
		Some jurisdictions do not allow the limitation of liability, so the foregoing limitation may not apply to you. In such states or jurisdictions, the liability of amkANALYTICS and its Related Parties shall be limited to the fullest extent permitted by law.<br/><br/>
	</p>
	
	<h3>TERM; CANCELATION; REFUNDS; RENEWALS;</h3><br/>

	<p>
		The license for use of the Site is effective for one year or until terminated. This license will terminate as set forth within these Terms of Service or if you fail to comply with any of the terms and conditions of these Terms of Service. In such event, no notice shall be required by amkANALYTICS to effect such termination.<br/><br/>
		
		<i>Annual Subscription</i><br/><br/>
		
		You agree that if you purchase an amkANALYTICS Product provided pursuant to an annual subscription, you must commit to a minimum of twelve months of service. You further agree that if you cancel this amkANALYTICS Product prior to fulfilling the minimum commitment, you will be charged for and agree to pay for the twelve months of service.<br/><br/>
		
		All amkANALYTICS Products provided pursuant to an annual subscription will not automatically renew at the end of each annual term on an annual basis, unless you contact customer service prior to the end of the then-current term and renew your subscription. You may contact customer service at (800) 420-7690.<br/><br/>

		<i>Single Use</i><br/><br/>
		
		amkANALYTICS Products purchased for one time use, recurring single use, or multiple single use basis are not refundable.<br/><br/>
		
		amkANALYTICS Products purchased on a one-time basis shall be charged the applicable fee, payable by credit card.  amkANALYTICS Products purchased on a one-time basis are non-renewable.<br/><br/>
		
		<i>Free Trial Subscription Service</i><br/><br/>
		
		A free trial subscription will not automatically convert into an annual subscription. Your access the amkANALYTICS products will terminate upon the expiration of your free trial subscription.  In order to receive continued access to amkANALYTICS Products, you must purchase an annual subscription.<br/><br/>
	</p>

	<h3>USE OF THE SITE</h3><br/>

	<p>
		Under no circumstances will amkANALYTICS be liable in any way for any Content, including, but not limited to, any errors or omissions in any Content, or any loss or damage of any kind incurred as a result of the use of any Content made available on the Site.<br/><br/>
		
		You agree not to:
	</p>

	<ul class='terms-list'>
		<li>reproduce, duplicate, copy, sell, lease, loan, distribute, or trade the amkANALYTICS Products or information for any purpose</li>
		<li>modify or create derivative works based on amkANALYTICS Products without the prior written permission of amkANALYTICS;</li>
		<li>harvest or duplicate the information provided by the Site, without the express written permission of amkANALYTICS;</li>
		<li>use the Site for any commercial purpose or the benefit of any third party or any manner not permitted by the licenses granted herein;</li>
		<li>attempt to reverse engineer, disassemble or hack the Site or any of the amkANALYTICS Products and/or data transmitted, processed or stored by amkANALYTICS;</li>
		<li>use the Site for fraudulent purposes;</li>
		<li>use any of the amkANALYTICS Products as the sole basis for investment decision making;</li>
		<li>use any of the amkANALYTICS Products as a substitute for traditional risk management and marketing services;</li>
		<li>use the Site to intentionally or unintentionally violate any applicable local, state, national or international law, including, but not limited to, regulations promulgated by the U.S. Securities and Exchange Commission, any rules of any national or other securities exchange, including, without limitation, the New York Stock Exchange, the American Stock Exchange or the NASDAQ, and any regulations having the force of law;</li>
	</ul>

	<p>	
		You agree that you must evaluate, and bear all risks associated with, the use of any Content, including any reliance on the accuracy, completeness, or usefulness of such Content. In this regard, you acknowledge that you may not rely on any Content created by amkANALYTICS.<br/><br/>
		
		You acknowledge, consent and agree that amkANALYTICS may access, preserve and disclose your account information if required to do so by law or in a good faith belief that such access preservation or disclosure is reasonably necessary to: (a) comply with legal process; (b) enforce these Terms of Service; (c) respond to claims that any Content violates the rights of third parties; (d) respond to your requests for customer service; or (e) protect the rights, property or personal safety of amkANALYTICS, its users and the public.<br/><br/>

		You understand that the technical processing and transmission of the Site may involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices.<br/><br/>
	</p>
	<h3>YOUR REPRESENTATIONS AND WARRANTIES</h3>
	
	<ul class='terms-list'>
		<li>you possess the legal right and ability to enter into these Terms of Service and to comply with its terms;</li>
		<li>you will use the Site for lawful purposes only and in accordance with these Terms of Service and all applicable laws, regulations and policies; and</li>
	</ul>

	<h3>INDEMNITY</h3><br/>
	
	<p>
		You agree to indemnify, defend and hold harmless amkANALYTICS, and each Related Party (collectively, the "<b>Indemnified Parties</b>"), at your expense, against any and all claims, actions, proceedings, and suits and all related liabilities, losses, damages, judgments, settlements, penalties, fines, costs and expenses (including, without limitation, reasonable attorneys' fees and other dispute resolution expenses) incurred by any Indemnified Party arising out of or relating to your (i) violation or breach of these Terms of Service or any policy or guidelines referenced herein, (ii) use or misuse of the Site, (iii) your violation of any law, rule, regulation or rights of others in connection with your use of the Site or any of the amkANALYTICS Products, or (iv) infringement, violation or misappropriation of any copyright, trade secret, or any other intellectual property rights through the use of any of the amkANALYTICS Products.<br/><br/>
	</p>
	
	<h3>SEVERABILITY</h3><br/>
	<p>
		If any provision of these Terms of Service shall be deemed unlawful, void, or for any reason unenforceable, then that provision shall be deemed severable from these terms and conditions and shall not affect the validity and enforceability of any remaining provisions.<br/><br/>
	</p>

	<h3>COPYRIGHT</h3><br/>
	
	<p>
		The Site includes copyrighted and copyrightable materials, including, without limitation, the amkANALYTICS trademark, logo, design, text, graphics, forms and any other applicable materials, including the selection and arrangement of such elements (collectively, the "<b>Materials</b>"). In addition, the entire Site is copyrighted as a collective work under the United States and other copyright laws. amkANALYTICS holds the copyright in the collective work. The collective work includes works that are licensed to amkANALYTICS by its Third Party Suppliers. The collective work may also include works that are the property of amkANALYTICS's licensors, which are also protected by copyright and other intellectual property laws.<br/><br/>
		
		Certain of the amkANALYTICS Products contain or utilize information proprietary to amkANALYTICS or its Third Party Suppliers and comprises or may comprise:(a) works of original authorship, including compiled information containing an arrangement and coordination and expression of such information or pre-existing material created, gathered or assembled; (b) confidential and trade secret information, including algorithms and formulae; and (c) information that has been created, developed and maintained by amkANALYTICS or its Third Party Suppliers at great expense of time and money, such that misappropriation or unauthorized use by others for commercial gain would unfairly or irreparably harm amkANALYTICS or its Third Party Suppliers. You agree that you will not commit or permit any act or omission by your agents, employees, or any third party that would impair amkANALYTICS's or its Third Party Suppliers' copyright or other proprietary and intellectual rights in the amkANALYTICS Products. You will not use any amkANALYTICS or its Third Party Suppliers trade names, trademarks, service marks or copyrighted materials in listings or advertising in any manner without the prior written approval of amkANALYTICS You shall reproduce amkANALYTICS's or its Third Party Suppliers' copyright notice and proprietary rights legend on all authorized copies of amkANALYTICS Products.<br/><br/>
	</p>
	<h3>TRADEMARKS</h3><br/>

	<p>
		All trademarks, service marks, logos, trade names, and any other proprietary designations of amkANALYTICS used herein are trademarks or registered trademarks of amkANALYTICS Any other trademarks, service marks and trade names are the trademarks or registered trademarks of their respective parties.<br/><br/>
	</p>

	<h3>MISCELLANEOUS</h3><br/>
	<p>
		amkANALYTICS, LLC reserves all rights not expressly granted herein. amkANALYTICS may modify these Terms of Service at any time by posting the revised Terms of Service on the Site. Your continued use of the Site shall constitute your acceptance of such revised Terms of Service. You may not assign any rights granted to you hereunder. Nothing in these Terms of Service shall constitute a partnership or joint venture between you and amkANALYTICS The failure of amkANALYTICS at any time or times to require performance of any provision hereof shall in no manner affect its right at a later time to enforce the same unless the same is waived in writing. These Terms of Service shall be governed by and construed in accordance with the laws of the State of Nevada without regard to its conflict of law rules. The United Nations Convention on Contracts for the International Sale of Goods and the Uniform Computer Information Transaction Act are expressly disclaimed. Any legal proceeding arising out or relating to these Terms of Service against or relating to amkANALYTICS or any Indemnified Party under these Terms of Service will be subject to the exclusive jurisdiction of any state or federal court sitting in Nevada and you irrevocably consent to the jurisdiction of such courts. Notwithstanding the foregoing, you agree that, in the event any dispute or claim arises out of or relating to your use of the Site, that you and amkANALYTICS will attempt in good faith to negotiate a written resolution of the matter directly between the parties. You agree that if the matter remains unresolved for forty-five (45) days after notification (via certified mail or personal delivery) that a dispute exists, all parties shall join in mediation services in Nevada with a mutually agreed mediator in any attempt to resolve the dispute. Should you file any arbitration claims, or any administrative or legal actions without first having attempted to resolve the matter by mediation, then you agree that you will not be entitled to recover attorney's fees, even if you would otherwise be entitled to them. The terms set forth in these Terms of Service and any agreements included or referred to in these Terms of Service constitute the final, complete and exclusive agreement with respect to the Site and may not be contradicted, explained or supplemented by evidence of any prior agreement, any contemporaneous oral agreement or any consistent additional terms.<br/><br/>
		
		If you have any questions or concerns about these Terms of Service or any issues raised in these Terms of Service or on the Site, please contact us at: (800) 420-7690.<br/><br/>
		<small>These Terms of Service were last updated on January 31, 2012.</small>
	</p>
	</div>
	</div>
	<?php if(Configure::read('debug') != 0) echo $this->element('sql_dump'); ?>
</body>
</html>