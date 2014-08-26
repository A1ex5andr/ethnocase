<?php
session_start();



$_SESSION['a']['0'] = '4434';

$_SESSION['a']['1'] = 'лорлорлорлор';

echo count($_SESSION['a']);

var_dump($_SESSION['a']);
?>