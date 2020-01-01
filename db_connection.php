<?php

define('DB_USER','deb13326_2092822');
define('DB_PASS','!Hallo_123');
define('DB_DBNAME','deb113326_2092822');
define('DB_HOST','localhost');

try{
    $con = new PDO("mysql:host=".DB_HOST.';dbname='.DB_DBNAME,DB_USER,DB_PASS);
}catch(PDOException $e)
{
    echo $e->getMessage();
    exit(-1);
}