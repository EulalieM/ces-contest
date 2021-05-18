<?php

include('config.php');

$dbname = (string)getenv('DBNAME');
$user = (string)getenv('USER');
$password = (string)getenv('PASSWORD');

try{
    $pdo_options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION
    );
    $bdd = new PDO('mysql:host=localhost;dbname=' . $dbname, $user, $password, $pdo_options);     
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

