<?php
$db_user="root";
$db_pass="";
$db_host="localhost";
$db_name="kcc";
$db_type="mysql";
$dsn="$db_type:host=$db_host;dbname=$db_name;charset=utf8";

try{
    $pdo=new PDO($dsn,$db_user,$db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    print "접속";
}catch(PDOException $Exception){
    die('오류'.$Exception->getMessage());
}

$tel1="010";
$tel2="5447";
$tel3="3970";
$m_phone=$tel1.$tel2.$tel3;
$m_phone = preg_replace("/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/", "$1-$2-$3", $m_phone);
$id="hslee22";
$name="이항선";
$sql='insert into member (name,id,m_phone)  values (:id,:name,:m_phone)';
$stmh=$pdo->prepare($sql);
$stmh->bindValue(':id', $id);
$stmh->bindValue(':name', $name);
$stmh->bindValue(':m_phone', $m_phone);
$stmh->execute();


print $sql;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
print $m_phone;
        ?>
