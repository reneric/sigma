include('js/jquery.easing.1.3.js');
include('js/jquery-ui-1.8.11.custom.min.js');
include('js/jquery.transform-0.9.3.min.js');
include('js/jquery.animate-colors-min.js');
include('js/mathUtils.js');
include('js/superfish.js');
include('js/switcher.js');
include('js/jquery.mousewheel.js');
include('js/sprites.js');
include('js/forms.js');
include('js/hoverSprite.js');
include('js/slider.js');
include('js/bgStretch.js');
include('js/googleMap.js');


//----Include-Function----
function include(url){ 
  document.write('<script src="'+ url + '" type="text/javascript" ></script>'); 
}
//--------global-------------
var isSplash = true;
//------DocReady-------------
$(document).ready(function(){ 
    if(location.hash.length == 0){
        location.hash="!/"+$('#content > ul > li:first-child').attr('id');
    }

     $('ul#menu').superfish({
          delay:       800,
          animation:   {height:'show'},
          speed:       600,
          autoArrows:  false,
         dropShadows: false,
         	onInit: function(){
  				$("#menu > li > a").each(function(index){
  					var conText = $(this).find('.mText').text();
 					$(this).find('.textHolder').append("<span class='menuTextOver'>"+conText+"</span>")	
  				})
  	 		}
        });

});
  
 //------WinLoad-------------  
$(window).load(function(){  

$("#buttonPrev").hoverSprite({onLoadWebSite: true});
$("#buttonNext").hoverSprite({onLoadWebSite: true});
$(".linksHolder > ul > li > a").hoverSprite({onLoadWebSite: true});

$('#bgStretch').bgStretch({align:'rightBottom'})    
$('.button').sprites({method:'gStretch',hover:true});

    $('.linkBack').hover(
        function(){
                $(this).find('.backText').stop(true).animate({color:'#8a8989'},500,'easeOutExpo');
              if(($.browser.msie) && ($.browser.version <= 8)){}else{
                    $(this).find('.pic').stop(true).animate({scale:1.1},300,'easeOutSine').animate({top:"0px"},400,'easeOutExpo');
             }
        },
        function(){
            $(this).find('.backText').stop(true).animate({color:'#000'},500,'easeOutExpo');
              if(($.browser.msie) && ($.browser.version <= 8)){}else{
                    $(this).find('.pic').stop(true).animate({scale:1},300,'easeOutSine').animate({top:"0px"},400,'easeOutExpo');
             }
            }
    )    
       
       
var menuItems = $('#menu >li'); 
  
navInit();
function navInit(){ 
    menuItems.each( function(index){
            _delay = (index*100)+500;
                // menuItems.eq(index).stop().delay(_delay).animate({left:"0px"}, 1000, 'easeOutExpo');
            } );

$('body').mousemove(function(){
            var _x = event.pageX;
            var mouseXPos = _x / $(document).width();
});

}

///////////////////////////////////////////////
    var navItems = $('.menu > ul >li');

   // $('.menu > ul >li').eq(0).css({'display':'none'});
	var content=$('#content'),
		nav=$('.menu');

    	$('#content').tabs({
		preFu:function(_){
			_.li.find('.backHolder').css({left:"-1700px",'display':'none'});
			_.li.find('.box').css({left:"-1700px",'display':'none'});
			_.li.css({'display':'none'});
		}
		,actFu:function(_){			
			if(_.curr){
			     _.curr.css({'display':'block'});
				_.curr.find('.backHolder').css({'display':'block',left:"-1700px"}).stop().delay(600).animate({left:"0px"}, 800,'easeOutCirc');
				_.curr.find('.box').css({'display':'block',left:"-1700px"}).stop().delay(800).animate({left:"0px"}, 800,'easeOutCirc');
               
                if ((_.n == 0) && ((_.pren>0) || (_.pren==undefined))){splashMode();}
                if (((_.pren == 0) || (_.pren == undefined)) && (_.n>0) ){contentMode(); }
            }
        
			if(_.prev){
			     _.prev.find('.backHolder').stop().animate({left:'1700px'},450,'easeInCubic');
			     _.prev.find('.box').stop().delay(200).animate({left:'1700px'},450,'easeInCubic', function(){_.prev.css({'display':'none'});});
             
             }
		}
	})
    

    function splashMode(){
        isSplash = true;
        $('#content').css({'z-index':1});
        $('.menuHolder').css({'z-index':2});
            menuItems.each( function(index){
            _delay = (index*100)+300;
                 menuItems.eq(index).css({left:"-1700px"}).stop().delay(_delay).animate({left:"0px"}, 800, 'easeOutCirc');
            } );
       
    }
    
    function contentMode(){  
        isSplash = false;
         $('#content').css({'z-index':2});
        $('.menuHolder').css({'z-index':1});
          menuItems.each( function(index){
            _delay = (index*100)+500;
                 menuItems.eq(index).stop().delay(_delay).animate({left:"1700px"}, 450, 'easeInCirc');
            } );
           
    }		
    
	nav.navs({
			useHash:true,
             hoverIn:function(li){
                $(".mText", li).stop(true).animate({left:'250px'},500,'easeOutExpo');
                $(".menuTextOver", li).stop(true).animate({left:'-5px'},500,'easeOutExpo');
               
                    if(($.browser.msie) && ($.browser.version <= 8)){}else{
                        $(".pic", li).stop(true).animate({scale:1.1},300,'easeOutSine').animate({top:"0px"},400,'easeOutExpo');
                    }
             },
                hoverOut:function(li){
                    if ((!li.hasClass('with_ul')) || (!li.hasClass('sfHover'))) {
                        $(".mText", li).stop(true).animate({left:'-5px'},500,'easeOutExpo');
                        $(".menuTextOver", li).stop(true).animate({left:'-250px'},500,'easeOutExpo');
                        
                          if(($.browser.msie) && ($.browser.version <= 8)){}else{
                                $(".pic", li).stop(true).animate({scale:1},300,'easeOutSine').animate({top:"0px"},400,'easeOutExpo');
                            }
                    } 
                } 
		})
        
        
		.navs(function(n){			
			$('#content').tabs(n);
		})

//////////////////////////////////////////
   	var h_cont=865;
	function centrRepos() {
		var h=$(window).height();
		if (h>(h_cont+40)) {
			m_top=~~(h-h_cont)/2;
			h_new=h;
		} else {
			m_top=20;
			h_new=h_cont+40;
		}
		$('.center').stop().animate({paddingTop:m_top},800,'easeOutExpo');

	}
	centrRepos();
    ///////////Window resize///////
	$(window).resize(function(){
        centrRepos()
        }
    );

    } //window function
) //window load