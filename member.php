<?php
require_once '/dbcon.php';

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
$stmh->bindValue(':name', $name);
$stmh->bindValue(':name', $name);
$stmh->bindValue(':name', $name);
$stmh->bindValue(':name', $name);
$stmh->execute();


print $sql;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
print $m_phone;
        ?>
