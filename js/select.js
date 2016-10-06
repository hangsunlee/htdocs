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
    var form=$(".form");
    var uid=$("#userid");
    var pw=$("#password");
    var re_id = /^[a-z0-9_-]{3,16}$/; // 아이디 검사식
    var re_pw=/^[a-z0-9_-]{8,16}/;//영문, 숫자, 언더스코어(_), 하이픈(-)이 포함된 6~18 문자.
    form.submit(function(){
        if(re_id.test(uid.val())!==true){
        alert("사용할 수 없는 아이디입니다.");
        uid.focus();
        return false;
        }
        else if(re_pw.test(pw.val())!==true){
        alert("사용할수없는 비밀번호입니다.");
        pw.focus();
        return false;
        }
        
    });  
}); 




