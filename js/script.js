if($.browser.mozilla||$.browser.opera){document.removeEventListener("DOMContentLoaded",$.ready,false);document.addEventListener("DOMContentLoaded",function(){$.ready()},false)}$.event.remove(window,"load",$.ready);$.event.add( window,"load",function(){$.ready()});$.extend({includeStates:{},include:function(url,callback,dependency){if(typeof callback!='function'&&!dependency){dependency=callback;callback=null}url=url.replace('\n','');$.includeStates[url]=false;var script=document.createElement('script');script.type='text/javascript';script.onload=function(){$.includeStates[url]=true;if(callback)callback.call(script)};script.onreadystatechange=function(){if(this.readyState!="complete"&&this.readyState!="loaded")return;$.includeStates[url]=true;if(callback)callback.call(script)};script.src=url;if(dependency){if(dependency.constructor!=Array)dependency=[dependency];setTimeout(function(){var valid=true;$.each(dependency,function(k,v){if(!v()){valid=false;return false}});if(valid)document.getElementsByTagName('head')[0].appendChild(script);else setTimeout(arguments.callee,10)},10)}else document.getElementsByTagName('head')[0].appendChild(script);return function(){return $.includeStates[url]}},readyOld:$.ready,ready:function(){if($.isReady) return;imReady=true;$.each($.includeStates,function(url,state){if(!state)return imReady=false});if(imReady){$.readyOld.apply($,arguments)}else{setTimeout(arguments.callee,10)}}});
$.include('js/jquery.easing.1.3.js')
$.include('js/jquery.cycle.all.js')
$.include('js/jquery.backgroundPosition.js')
$.include('js/jquery.insetBorderEffect.js')
$.include('js/jquery.jcarousel.js')
$.include('js/superfish.js')
$.include('js/hoverIntent.js')
$.include('js/pagination.js')
$(function(){
    if($('.tabs').length)$.include('js/tabs.js')
	if($('#contact-form').length||$('#newsletter-alt-form').length||$('#newsletter-form').length)$.include('js/forms.js')
	if($('.top1').length||$('.layouts-nav li a').length)$.include('js/scrollTop.js')
	if($("#thumbs").length){$.include('js/jquery.galleriffic.js')}
	if($(".lightbox-image").length)$.include('js/jquery.prettyPhoto.js')
	if($('#countdown_dashboard').length)$.include('js/jquery.lwtCountdown-1.0.js')
	$('.top1').click(function(e){$('html,body').animate({scrollTop:'0px'},800);return false})
	$('.layouts-nav li a').click(function(){var offset=$($(this).attr('href')).offset();$('html,body').animate({scrollTop:offset.top},800);return false})
	$("#accordion dt").click(function(){$(this).next("#accordion dd").slideToggle("slow").siblings("#accordion dd:visible").slideUp("slow");$(this).toggleClass("active");$(this).siblings("#accordion dt").removeClass("active");return false})
	$(".slideDown dt").click(function(){$(this).toggleClass("active").parent(".slideDown").find("dd").slideToggle()})
	$(".code a.code-icon").toggle(function(){$(this).find("i").text("-");$(this).next("div.grabber").slideDown()},function(){$(this).find("i").text("+");$(this).next("div.grabber").slideUp()})
	$('header .links li a').hover(function(){$(this).stop().animate({backgroundPosition:'316px 0'})},function(){$(this).stop().animate({backgroundPosition:'0 0'})})
	$('.button').hover(function(){$(this).stop().animate({backgroundColor:'#000'})},function(){$(this).stop().animate({backgroundColor:'#37a8ca'})})
})			
function onAfter(curr, next, opts, fwd){var $ht=$(this).height();$(this).parent().animate({height:$ht})}
function Highlight(e)
{
	if(e.className!="raw_selectedbg")
		e.className="mouseover";
}
function UnHighlight(e,classname)
{
//	alert(e.className)
	if(e.className!="raw_selectedbg")
		e.className=classname;
}