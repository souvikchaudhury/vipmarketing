/* =========================================================

// SKD Slider

// Datum: 2013-02-14
// Author: Samir Kumar Das
// Mail: cse.samir@gmail.com
// Web: http://dandywebsolution.com/skdslider

 *  $('#demo').skdslider({'delay':5000, 'fadeSpeed': 2000});
 *

// ========================================================= */
(function($){
    $.skdslider = function(container,options){
        // settings
        var config = {
            'delay': 2000,
            'fadeSpeed': 500,
			'showNav':true,
			'autoStart':true,
			'showNextPrev':false,
			'pauseOnHover':false,
			'numericNav':false,
			'showPlayButton':false
        };
		
        if ( options ){$.extend(config, options);}
        // variables
		
	    var touch = (( "ontouchstart" in window ) || window.DocumentTouch && document instanceof DocumentTouch);
	  
       
	    var element=$(container);
		element.find('ul').addClass('slides');
        var slides = element.find('ul.slides li');
		var targetSlide=0;
		config.currentSlide=0;
		config.currentState='pause';
		
		//if (touch)
		$.skdslider.enableTouch(element,slides, config);
	   
	    $.skdslider.createNav(element,slides, config);
	    slides.eq(targetSlide).show();
		if (config.autoStart==true){
		   config.currentState='play';	
           config.interval=setTimeout(function() {
                    $.skdslider.playSlide(element,slides, config);
                }, config.delay); 
		}
		
		if(config.pauseOnHover==true){
		   slides.hover(function(){clearTimeout(config.interval);},function(){ $.skdslider.playSlide(element,slides, config);});	
	    }
    };
	

  $.skdslider.createNav=function(element,slides,config){
			
			var slideSet ='<ul class="slide-navs">';
			for(i=0;i<slides.length;i++){
			  var slideContent='';
			  if(config.numericNav==true) slideContent=(i+1);
			  if(i==0)
			  slideSet+='<li class="current-slide slide-nav-'+i+'"><a>'+slideContent+'</a></li>';
			  else
			  slideSet+='<li class="slide-nav-'+i+'"><a>'+slideContent+'</a></li>';
			}
			slideSet+='</ul>';
			
			
			
			if (config.showNav==true){
					element.append(slideSet);
					var nav_width=element.find('.slide-navs')[0].offsetWidth;
					nav_width=parseInt((nav_width/2));
					nav_width=(-1)*nav_width;
					element.find('.slide-navs').css('margin-left',nav_width);
					// Slide marker clicked
					element.find('.slide-navs li').click(function(){
						index = element.find('.slide-navs li').index(this);
						targetSlide = index;
						clearTimeout(config.interval);
						$.skdslider.playSlide(element,slides, config,targetSlide);
						return false;
					});
			}
			
	    if (config.showNextPrev==true){
			 var nextPrevButton ='<a class="prev"></a>'; 
			     nextPrevButton +='<a class="next"></a>'; 
				 
			 element.append(nextPrevButton);
			 
			 element.find('a.prev').click(function(){
				 $.skdslider.prev(element,slides, config);									   
			 });
			
			 element.find('a.next').click(function(){
				  $.skdslider.next(element,slides, config);								   
			 });
		}
		
	  if (config.showPlayButton==true){
		   
			var playPause =(config.currentState=='play' || config.autoStart==true)?'<a class="play-control pause"></a>':'<a class="play-control play"></a>';  
			element.append(playPause);			
			element.hover(function(){element.find('a.play-control').css('display','block');},function(){element.find('a.play-control').css('display','none');});
		   
		    element.find('a.play-control').click(function(){
												   
					if(config.currentState=='play')
					{
					   clearTimeout(config.interval);
					   config.currentState='pause';
					   $(this).addClass('play');
					   $(this).removeClass('pause');
					}
					else
					{
					   config.currentState='play';
					   config.autoStart=true;
					   $(this).addClass('pause');
					   $(this).removeClass('play');
					   
					   if((config.currentSlide+1)==slides.length)targetSlide = 0;
					   else targetSlide = (config.currentSlide+1);
					   
					   clearTimeout(config.interval);
					   $.skdslider.playSlide(element,slides, config,targetSlide);
					}
						
				   return false;
			 });
	  }
	  
  };
  
 $.skdslider.next=function(element,slides,config){
    if((config.currentSlide+1)==slides.length)targetSlide = 0;
	else targetSlide = (config.currentSlide+1);
	
	clearTimeout(config.interval);
	$.skdslider.playSlide(element,slides, config,targetSlide);
	return false;
 }
 
 $.skdslider.prev=function(element,slides,config){
    if(config.currentSlide==0)targetSlide = (slides.length-1);
	else targetSlide = (config.currentSlide-1);

	clearTimeout(config.interval);
	$.skdslider.playSlide(element,slides, config,targetSlide);
	return true;
 }
 
 $.skdslider.playSlide=function(element,slides,config,targetSlide){
	   
	    element.find('.slide-navs li').removeClass('current-slide');	
		slides.eq(config.currentSlide).fadeOut(config.fadeSpeed);
		
		if(typeof (targetSlide)=='undefined'){
	      targetSlide = ( config.currentSlide+1 == slides.length ) ? 0 : config.currentSlide+1;
		}
		
		element.find('.slide-navs li').eq(targetSlide).addClass('current-slide');
	    slides.eq(targetSlide).fadeIn(config.fadeSpeed, function() {													 
			$.skdslider.removeIEFilter($(this)[0]);
		});
		config.currentSlide=targetSlide;
		
	  if (config.autoStart==true && config.currentState=='play'){
			config.interval=setTimeout((function() {
				$.skdslider.playSlide(element,slides, config);
			}), config.delay);
	  }
  };
  
  $.skdslider.enableTouch=function(element,slides,config){
	  element[0].addEventListener('touchstart', onTouchStart, false);
	   var startX;
       var startY;
	   var dx;
	   var dy;
	   
	   function onTouchStart(e){
		   startX = e.touches[0].pageX;
    	   startY = e.touches[0].pageY; 
		   element[0].addEventListener('touchmove', onTouchMove, false);
           element[0].addEventListener('touchend', onTouchEnd, false);
	   }
	   
	   function onTouchMove(e) {
				 e.preventDefault();
	    		 var x = e.touches[0].pageX;
	    		 var y = e.touches[0].pageY;
	    		 dx = startX - x;
	    		 dy = startY - y;
      }
	  
	 function onTouchEnd(e) {
				 element[0].removeEventListener('touchmove', onTouchMove, false);
				 if(dx>0){
					  $.skdslider.next(element,slides, config);		 
				 }else{
				     $.skdslider.prev(element,slides, config);			 
			     }
	    		 element[0].removeEventListener('touchend', onTouchEnd, false);
    	 }	
  }
   
  
  $.skdslider.removeIEFilter=function(elm){
	  if(elm.style.removeAttribute){
		elm.style.removeAttribute('filter');
	   }  
  }

 $.fn.skdslider = function(options){
        return this.each(function(){
            (new $.skdslider(this,options));
        });
    };
	
})(jQuery);



jQuery(document).ready(function(){
jQuery('#bannerslider').skdslider({'delay':4000, 'fadeSpeed': 2000,'showNextPrev':true,'showPlayButton':false,'autoStart':true,'numericNav':false,});
		});