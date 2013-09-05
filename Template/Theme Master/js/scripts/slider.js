$(window).load(function(){
	var sliders = $("#slider>div"),
		slidNumberNew=0,
		slidNumberOld=0,
		slidAll= $("#slider>div").length,
		autoPlayState = true,
		anomationStop=false,
		MSIE = ($.browser.msie) && ($.browser.version <= 8),
		spinner = '<div id="spinnerHolder"><div id="spinnerImg"></div></div>';
		
	$(window).bind("hashchange", changeSiteHash);
	changeSiteHash()	
	init()
	function init(){
		$("#buttonNext").click(nextClick)
		$("#buttonPrev").click(prevClick)
		sliders.css({"position":"absolute"});
		if(!MSIE){
			sliders.not(sliders.eq(slidNumberNew)).animate({"opacity":0}, 0)
		}else{
			sliders.not(sliders.eq(slidNumberNew)).fadeOut(0);
		}
		sliders.find(".moreBox").animate({"top":"400px"}, 0, "easeOutCubic");
        
		anomationStop=true;
        changeImage();
		autoPlay();
	}
	function changeSiteHash(){
		if(window.location.hash !="#!/home") {
			autoPlayState=false;
		}
	}
	function autoPlay(){
		setTimeout(temeOut, 3000);
		function temeOut(){
			if(autoPlayState){
				slidNumberOld = slidNumberNew
				slidNumberNew++;
				if(slidNumberNew>slidAll-1){
					slidNumberNew=0;
					autoPlayState = false;
				}
				changeImage();
			}
		}
	}
 
    ////////////////////////////
    
	function changeImage(){
 
		anomationStop=false;
		if(!MSIE){
			sliders.eq(slidNumberOld).css({"background":"none"}).animate({"opacity":0}, 500)
		}else{
			sliders.eq(slidNumberOld).fadeOut(500);
		}
        sliders.eq(slidNumberOld).find(".moreBox").stop(true).animate({"top":"400px"}, 600, "easeInCubic");
	
		
		if(!MSIE){
			sliders.eq(slidNumberNew).css({"background":"none"}).animate({"opacity":1}, 500)
		}else{
			sliders.eq(slidNumberNew).fadeIn(500);
		}
        
		sliders.eq(slidNumberNew).find(".moreBox").stop(true).delay(500).animate({"top":"250px"}, 800, "easeOutCubic" , function(){anomationStop=true;});
	
		$("#sliderNavs").append(spinner)
		setTimeout(function(){$("#spinnerHolder").remove()}, 200)
		autoPlay();
	}
	function nextClick(){
		if(anomationStop){
			autoPlayState = false;
			slidNumberOld = slidNumberNew
			slidNumberNew++;
			if(slidNumberNew>slidAll-1){
				slidNumberNew=0;
			}
			changeImage();
		}
		return false;
	}
	function prevClick(){
		if(anomationStop){
			autoPlayState = false;
			slidNumberOld = slidNumberNew
			slidNumberNew--
			if(slidNumberNew<0){
				slidNumberNew=slidAll-1;
			}
			changeImage();
		}
		return false;
	}	
})