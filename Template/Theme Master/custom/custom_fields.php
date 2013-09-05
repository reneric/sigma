<?php
add_action('acf/register_fields', 'contact_fields');

function contact_fields()
{
	include_once('contact-v4.php');
}


function my_head_input()
{
	?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
	<style type="text/css">
/*#acf-left_column_content, #acf-left_column_title, #acf-layout, .acf-tab-group, #acf-right_column_title_, #acf-right_column_content_ {display: none;}*/
		/* ... */
		#acf_26 .hndle, #acf_33 .hndle {
			background: transparent;
		}
		div[data-layout="photo"] {

		}
/*		#acf-layout, #acf-format {
			position: absolute;
			left: -9999px;
		}*/
		#acf-more_info .label {
			display:block;
		}
		#acf-login_link {
			width: 200px;
		}
		#acf-more_info {

		}
		#acf-content_layout {
			padding-bottom: 0;
		}
		#acf_26 .handlediv,#acf_33 .handlediv, .acf-codnditional_logic-hide {
			display:none;
		}
		#acf_26, #acf_33 {
			background: transparent;
			border: none;
			display: none;
		}
		#acf-two_column_layout_right.acf-conditional_logic-hide, #acf-two_column_layout_left.acf-conditional_logic-hide {
			display:none;
		}
		.acf-tab-group {
			background:transparent;
		}
		.acf-tab-group {
			
		}
		.field_type-text,.field_type-number,.field_type-email {
			max-width: 250px;
		}
		#acf_96 {
			margin:0 4em;
			float:left;
			max-width: 30%;
		}
		#acf_48 {
			margin: 4em 4em;
			max-width:50%;
		}
		#acf_48 .inside {
			max-width: 400px;
		}
		#acf-image-image {
			margin-left:25px;
		}
		.inside {
			overflow: hidden;
		}
		.acf-image-uploader img.acf-image-image {
			width: 300px;
		}
		#acf_93 .acf-image-uploader img.acf-image-image{
			width: 32px;
		}
		#acf-more_info_content.acf-conditional_logic-hide {
			display: none;
		}
		#acf-more_info_content {
			margin-right: 0 !important;
			display:block;
			float:left;
			min-width: 62%;
			clear: both;

		}
		ul.c-list li {display: none;}
#acf-two_column_layout_right, #acf-two_column_layout_left {
    display: block;
    float: left;
    margin-right: 4em;
    max-width: 47%;
    min-width: 38%;
}
		#acf-two_column_layout_right {
			margin-right: 0 !important;
		}
		#acf-full_width {
			width: 62%;
		}
		div[data-field_type="message"] {}
		div[data-field_type="message"] p {
			margin: 0;
			font-weight: bold;
			font-family: open sans;
		}
 		.acf_input .label {display:none;}
 		#acf_93 p.label {
 			display: block !important;
 		}
 		#acf_93 .field_type-message:nth-child(2) {
		    border-top: 0px solid #EEEEEE;
		    margin-top: 0em;
		    max-width: 700px;
		    padding-bottom: 0;
		    padding-top: 2em;
		}
 		#acf_93 .field_type-message {
		    border-top: 0px solid #dedede;
		    margin-top: 1em;
		    max-width: 700px;
		    padding-bottom: 0;
		    padding-top: 3em;
		    border-bottom:1px solid #eeeeee;
		}
 		#acf_93 .field_type-message p.label label {
    		font-family: open sans;
    		font-size: 2.5em;
    		font-weight: 100;
    		color: #249dd6;
		}
		#acf_93 .acf_postbox .field {

		}
#acf-photo_gallery .acf_flexible_content .layout .menu-item-handle {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.08);
    border-color: transparent;
    border-radius: 0 0 0 0;
    box-shadow: 0 0 0 transparent;
    color: transparent;
    display: block;
    height: 30px;
    margin: 0;
    position: absolute;
    text-indent: -99988px;
    width: 100%;
    z-index: 9999;
}
#acf-photo_gallery .acf_flexible_content .layout .menu-item-handle span {
    color: rgba(0, 0, 0, 0.5);
    display: block;
    font-family: open sans;
    font-size: 22px;
    font-style: normal;
    font-weight: 300;
    text-indent: 0;
}
#acf_36, #acf_129 {
	display: none;
}
	</style>
 
	<script type="text/javascript">
	(function($){

		
		// 		$("ul.contact li input").each(function()
		// 		{
		// 			value = $(this).attr('rel');
		// 		    	alert('test')
		// 		});
		// $(':checkbox').each(function() {
  //           this.checked = true;                        
  //       });
		/*
		*  hide_fields
		*
		*  @description: a small function to hide all the conditional fields
		*  @created: 17/07/12
		*/
		
		function hide_fields()
		{
			//$('#acf-left_column_content, #acf-left_column_title, #acf-layout, .acf-tab-group, #acf-right_column_title_, #acf-right_column_content_').hide();
			$('#acf_26, #acf_31').hide();
		}
		function hide_gallery(){

		}
		
		/*
		*  acf/setup_fields
		*  - Similar to $(document).ready, but runs after ACF has instantiated itself
		*/
		
		$(document).live('acf/setup_fields', function(e, postbox){
			
			$('ul.checkbox_list li input:checkbox:checked').each(function() {
				value = $(this).val();
				$('ul.c-list li[rel="'+value+'"]').fadeIn();
			})
			$('ul.checkbox_list li input').live('click',function() {
				value = $(this).val();
				if(this.checked){
				$('ul.c-list li[rel="'+value+'"]').fadeIn();
				}else{
				$('ul.c-list li[rel="'+value+'"]').fadeOut();	
				}
			})
			// trigger change on the select field to show selected field
			//$('#acf-field-content_type-text').trigger('click');
			//$('#acf-field-format-textcontent').live()
			function showText(){
				$('#acf_129').hide();
				$('#acf_36').fadeIn();
			}
			function showGallery(){
				$('#acf_36').hide();
				$('#acf_129').fadeIn();
			}
			if ($('input#acf-field-content_type-text:checked').length > 0) {
				showText();
			}
			$('input#acf-field-content_type-text:checked').live('click',function(){
				showText();
			})
			if ($('input#acf-field-content_type-gallery:checked').length > 0) {
				showGallery();
			}
			$('input#acf-field-content_type-gallery:checked').live('click',function(){
				showGallery();
			})
		});
		
		
		/*
		*  Hero Type change
		*/

		$('#acf-page_type input').live('click', function(){
			
			// vars
			var value = $(this).val();
			if( value == "twocol" )
			{
				$('#acf-field-layout-twocol').trigger('click');
			}
			else if( value == "onecol" )
			{
				$('#acf-field-layout-onecol').trigger('click');
			}
			
		});
		$('#acf-content_type input').live('click', function(){
			var value = $(this).val();

	
			if( value == "text" )
			{

				$('#acf-field-layouts-textpage, li.field_key-field_51cbde1420ffc a').trigger('click');
			}
			else if( value == "gallery" )
			{	
				$('#acf-field-layouts-gallerypage').trigger('click');

			}
			else if( value == "slider" )
			{
				$('#acf-hero_slider').show();
			}
			
		});


	})(jQuery);
	</script>
	<?php
}
 
add_action('acf/input/admin_head', 'my_head_input');

?>
