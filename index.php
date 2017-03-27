<?php
require 'app/config.php';
require 'app/controller.php';

$sql = "
	SELECT
		v.*,
		m.name AS model_name,
		m.year,
		b.name AS brand_name,
		s.name AS status_name
	FROM ga_versions AS v
	LEFT JOIN ga_models AS m ON v.id_model = m.id
	LEFT JOIN ga_brands AS b ON v.id_brand = b.id
	LEFT JOIN ga_status AS s ON v.status = s.id
	WHERE 1 ORDER BY brand_name, model_name, name";
$result = mysqli_query($conn, $sql);

if ( $result ) {
    $total = mysqli_num_rows($result);
    $versions = mysqli_fetch_all($result, MYSQLI_ASSOC);
}else {
	die( $sql . '<br>' . mysqli_error($conn) );
}

$pageTitle = "Guía Autométrica";
include 'views/header.php';
include 'views/index.php';
include 'views/footer.php';

mysqli_close($conn);