jQuery(function($){
function init(){
	var headerHeight = $('header#masthead').height();
	var winHeight = $(window).height();
	var footerHeight = $('footer').height();
	var primaryHeight = $('#primary').height();
	var cHeight = $("article.page").height();
	var max = headerHeight+cHeight;
	var height = winHeight-footerHeight;
	var wrap = winHeight-footerHeight;
	$(".top-scroll-wrap").css('maxHeight', max+'px');
	$(".top-scroll-wrap").css('height', height -20+ 'px');
	$('.top-scroll').css('height', wrap - 20 + 'px');
}
function fader(){
	var scrollWrap = $(".top-scroll-wrap").height();
	var scroll = $(".top-scroll").height();
	if(scroll > scrollWrap){
		$('span.fade').addClass("hidden");
	}else{
		$('span.fade').removeClass("hidden");
	}

}
setTimeout(fader,1000);
init();

function resize(){
	// Content Height
	var headerHeight = $('header#masthead').height();
	var winHeight = $(window).height();
	var footerHeight = $('footer').height();
	var primaryHeight = $('#primary').height();
	var cHeight = $("article.page").height();
	var max = headerHeight+cHeight;
	var height = winHeight-footerHeight;
	var wrap = winHeight-footerHeight;
	$(".top-scroll-wrap").css('maxHeight', max+30+'px');
	$(".top-scroll-wrap").css('height', height -20+ 'px');
	$('.top-scroll').css('height', wrap - 20 + 'px');
	fader();
}

// Re-calculate on window resize
$(window).resize(function() {
	resize()
})

var active = $("ul.team li.active")
var id = active.attr('rel')
	
$("ul.member-bgs li[rel='"+id+"']").addClass('active')

$("ul.team li").live('click',function(){
	$("#sidebar span.more").addClass('hidden');
	var id = $(this).attr('rel')

	$("ul.member-bgs li").removeClass('active')
	$("ul.member-bgs li[rel='"+id+"']").addClass('active')
	$("ul.facts").removeClass('active')
	$("div.meet").addClass('active')
	$("ul.facts[rel='"+id+"']").addClass('active')
	$("ul.team li").removeClass('active')
	$(this).addClass('active')
})


});









