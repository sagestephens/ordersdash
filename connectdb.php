<?php

    try{
        $pdo = new
        PDO('mysql:host=localhost;dbname=order_db','root','');
        //echo'Connection successful';
    }catch(PDOException $f){
        echo $f->getmessage();
    }
    
?>