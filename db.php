<?php 
    define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PASSWORD', "");
    define('DB_NAME', 'simpleapi');
    
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if(isset($pdo)){
        $GLOBALS['db'] = $pdo;
    }else{
        throw new Exception("Can't access to database.");
    }

    // Create this table for example :)
    // CREATE TABLE IF NOT EXISTS users(
    //     id int unsigned AUTO_INCREMENT primary key,
    //     name varchar(256)
    // )