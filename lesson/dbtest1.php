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
       //mysql함수
       /*$con=mysql_connect('localhost','root','') or die('접속못해');
       print "접속성공";
       mysql_select_db('php');
       mysql_close($con);
        */
        /*
        $mysqli=new mysqli('localhost','root','','php22');
        if($mysqli->connect_error){
            die('접속못해');
        }
            print '접속성공';
            $mysqli->close();
        
         */
        $pdo= new PDO('mysql:host=localhost;dbname=php;charset=utf8','root','');
        print '접속성공';
        $pdo=null;
        ?>
      
    </body>
</html>
