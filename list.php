<?php  
include 'kccdb.php';
$search='%'.$_POST['search'].'%';
 print $search;
 $sql="select * from membe where last_name LIKE :last_name OR first_name LIKE :first_name";   
// $sql="select * from membe";   
 $stmh=$pdo->prepare($sql);
 $stmh->bindValue(':last_name',$search,PDO::PARAM_STR);
 $stmh->bindValue(':first_name',$search,PDO::PARAM_STR);
 $stmh->execute();
 $count=$stmh->rowCount();
 //print $stmh;
 print $count."건입니다.";
 

 ?>

