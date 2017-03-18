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


//---------------------------------------------------------------------------------------------
//comment
//---------------------------------------------------------------------------------------------
$(function () {
    //ここに記述します
})
