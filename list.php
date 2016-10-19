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
                    include_once '/inc/dbcon.php';
                    $sql="select * from member";
                    $stmh=$pdo->prepare($sql);
                    $stmh->execute();
                    $result=$stmh->fetchAll();
                    $i=1;
                    ?>
        <table>
            <tr>
                <th>No</th>
                <th>이름</th>
                <th>아이디</th>
                <th>핸드폰번호</th>
                <th>E-MAIL</th>
                <th>주소</th>
            </tr>
        <?php
                    foreach($result as $row){
                        ?>
                           <tr>
                               <td><input type="checkbox" name="chk"></td>
                                <td><?=$i?></td>
                                <td><?=$row['name']?></td>
                                <td><?=$row['id']?></td>
                                <td><?=$row['pnum']?></td>
                                <td><?=$row['email']?></td>
                                <td><?=$row['address']?></td>
                           </tr>
       <?php                          
                    $i++;}
                             
        ?>
        </table>
    </body>
</html>
