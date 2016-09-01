
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
 </ul>

 </body>
</html>
