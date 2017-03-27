<?php
require 'app/config.php';
require 'app/controller.php';

$whr = "";
if (isset($_GET['brand'])) {
	$id_brand = $_GET['brand'];
	$whr = " AND m.id_brand = '$id_brand'";
}

$sql = "
	SELECT
		m.*,
		b.name AS brand_name,
		s.name AS status_name
	FROM ga_models AS m
	LEFT JOIN ga_brands AS b ON m.id_brand = b.id
	LEFT JOIN ga_status AS s ON m.status = s.id
	WHERE 1".$whr." ORDER BY brand_name, name";
$result = mysqli_query($conn, $sql);

if ( $result ) {
    $total = mysqli_num_rows($result);
    $models = mysqli_fetch_all($result, MYSQLI_ASSOC);
}else {
	die( $sql . '<br>' . mysqli_error($conn) );
}

$pageTitle = "Modelos";
include 'views/header.php';
include 'views/models.php';
include 'views/footer.php';

mysqli_close($conn);