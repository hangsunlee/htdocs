
<?php
//	phpinfo();
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>오늘은 첫번째 php수업</title>
  <style>
  .gugu{background: red;}
  </style>
 </head>
 <body>
 <ul>
 	<li>1번</li>
 	<li>2번</li>
	<?php
       print "안녕 나는 오늘 기분이 별로 안좋으니깐 조심해 경식아";
    ?>
 	<li>3번째 예제<?php
		print PHP_VERSION;
		print PHP_OS;
		define("HELLO","안녕하세요");
		print HELLO."<br>";
		define("_18","신발");
		print _18;
		print __DIR__;
		
	?></li>
 	<li>4번</li>
	<?php
		$data="안녕하세요!!";
		$data1=1;
		print $data;
		print $data1; // 자동으로 타입 변환됩니다.
		$week[]="월";
		$week[]="화";
		// 위의 코드와 같은 의미입니다.
		$week[0]="월";
	    $week[1]="화";
		print $week[0];
		print $week[1];
		//array 함수 사용하기 
		$month=array(1,2,3,4,5,6,7,8,9,"월");
		//php5.4이상 배열 [] 사용가능
		$year=[2016,2017];
		//배열초기화
		$month=array();
		//연관배열
		 $member["name"]="곽ㅇㅊ";
		 $member["age"]=3;
		 $member["height"]=150;
			print $member["age"];
			print "<pre>";
			print_r ($member);

		// for문
		?>
		
 </ul>
<p class="gugu">
<?php
for($i=1;$i<10;$i++)
		{
			for($j=1;$j<10;$j++)
				{
			print $i."*".$j."=".$i*$j."<br>";
				}
		}
?>
</p>
 </body>
</html>
