/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//정규표현식
var reg_uid = /^[a-z0-9_]{5,12}$/; //5~12자 영문소문자, 숫자, 특수문자 _ 사용가능
var reg_upw = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-]|.*[0-9]).{6,24}$/; 
//6~16자 영문대소문자, 숫자, 특수문자 혼합하여 사용
var reg_nickname = /^[0-9a-zA-Z가-힣]{4,20}$/; //한글10자, 영문20자, 한글,영문,숫자 사용가능
  
//스타일 내역
var s_default = {"border":"1px solid #ccc", "background-color":"#fff"}; //기본
var s_fail = {"border":"1px solid red","background-color":"#fff2f2"}; //실패
var s_success = {"border":"1px solid #214a9e","background-color":"#dee9ff"}; //성공
var s_focus = {"border":"1px solid #429e21","background-color":"#fbfff2"} //포커스 시
  
var form = $("form"),
    uid = $("#uid"),
    upw = $("#upw"),
    re_upw = $("#re_upw"),
    nickname = $("#nickname");
  
$("input").focus(function(){
    //포커싱 시 출력되는 스타일(녹색으로~)
    $(this).css(s_focus);
  
    if( this.id == "uid" ){
        $(this).next().next().show();
    }else if( this.id == "upw" ){
        $(this).next().show();
    }else if( this.id == "re_upw" ){
        $(this).next().show();
    }else if( this.id == "nickname" ){
        $(this).next().show();
    }
});
  
$("input").blur(function(){
    //기본적으로 blur 되면 배경색이 원래대로..
    $(this).css(s_default);
      
    //아이디 입력 : 올바른 값이 입력되지 않으면 빨간색으로 출력
    if( this.id == "uid" ){
        if( $(this).val() == "" ){
            $(this).css(s_default).next().next().hide();
        }else   if( reg_uid.test( $(this).val() ) != true ){
            $(this).css(s_fail);
        }else{
            $(this).css(s_success).next().next().hide();
        }
  
    //패스워드 입력
    }else if( this.id == "upw"){
        var upwSize = $(this).val().length;
        if( $(this).val() == "" ){
            $(this).css(s_default).next().hide();
        }else if( upwSize < 6 ){
            $(this).css(s_fail);
        }else{
            $(this).css(s_success).next().hide();
        }
  
    //패스워드 재입력
    }else if( this.id == "re_upw"){
        if( $(this).val() == "" ){
            $(this).css(s_default).next().hide();
        }else if( $(this).val() != upw.val() ){
            $(this).css(s_fail);
        }else{
            $(this).css(s_success).next().hide();
        }
  
    //별명 입력
    }else if( this.id == "nickname"){
        //별명 한글일때 글자 수 체크
        var nickVal = nickname.val();
        var nickSize = nickVal.length;
        var maxlen = 20;
        var i = 0;
        var bytesize = 0;
        var onechar = ""; 
        for(i=0; i < nickSize; i++){ 
            //길이제한 이 필요한 사이즈저장 
            //한글+2  
            onechar = nickVal.charAt(i); //문자 저장
            if( escape( onechar ).length > 4 ){ 
                //escape : 아스키값이 아닌 문자를 16진수로 변경해줌 (?) - 아스키문자가 아닌게 4개이상되면..
                //아스키문자: 영문대소문자,숫자,@*-_+./
                bytesize+=2; //한글일 경우 x2
            }else{ 
                bytesize++; 
            } 
        }
          
        if( $(this).val() == "" ){
            $(this).css(s_default).next().hide();
        }else if( reg_nickname.test( $(this).val() ) != true ){
            $(this).css(s_fail);
        }else if( bytesize > maxlen ){
            //alert("한글 10자, 영문 숫자 20자 초과"); 
            $(this).css(s_fail);
        }else{
            $(this).css(s_success).next().hide();
        }
    }
});



