<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
<title>KCC 금강컨트리클럽</title>
<link rel="stylesheet" type="text/css" href="css/kcc_style.css" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/select.js"></script>
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>
    //본 예제에서는 도로명 주소 표기 방식에 대한 법령에 따라, 내려오는 데이터를 조합하여 올바른 주소를 구성하는 방법을 설명합니다.
    function sample4_execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 도로명 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var fullRoadAddr = data.roadAddress; // 도로명 주소 변수
                var extraRoadAddr = ''; // 도로명 조합형 주소 변수

                // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                    extraRoadAddr += data.bname;
                }
                // 건물명이 있고, 공동주택일 경우 추가한다.
                if(data.buildingName !== '' && data.apartment === 'Y'){
                   extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                // 도로명, 지번 조합형 주소가 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                if(extraRoadAddr !== ''){
                    extraRoadAddr = ' (' + extraRoadAddr + ')';
                }
                // 도로명, 지번 주소의 유무에 따라 해당 조합형 주소를 추가한다.
                if(fullRoadAddr !== ''){
                    fullRoadAddr += extraRoadAddr;
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('sample4_postcode').value = data.zonecode; //5자리 새우편번호 사용
                document.getElementById('sample4_roadAddress').value = fullRoadAddr;
                document.getElementById('sample4_jibunAddress').value = data.jibunAddress;

                // 사용자가 '선택 안함'을 클릭한 경우, 예상 주소라는 표시를 해준다.
                if(data.autoRoadAddress) {
                    //예상되는 도로명 주소에 조합형 주소를 추가한다.
                    var expRoadAddr = data.autoRoadAddress + extraRoadAddr;
                    document.getElementById('guide').innerHTML = '(예상 도로명 주소 : ' + expRoadAddr + ')';

                } else if(data.autoJibunAddress) {
                    var expJibunAddr = data.autoJibunAddress;
                    document.getElementById('guide').innerHTML = '(예상 지번 주소 : ' + expJibunAddr + ')';

                } else {
                    document.getElementById('guide').innerHTML = '';
                }
            }
        }).open();
    }
