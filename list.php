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
                    ?>
        <table>
            <tr>
                th
            </tr>
        <?php
                    foreach($result as $row){
                                 print_r ($row);
                    }
                             
        ?>
        </table>
    </body>
</html>
