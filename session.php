 <?php
       session_start();//세션을 쓰겠다.
       $count=1;
       if(isset($_SESSION["count"])){
           $count=$_SESSION["count"];
           $count++;
       }
       $_SESSION["count"]=$count;
        ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
         if($count==1){
       ?>
         첫방문입니다. <br>
         <?php
         }else{
             ?>
         당신의 방문은 <?=$count?>회째입니다.   
         <?php
         }
         ?>
    </body>
</html>