</script>
</head>
<body>
<!-- skip nav -->
<ul id="skip">
<li><a href="#gnb" tabindex="0">주메뉴 바로가기</a></li>
<li><a href="#content">본문 바로가기</a></li>
</ul>
<!-- //skip nav -->
<div id="wrap" class="sub_bg">
	<!-- header -->	
	<div id="header">	
		<h1 class="logo">
			<a href="#" class="sp_com kcc">
				<strong class="blind">KCC 금강컨트리클럽</strong>
			</a>
		</h1>			
		<div id="site_gnb">	
			<ul class="gnb_menu">
			<li><?=$_SESSION['']?>님 환영합니다</li>
			<li><a href="#">회원정보수정</a></li>
			<li><a href="#">채팅룸</a></li>
			<li><a href="#">로그아웃</a></li>
			<li><a href="#">사이트맵</a></li>
			</ul>
		</div>
		<div id="site_menu_wrap">
			<div id="site_menu">
				<h2 class="blind">사이트메뉴</h2>				
				<ul class="site_menu_lst">
				<li class="menu_lst1">
					<a href="#" class="sp_com introduct"><span class="blind">Introduction 클럽소개</span></a>
					<ul class="site_sub_menu">
					<li><a href="#"><span class="blind">클럽소개</span></a></li>
					<li><a href="#"><span class="blind">연혁</span></a></li>
					<li><a href="#"><span class="blind">이용안내</span></a></li>
					<li><a href="#"><span class="blind">관계사 소개</span></a></li>
					<li><a href="#"><span class="blind">오시는 길</span></a></li>
					<li><a href="#"><span class="blind">CONTACT US</span></a></li>
					</ul>
				</li>
				<li class="menu_lst2">
					<a href="#" class="sp_com reservation"><span class="blind">RESERVATION 예약정보</span></a>
					<ul class="site_sub_menu">
					<li><a href="#"><span class="blind">예약관리</span></a></li>
					<li><a href="#"><span class="blind">조인관리</span></a></li>
					<li><a href="#"><span class="blind">이용내역</span></a></li>
					<li><a href="#"><span class="blind">위약정보</span></a></li>
					</ul>
				</li>
				<li class="menu_lst3">
					<a href="#" class="sp_com course"><span class="blind">COURCE 코스안내</span></a>
					<ul class="site_sub_menu">
					<li><a href="#"><span class="blind">코스소개</span></a></li>
					<li><a href="#"><span class="blind">서코스</span></a></li>
					<li><a href="#"><span class="blind">동코스</span></a></li>
					<li><a href="#"><span class="blind">남코스</span></a></li>
					<li><a href="#"><span class="blind">코스 갤러리</span></a></li>
					</ul>
				</li>
				<li class="menu_lst4">
					<a href="#" class="sp_com facilities"><span class="blind">FACILITIES 시설안내</span></a>
					<ul class="site_sub_menu">
					<li><a href="#"><span class="blind">클럽하우스</span></a></li>
					<li><a href="#"><span class="blind">특선메뉴</span></a></li>
					<li><a href="#"><span class="blind">그늘집</span></a></li>
					<li><a href="#"><span class="blind">락커룸</span></a></li>
					<li><a href="#"><span class="blind">프로샵</span></a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="sp_com community"><span class="blind">COMMUNITY 커뮤니티</span></a>
					<ul class="site_sub_menu">
					<li><a href="#"><span class="blind">공지사항</span></a></li>
					<li><a href="#"><span class="blind">자료실</span></a></li>
					<li><a href="#"><span class="blind">Joinroom</span></a></li>
					</ul>
				</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //header -->
	
	<hr>
	
	<!-- container -->
	<div id="container">
		<div id="content">
				<div class="sub_con">
				<div class="left_con">
					<h2 class="sp_sub lnb_title">회원서비스</h2>
					<ul class="lnb">
					<li><a href="#">로그인<span class="sp_sub select_ico"></span></a></li>
					<li><a href="#" class="selected_hard">회원가입<span class="sp_sub select_ico"></span></a></li>
					<li><a href="#">아이디/비밀번호찾기<span class="sp_sub select_ico"></span></a></li>
					<li><a href="#">회원정보 수정<span class="sp_sub select_ico"></span></a></li>
					<li><a href="#">개인정보 취급방침<span class="sp_sub select_ico"></span></a></li>
					</ul> 
				</div>		
				<div class="right_con">	
					<p class="pg_nav">	
						<a href="#">홈</a>
						<span>&gt;</span>
						<a href="#">회원서비스</a>						
						<span>&gt;</span>
						<strong>회원가입</strong>
					</p>
					<div class="join_wrap">	
						<h2 class="sp_sub join_title">회원가입</h2>
						<p class="join_txt">다양한 서비스와 풍부한 컨텐츠를 만나실 수 있는 회원가입입니다.</p>
						<ol class="join_step">
						<li>약관동의</li>
						<li>본인인증</li>
						<li class="selected">회원정보입력</li>
						<li>가입완료</li>
						</ol>
					</div>
					<div class="article_box">
						<div class="art_tit_wrap">
							<h3 class="article_tit">상세정보 입력</h3>
							<p class="tip"><em>*</em>표시는 필수입력 항목입니다.</p>
						</div>					
						<div class="enter_area">
                                                    <form action="member.php" method="post">
						<fieldset>
							<table class="enter_form">
							<caption><span>회원정보 입력</span></caption>	
							<tr>
								<th><label for="ko_name">한글이름</label><em>*</em></th>
								<td><input type="text" id="ko_name" name="ko_name" class="inptxt"></td>
							</tr>	
							<tr>
								<th><label for="eg_name">영문이름</label></th>
								<td><input type="text" id="eg_name" name="eg_name" class="inptxt"></td>
							</tr>
							<tr>
								<th><span>생년월일</span><em>*</em></th>
								<td>
									<div class="sel_box year">
										<p>
											<span class="sel_op">1984</span>
											<a href="#" class="btn_sel"><span class="sp_ly ly_off"></span></a>
										</p>
										<ul class="syear list1">
											
										</ul>
									</div>
									<span class="year_txt">년</span>
									<div class="sel_box">
										<p>
											<span class="sel_op">1</span>
											<a href="#" class="btn_sel"><span class="sp_ly ly_off"></span></a>
										</p>
										<ul>
											<li><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
											<li><a href="#">6</a></li>
											<li><a href="#">7</a></li>
											<li><a href="#">8</a></li>
											<li><a href="#">9</a></li>
											<li><a href="#">10</a></li>
											<li><a href="#">11</a></li>
											<li><a href="#">12</a></li>
										</ul>
									</div>
									<span class="year_txt">월</span>
									<div class="sel_box">
										<p>
											<span class="sel_op">1</span>
											<a href="#" class="btn_sel"><span class="sp_ly ly_off"></span></a>
										</p>
										<ul>
											<li><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
											<li><a href="#">6</a></li>
											<li><a href="#">7</a></li>
											<li><a href="#">8</a></li>
											<li><a href="#">9</a></li>
											<li><a href="#">10</a></li>
											<li><a href="#">11</a></li>
											<li><a href="#">12</a></li>
										</ul>
									</div>
									<span class="year_txt">일</span>
								</td>
							</tr>	
							<tr>
								<th><label for="userid">아이디</label><em>*</em></th>
								<td>
									<input type="text" id="userid" class="inptxt">
									<a href="#" class="btn_img btn_cnfrm"><span class="btn_img">중복확인</span></a>
									<span class="tip2">사이트내에서 표시되는 본인정보이며 저장 후 수정하실 수 없습니다.</span>
								</td>
							</tr>
							<tr>
								<th><label for="password">비밀번호</label><em>*</em></th>
								<td>
									<input type="password" id="password" class="inptxt">
									<span class="tip2">영문 소문자, 숫자 포함 4자리 이상 10자리 이하입니다.</span>
								</td>
							</tr>
							<tr>
								<th><label for="password_confirm">비밀번호 확인</label><em>*</em></th>
								<td>
									<input type="password" id="password_confirm" class="inptxt">
									<span class="tip2">비밀번호를 한번 더 입력하세요.</span>
								</td>
							</tr>
							<tr>
								<th><span>전화번호</span></th>
								<td>
									<div class="sel_box phone">
                                                                            <input type="hidden" name="tel1" value="010">
										<p>
											<span class="sel_op">010</span>
                                                                                        <button type="button" class="btn_sel">
											<span class="sp_ly ly_off"></span></button>
										</p>
										<ul class="list1">
											<li><a href="#">010</a></li>
											<li><a href="#">011</a></li>
											<li><a href="#">016</a></li>
											<li><a href="#">017</a></li>
										</ul>
									</div>
									<span class="hyphen">-</span>
									<input type="text" id="tel_m" title="전화번호 중간 번호 입력" class="inptxt w41">		
									<span class="hyphen">-</span>
									<input type="text" id="tel_e" title="전화번호 마지막 번호 입력" class="inptxt w41">
								</td>
							</tr>
							<tr>
								<th><span>휴대폰번호</span><em>*</em></th>
								<td>
									<div class="sel_box phone">
										<p>
											<span class="sel_op">010</span>
											<a href="#" class="btn_sel"><span class="sp_ly ly_off"></span></a>
										</p>
										<ul>
											<li><a href="#">010</a></li>
											<li><a href="#">011</a></li>
											<li><a href="#">016</a></li>
											<li><a href="#">017</a></li>
										</ul>
									</div>
									<span class="hyphen">-</span>
									<input type="text" id="mobile_m" title="휴대폰 중간 번호 입력" class="inptxt w41">		
									<span class="hyphen">-</span>
									<input type="text" id="mobile_e" title="휴대폰 마지막 번호 입력" class="inptxt w41">
									<span class="tip2">예약시 휴대폰으로 문자가 발송됩니다.</span>
								</td>
							</tr>				
							<tr>
								<th><span>SMS 수신여부</span><em>*</em></th>
								<td>
									<div class="rdo_wrap">
										<span class="rdo_btn">
										<input type="radio" name="agreement" id="agreement_y"value="">
										<span class="rdo_on" id="agree_fake_y"></span>
										</span>
										<label for="agreement_y">예</label>
										<span class="rdo_btn"">
										<input type="radio" name="agreement" id="agreement_n" value="">
										<span class="rdo_off" id="agree_fake_n"></span>
										</span>
										<label for="agreement_n">아니오</label>
									</div>
									<span class="tip2">회원공지 알람에 대한 수신여부입니다.</span>
								</td>
							</tr>			
							<tr>
								<th><label for="email">E-MAIL</label></th>
								<td>
									<input type="email" id="email" class="inptxt">
								</td>
							</tr>
							<tr>
								<th><span>자택 우편번호</span><em>*</em></th>
								<td>
                                                                                                                                                                                            <input type="text"  id="sample4_postcode" placeholder="우편번호" class="inptxt w90" readonly>
									<a href="#" class="btn_img btn_cnfrm" onclick="sample4_execDaumPostcode()"><span class="btn_img">우편번호 찾기</span></a>
								</td>
							</tr>
							<tr>
								<th><label for="home_addr1">자택주소</label><em>*</em></th>
								<td>						
									<p>
                                                                                                                                                                                                    <input type="text" id="sample4_roadAddress" placeholder="도로명주소"  class="inptxt w416 gap"  readonly>
                                                                                                                                                                                                    <input type="text" id="sample4_jibunAddress" placeholder="지번주소"  class="inptxt w416 gap"  readonly>
                                                                                                                                                                                                    <input type="text" id="home_addr2" title="자택 상세주소" class="inptxt w416 gap">
                                                                                                                                                                                            </p>
								</td>
							</tr>			
							<tr>
								<th><span>DM발송처</span><em>*</em></th>
								<td class="rdo_wrap">
									<input type="radio" name="dmsend" id="home">
									<label for="home">자택</label>
									<input type="radio" name="dmsend" id="office">
									<label for="office">직장</label>
								</td>
							</tr>										
							</table>
						</fieldset>	
						</div>					
						<div class="enter_area">
						<fieldset>
							<table class="enter_form">
							<tr>
								<th><label for="office_name">직장명</label><em>*</em></th>
								<td><input type="text" id="office_name" class="inptxt"></td>
							</tr>			
							<tr>
								<th><label for="job_category">직종</label></th>
								<td><input type="text" id="job_category" class="inptxt"></td>
							</tr>			
							<tr>
								<th><label for="position">직위</label><em>*</em></th>
								<td><input type="text" id="position" class="inptxt"></td>
							</tr>
							<tr>
								<th><span>직장 우편번호</span><em>*</em></th>
								<td>
									<input type="text" id="o_postcode1" class="inptxt w23">		
									<span class="hyphen">-</span>
									<input type="text" id="o_postcode2" class="inptxt w23">
									<a href="#" class="btn_img btn_cnfrm"><span class="btn_img">우편번호 찾기</span></a>
								</td>
							</tr>
							<tr>
								<th><label for="office_addr1">직장주소</label><em>*</em></th>
								<td>
									<p><input type="text" id="office_addr1" class="inptxt w416"></p>						
									<p><input type="text" id="office_addr2" title="직장 상세주소" class="inptxt w416 gap"></p>
								</td>
							</tr>
							<tr>
								<th><span>직장전화번호</span></th>
								<td>
									<div class="sel_box phone">
										<p>
											<span class="sel_op">010</span>
											<a href="#" class="btn_sel"><span class="sp_ly ly_off"></span></a>
										</p>
										<ul>
											<li><a href="#">010</a></li>
											<li><a href="#">011</a></li>
											<li><a href="#">016</a></li>
											<li><a href="#">017</a></li>
										</ul>
									</div>
									<span class="hyphen">-</span>
									<input type="text" id="office_tel_m" title="직장전화 중간 번호 입력" class="inptxt w41">		
									<span class="hyphen">-</span>
									<input type="text" id="office_tel_e" title="직장전화 마지막 번호 입력" class="inptxt w41">
								</td>
							</tr>
							<tr>
								<th><span>팩스번호</span></th>
								<td>
									<div class="sel_box phone">
										<p>
											<span class="sel_op">010</span>
											<a href="#" class="btn_sel"><span class="sp_ly ly_off"></span></a>
										</p>
										<ul>
											<li><a href="#">010</a></li>
											<li><a href="#">011</a></li>
											<li><a href="#">016</a></li>
											<li><a href="#">017</a></li>
										</ul>
									</div>
									<span class="hyphen">-</span>
									<input type="text" id="fax_m" title="팩스 중간번호 입력" class="inptxt w41">
									<span class="hyphen">-</span>
									<input type="text" id="fax_e" title="팩스 마지막번호 입력" class="inptxt w41">
								</td>
							</tr>			
							<tr>
								<th><span>결혼여부</span></th>
								<td class="rdo_wrap">
									<span class="rdo_btn">
									<input type="radio" name="marry" id="single">
									<span class="rdo_on"></span>
									</span>
									<label for="single">미혼</label>
									<span class="rdo_btn">
									<input type="radio" name="marry" id="married">
									<span class="rdo_off"></span>
									</span>
									<label for="married">기혼</label>
								</td>
							</tr>
							<tr>
								<th><span>결혼기념일</span></th>
								<td>
									<div class="sel_box year">
										<p>
											<span class="sel_op">1984</span>
											<a href="#" class="btn_sel"><span class="sp_ly ly_off"></span></a>
										</p>
										<ul>
											<li><a href="#">1987</a></li>
											<li><a href="#">1986</a></li>
											<li><a href="#">1985</a></li>
											<li><a href="#">1984</a></li>
										</ul>
									</div>
									<span class="year_txt">년</span>
									<div class="sel_box">
										<p>
											<span class="sel_op">1</span>
											<a href="#" class="btn_sel"><span class="sp_ly ly_off"></span></a>
										</p>
										<ul>
											<li><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
											<li><a href="#">6</a></li>
											<li><a href="#">7</a></li>
											<li><a href="#">8</a></li>
											<li><a href="#">9</a></li>
											<li><a href="#">10</a></li>
											<li><a href="#">11</a></li>
											<li><a href="#">12</a></li>
										</ul>
									</div>
									<span class="year_txt">월</span>
									<div class="sel_box">
										<p>
											<span class="sel_op">1</span>
											<a href="#" class="btn_sel"><span class="sp_ly ly_off"></span></a>
										</p>
										<ul>
											<li><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
											<li><a href="#">6</a></li>
											<li><a href="#">7</a></li>
											<li><a href="#">8</a></li>
											<li><a href="#">9</a></li>
											<li><a href="#">10</a></li>
											<li><a href="#">11</a></li>
											<li><a href="#">12</a></li>
										</ul>
									</div>
									<span class="year_txt">일</span>
								</td>
							</tr>										
							</table>
						</fieldset>	
						</div>
					</div>
					<div class="btn_wrap">
						<a href="#" class="sp_sub btn_cancle">취소</a>
                                                <button type="submit" class="sp_sub btn_next">다음 </button>
					</div>
</form>
				</div>
				</div>	
		</div>	
	</div>
	<!-- //container -->
	<hr>
	
	<!-- footer -->
	<div id="footer">		
		<div class="f_inner">
			<p class="policy_sub">
				<a href="#">회칙 및 이용약관</a>
				<a href="#">개인정보 취급방침</a>
				<a href="#">인트라넷</a>
			</p>
			<div class="site_info">
				<p class="none_style">(주)금강레저 대표자:조종호</p>
				<p>경기도 여주군 가남면 본두리 1-2</p>
				<p>대표전화: 031-880-6000</p>
				<p>대표전화: 031-884-5155</p><br>
				<p class="none_style">사업자등록번호: 126-81-07997</p>
				<p>통신판매법 신고 : 2009-경기여주-0058</p>
				<p>개인정보관리책임자 : 윤두한 031-880-6000</p>
				<p><a href="#" class="licenseInfo sp_main">사업자 정보확인</a></p>	
			</div>
			<address>Copyright (c) Kumkang leisure Ltd.  All rights reserved</address>
		</div>	
	</div>
	<!-- //footer -->
</div>
</body>
</html>