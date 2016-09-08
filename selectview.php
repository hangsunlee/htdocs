<?php
$location=$_POST["location"];
$year=$_POST["year"];
if(isset($location)){
    print "지역은".$location;
}else 
{print "지역입력하세요";}
    
if(isset($year)){
    print "태어난해는".$year;
}else {
    print "입력해주세요";
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>