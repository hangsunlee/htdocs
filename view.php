<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
           print $_POST["onname"]."님 환영";
           print nl2br($_POST["honbun"]);
           if(isset($_POST["hobby"])){
               $hobby=implode('와', $_POST["hobby"]);
              print "저의 취미는".$hobby."입니다.";
           }else{
               print "저의 취미는 없습니다.";
           }
        ?>
    </body>
</html>
