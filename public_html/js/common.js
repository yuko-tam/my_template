//---------------------------------------------------------------------------------------------
//hover
//---------------------------------------------------------------------------------------------
function rollOverFn(){
    var imgNum=document.getElementsByTagName("img");
    var inputNum=document.getElementsByTagName("input");
    overNum=new Array;
    for(i=0;i<imgNum.length;i++){overNum[i]=imgNum[i];}
    for(i=0;i<inputNum.length;i++){overNum[i+imgNum.length]=inputNum[i];}
    for(i=0;i<overNum.length;i++){
        if(overNum[i].className.indexOf("js-rollOver")!=-1){
            overNum[i].overimg=new Image();
            if(overNum[i].className.indexOf(":")!=-1){
                Replace=overNum[i].className.split(":");
                Replace=Replace[1].split(" ");
                overNum[i].overimg.src=Replace[0];
            }else{
                Replace = overNum[i].src.length;
                overNum[i].overimg.src=overNum[i].src.substring(0,Replace-4)+"_hover"+overNum[i].src.substring(Replace-4,Replace);
            }
            overNum[i].setAttribute("out",overNum[i].src);
            overNum[i].onmouseover=new Function('this.src=this.overimg.src;');
            overNum[i].onmouseout=new Function('this.src=this.getAttribute("out");');
        }
    }
}
window.onload=rollOverFn;


/*
 * jquery-auto-height.js
 *
 * Copyright (c) 2010 Tomohiro Okuwaki (http://www.tinybeans.net/blog/)
 * Licensed under MIT Lisence:
 * http://www.opensource.org/licenses/mit-license.php
 * http://sourceforge.jp/projects/opensource/wiki/licenses%2FMIT_license
 *
 * Since:   2010-04-19
 * Update:  2013-08-16
 * version: 0.04
 * Comment:
 *
 * jQuery 1.2 <-> 1.10.2
 *
 */

 (function($){
    $.fn.autoHeight = function(options){
        var op = $.extend({

            column  : 0,
            clear   : 0,
            height  : 'minHeight',
            reset   : '',
            descend : function descend (a,b){ return b-a; }

        },options || {}); // options縺ｫ蛟､縺後≠繧後�荳頑嶌縺阪☆繧�

        var self = $(this);
        var n = 0,
            hMax,
            hList = new Array(),
            hListLine = new Array();
            hListLine[n] = 0;

        // 隕∫ｴ�縺ｮ鬮倥＆繧貞叙蠕�
        self.each(function(i){
            if (op.reset == 'reset') {
                $(this).removeAttr('style');
            }
            var h = $(this).height();
            hList[i] = h;
            if (op.column > 1) {
                // op.column縺斐→縺ｮ譛螟ｧ蛟､繧呈�ｼ邏阪＠縺ｦ縺�￥
                if (h > hListLine[n]) {
                    hListLine[n] = h;
                }
                if ( (i > 0) && (((i+1) % op.column) == 0) ) {
                    n++;
                    hListLine[n] = 0;
                };
            }
        });

        // 蜿門ｾ励＠縺滄ｫ倥＆縺ｮ謨ｰ蛟､繧帝剄鬆�↓荳ｦ縺ｹ譖ｿ縺�
        hList = hList.sort(op.descend);
        hMax = hList[0];

        // 鬮倥＆縺ｮ譛螟ｧ蛟､繧定ｦ∫ｴ�縺ｫ驕ｩ逕ｨ
        var ie6 = typeof window.addEventListener == "undefined" && typeof document.documentElement.style.maxHeight == "undefined";
        if (op.column > 1) {
            for (var j=0; j<hListLine.length; j++) {
                for (var k=0; k<op.column; k++) {
                    if (ie6) {
                        self.eq(j*op.column+k).height(hListLine[j]);
                    } else {
                        self.eq(j*op.column+k).css(op.height,hListLine[j]);
                    }
                    if (k == 0 && op.clear != 0) {
                        self.eq(j*op.column+k).css('clear','both');
                    }
                }
            }
        } else {
            if (ie6) {
                self.height(hMax);
            } else {
                self.css(op.height,hMax);
            }
        }
    };
})(jQuery);


jQuery(document).ready(function($){
 
    // Define a blank array for the effect positions. This will be populated based on width of the title.
    var bArray = [];
    // Define a size array, this will be used to vary bubble sizes
    var sArray = [4,6,8,10];
 
    // Push the header width values to bArray
    for (var i = 0; i < $('.mainVisual').width(); i++) {
        bArray.push(i);
    }
     
    // Function to select random array element
    // Used within the setInterval a few times
    function randomValue(arr) {
        return arr[Math.floor(Math.random() * arr.length)];
    }
 
    // setInterval function used to create new bubble every 350 milliseconds
    setInterval(function(){
         
        // Get a random size, defined as variable so it can be used for both width and height
        var size = randomValue(sArray);
        // New bubble appeneded to div with it's size and left position being set inline
        // Left value is set through getting a random value from bArray
        $('.mainVisual').append('<div class="individual-bubble" style="left: ' + randomValue(bArray) + 'px; width: ' + size + 'px; height:' + size + 'px;"></div>');
         
        // Animate each bubble to the top (bottom 100%) and reduce opacity as it moves
        // Callback function used to remove finsihed animations from the page
        $('.individual-bubble').animate({
            'bottom': '100%',
            'opacity' : '-=0.7'
        }, 5000, function(){
            $(this).remove()
        }
        );
 
 
    }, 350);
 
});


//---------------------------------------------------------------------------------------------
//comment
//---------------------------------------------------------------------------------------------
$(function () {
    var wWidth = window.innerWidth,
        pcWidth = 641;

   $('a[href^="#"]').click(function() {
      var speed = 400; 
      var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top;
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
   });


    $(".spMenu").on('click',function(){
        $(".header .navi").toggle();
        $('.menu-trigger').toggleClass("on");
    })

    $(".faqList h2").on('click',function(){
        $(this).next().toggle();
        $(this).toggleClass("on");
    })

    if(wWidth > pcWidth ){
        $(".blogList.blogInner li:not(:first-child)").autoHeight({column:3,clear:1});

    }


    $('.index .staffList').slick({
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      centerMode: true,
      variableWidth: true
    });

})
