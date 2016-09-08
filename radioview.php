<?php
$gender=$_POST["gender"];
if(isset($gender)){
    print "성별:".$gender;
}
else{
    print "성별입력하세요";
}

?>


