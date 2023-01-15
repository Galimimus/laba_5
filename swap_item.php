<?php

session_start();

$index1 = $_GET['index1'];
$index2 = $_GET['index2'];

$tmp = $_SESSION['array'][$index1];
$_SESSION['array'][$index1] = $_SESSION['array'][$index2];
$_SESSION['array'][$index2] = $tmp;

