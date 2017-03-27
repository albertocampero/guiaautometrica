<?php
require 'app/config.php';
require 'app/controller.php';

if ( isset($_POST['save']) ) {
	extract($_POST);

	$stat = ( isset($status) )? 1 : 0;
	
	if ( is_numeric($id) ) {
		$sql = "UPDATE ga_models SET name = '$name', id_brand = '$brand', year = '$year', status = '$stat' WHERE id = '$id'";
		mysqli_query($conn, $sql);
		$last = $id;

		$sqlLog = "INSERT INTO ga_log (id_user, type, data, date) VALUES ('$id_user', '6', '$last', '$currentDate')";
        if ( !mysqli_query($conn, $sqlLog) ) {
            die( $sqlLog . '<br>' . mysqli_error($conn) );
        }
	}else {
		$sql = "INSERT INTO ga_models (name, id_brand, year, status) VALUES ('$name', '$brand', '$year', '$stat')";
		mysqli_query($conn, $sql);
		$last = mysqli_insert_id($conn);

		$sqlLog = "INSERT INTO ga_log (id_user, type, data, date) VALUES ('$id_user', '5', '$last', '$currentDate')";
        if ( !mysqli_query($conn, $sqlLog) ) {
            die( $sqlLog . '<br>' . mysqli_error($conn) );
        }
	}

	$_SESSION['alert']['success'] = "Se guardaron los cambios correctamente";
	header("Location:model-edit?row=".$last);
	die();
}

if ( isset($_GET['del']) ) {
	$id_model = $_GET['del'];
	$sql = "UPDATE ga_models SET status = 0 WHERE id = '$id_model'";
	if ( !mysqli_query($conn, $sql) ) {
		die( $sql . '<br>' . mysqli_error($conn) );
	}else {

		$sqlLog = "INSERT INTO ga_log (id_user, type, data, date) VALUES ('$id_user', '7', '$id_model', '$currentDate')";
        if ( !mysqli_query($conn, $sqlLog) ) {
            die( $sqlLog . '<br>' . mysqli_error($conn) );
        }

		$_SESSION['alert']['success'] = 'Se desactivo un registro correctamente';
		header("Location:./models");
		die();	
	}

}

if ( isset($_GET['row']) ) {
	extract($_GET);

	$sql = "SELECT * FROM ga_models WHERE id='$row'";
	$result = mysqli_query($conn, $sql);

	if ( $result ) {
	    $model = mysqli_fetch_assoc($result);
	}else {
		die( $sql . '<br>' . mysqli_error($conn) );
	}

	$id_val = $model['id'];
	$name_val = $model['name'];
	$brand_val = $model['id_brand'];
	$year_val = $model['year'];
	$status_val = ( $model['status'] == 1 )? "checked" : "";
	$pageTitle = "Edición de modelo";
}else {

	$id_val = "";
	$name_val = "";
	$brand_val = "";
	$year_val = "";
	$status_val = "checked";
	$pageTitle = "Agregar nuevo modelo";
}

$sqlBrands = "SELECT * FROM ga_brands WHERE status = 1";
$resultBrands = mysqli_query($conn, $sqlBrands);
if ( $resultBrands ) {
    $totalBrands = mysqli_num_rows($resultBrands);
    $brands = mysqli_fetch_all($resultBrands, MYSQLI_ASSOC);
}else {
	die( $sqlBrands . '<br>' . mysqli_error($conn) );
}

include 'views/header.php';
include 'views/model-edit.php';
include 'views/footer.php';

mysqli_close($conn);
unset($_SESSION['alert']);