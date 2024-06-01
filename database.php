<?php

if(empty($_SESSION)){
    session_start();
}

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if($db === false){
    die("Cannot connect to database.");
}