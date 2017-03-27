<?php
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('America/Mexico_City');

$servername = "localhost";
$username = "root";
$password = "root";
$database = "vrumm_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if ( !$conn ) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select db
$db = mysqli_select_db($conn, $database);
if ( !$db ) {
    die ("Can't select database: " . mysqli_error($conn));
}

mysqli_query($conn, "SET NAMES 'utf8'");
