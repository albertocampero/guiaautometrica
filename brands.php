<?php
require 'app/config.php';
require 'app/controller.php';

$sql = "SELECT b.*, s.name AS status_name FROM ga_brands AS b LEFT JOIN ga_status AS s ON b.status = s.id WHERE 1";
$result = mysqli_query($conn, $sql);

if ( $result ) {
    $total = mysqli_num_rows($result);
    $brands = mysqli_fetch_all($result, MYSQLI_ASSOC);
}else {
	die( $sql . '<br>' . mysqli_error($conn) );
}

$pageTitle = "Marcas";
include 'views/header.php';
include 'views/brands.php';
include 'views/footer.php';

mysqli_close($conn);