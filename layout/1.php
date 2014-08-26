<?php
session_start();



$_SESSION['a']['0'] = '4434';

$_SESSION['a']['1'] = 'лорлорлорлор';

echo count($_SESSION['a']);

echo $txt;

var_dump($_SESSION['a']);
?>