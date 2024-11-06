<?php
    $driver = 'mysql';
    $host = 'localhost';
    $dbname = 'cc105';
    $charset = 'utf8';
    $username = 'root';
    $password = '';
    $dsn = "$driver:host=$host;dbname=$dbname;charset=$charset";

    $options = [
        PDO::ATTR_EMULATE_PREPARES => FALSE,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $pdo = new PDO($dsn, $username, $password, $options);    
    // try{
    //     $pdo = new PDO($dsn, $username, $password, $options);
    //     if($pdo)
    //     echo 'Connected na tayo sa Database. <br>';
    // }catch(PDOException $e){
    //     echo $e;
    // }

?>