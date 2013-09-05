<?php 
/* Template Name: Homepage
 * 
 */
 get_header(); ?>

	<div id="primary" class="site-content homepage">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<div class="tough">
				<p class="animated doesnthave dark" style="display:none;">But It Doesn't Have To be</p>
					<p class="animated three">Navigating </p> 
					<p class="animated three">an </p>
					<p class="animated one">Engineering </p> 
					<p class="animated three clear">Project </p>
					<p class="animated two">can </p>
					<p class="animated two text_be">be </p>
					<p class="animated two">tough</p>
				</div><!-- .tough -->
				<div class="clear"></div>
				<img src="<?php bloginfo('template_directory'); ?>/images/loading.gif" alt="" class="loading_gif"/>
				<div id="sigma_logo" style="display:none;">
				  <img src="<?php bloginfo('template_directory'); ?>/images/Sigma-Engineering-Logo.png" alt="Sigma Engineering Logo"/><br>
					It &nbsp;&nbsp;Just &nbsp;&nbsp;Adds &nbsp;&nbsp;Up
				</div><!-- #sigma_logo -->
		<!-- BigVideo CS -->
		<link rel="stylesheet" id="admin-bar-css" href="<?php bloginfo('template_directory'); ?>/css/bigvideo.css" type="text/css" media="all">
		
		<!-- BigVideo Dependencies -->
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery-ui-1.8.22.custom.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.imagesloaded.min.js"></script>
    <script src="http://vjs.zencdn.net/4.0/video.js"></script>

    <!-- BigVideo -->
    <script src="<?php bloginfo('template_directory'); ?>/js/bigvideo.js"></script>

    <!-- Demo -->
    <script>
	    
      jQuery(function() {
        var BV = new jQuery.BigVideo({useFlashForFirefox:false,controls:false});
  			BV.init();
  			BV.show('<?php bloginfo('template_directory'); ?>/video/storm.mp4',{altSource:'<?php bloginfo('template_directory'); ?>/video/storm.webm'});
  			var BVplayer = videojs("#big-video-vid_html5_api" || "#big-video-vid_flash_api");
        BVplayer.ready(function(){
           this.on("ended", function(){
              //show poster image
              jQuery('.loading_gif').remove();
              jQuery('body').css('background','#ffffff');
              jQuery('.text_be').addClass('dark');
              BVplayer.off("ended");
              jQuery("#big-video-wrap").fadeOut(2000,function(){
                //jQuery("#big-video-wrap").remove();
                jQuery('.tough p').not('.doesnthave').fadeOut(100);
                jQuery('.tough .doesnthave').addClass('fadeInDown');
                BV.show('<?php bloginfo('template_directory'); ?>/video/sigma_sunset.mp4',{ambient:true}); 
                setTimeout(function(){  
                  jQuery("#sigma_logo").fadeIn(3000);
                  jQuery(".tough").fadeOut();             
                },2000);
                jQuery("#big-video-wrap").fadeIn(4000);
              });
              
           });
           this.on("play", function(){
              //show poster image
              setTimeout(function(){
                cssanimate('.animated.one' , 'fadeInUp' , 1000);
                cssanimate('.animated.two' , 'fadeInUp', 1500);
                cssanimate('.animated.three' , 'fadeIn', 3500);
                BVplayer.off("loadstart");
              },1000);
           });
        });
	    });
	    function cssanimate(cssclass,animation,delay){
  	    setTimeout(function(){
  	    	jQuery(cssclass).addClass(animation);
  	    },delay);
	    }
      
    </script>
				
				
				
				
				
				
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>