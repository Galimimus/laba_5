<?php

session_start();
$index = $_GET['index'];
if(!isset($_SESSION['array'])) $_SESSION['array'] = array(1,2,9,4,5,8,7,6,3,10);

if($index < 0 || $index >= count($_SESSION['array'])) {
    header('HTTP/1.1 400 Bad Request');
    exit;
}

echo $_SESSION['array'][$index];

