<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location:./login");
	die();
}

$currentDate = date('Y-m-d h:i:s', time());
$id_user = $_SESSION['id'];