/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
  $(".sel_box button").click(function(){
      $(".sel_box .list1").css("display","block");
  });
    $(".sel_box .list1>li").mouseenter(function(){
        $(this).css("background","#fff");
    });
      $(".sel_box .list1>li ").mouseleave(function(){
        $(this).css("background","#f4f4f4");
        
    });
     $(".syear .list1>li ").mouseenter(function(){
        $(this).css("background","#fff");
    });
      $(".syear .list>li").mouseleave(function(){
        $(this).css("background","#f4f4f4");
        
    });
    
    $(".sel_box .list1>li>a").click(function(){
        var tel1=$(this).text();
         $(".sel_box .sel_op").text(tel1);
         $(".sel_box .list1").css("display","none");
    });
    //생년월일
    var j=1900;
    for(var i=1900;i<=2016;i++){
        
          $(".syear").append('<li><a href="#">'+j+'</li>');
          j++;
    }
    $(".btn_sel").click(function(){
      $(".syear").css("display","block");
  });
  
}); 


