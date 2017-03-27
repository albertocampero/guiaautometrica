<?php
require 'app/config.php';
require 'app/controller.php';

if ( isset($_POST['save']) ) {
	extract($_POST);

	if ( $addNewBrandInput == 'si' ) {		
		$sql = "INSERT INTO ga_models (name, id_brand, year, status) VALUES ('$name', '$brand', '$year', '1')";
		if ( !mysqli_query($conn, $sql) ) {
			die( $sql . '<br>' . mysqli_error($conn) );
		}
		$model = mysqli_insert_id($conn);
	}

	$stat = ( isset($status) )? 1 : 0;
	
	if ( is_numeric($id) ) {
		$sql = "UPDATE ga_versions SET name = '$version', id_brand = '$brand', id_model = '$model', sale_price = '$venta', purchase_price = '$compra', description = '$description', status = '$stat' WHERE id = '$id'";
		if ( !mysqli_query($conn, $sql) ) {
			die( $sql . '<br>' . mysqli_error($conn) );
		}
		$last = $id;

		$sqlLog = "INSERT INTO ga_log (id_user, type, data, date) VALUES ('$id_user', '9', '$last', '$currentDate')";
        if ( !mysqli_query($conn, $sqlLog) ) {
            die( $sqlLog . '<br>' . mysqli_error($conn) );
        }
	}else {
		$sql = "INSERT INTO ga_versions (name, id_brand, id_model, sale_price, purchase_price, description, status) VALUES ('$version', '$brand', '$model', '$venta', '$compra', '$description', '$stat')";
		if ( !mysqli_query($conn, $sql) ) {
			die( $sql . '<br>' . mysqli_error($conn) );
		}
		$last = mysqli_insert_id($conn);

		$sqlLog = "INSERT INTO ga_log (id_user, type, data, date) VALUES ('$id_user', '8', '$last', '$currentDate')";
        if ( !mysqli_query($conn, $sqlLog) ) {
            die( $sqlLog . '<br>' . mysqli_error($conn) );
        }
	}

	$_SESSION['alert']['success'] = "Se guardaron los cambios correctamente";
	header("Location:edit?row=".$last);
	die();
}

if ( isset($_GET['del']) ) {
	$id_version = $_GET['del'];
	$sql = "UPDATE ga_versions SET status = 0 WHERE id = '$id_version'";
	if ( !mysqli_query($conn, $sql) ) {
		die( $sql . '<br>' . mysqli_error($conn) );
	}else {

		$sqlLog = "INSERT INTO ga_log (id_user, type, data, date) VALUES ('$id_user', '10', '$id_version', '$currentDate')";
        if ( !mysqli_query($conn, $sqlLog) ) {
            die( $sqlLog . '<br>' . mysqli_error($conn) );
        }

		$_SESSION['alert']['success'] = 'Se desactivo un registro correctamente';
		header("Location:./");
		die();	
	}

}

if ( isset($_GET['row']) ) {
	extract($_GET);

	$sql = "SELECT * FROM ga_versions WHERE id='$row'";
	$result = mysqli_query($conn, $sql);

	if ( $result ) {
	    $version = mysqli_fetch_assoc($result);
	}else {
		die( $sql . '<br>' . mysqli_error($conn) );
	}

	$id_val = $version['id'];
	$brand_val = $version['id_brand'];
	$model_val = $version['id_model'];
	$version_val = $version['name'];
	$venta_val = $version['sale_price'];
	$compra_val = $version['purchase_price'];
	$description_val = $version['description'];
	$status_val = ( $version['status'] == 1 )? "checked" : "";
	$pageTitle = "Editar registro";

	$sqlModels = "SELECT id, name FROM ga_models WHERE status = '1' AND id_brand = '$brand_val'";
	$resultModels = mysqli_query($conn, $sqlModels);
	if ( $resultModels ) {
	    $totalModels = mysqli_num_rows($resultModels);
	    $models = mysqli_fetch_all($resultModels, MYSQLI_ASSOC);
	}else {
		die( $sqlModels . '<br>' . mysqli_error($conn) );
	}
}else {

	$id_val = "";
	$brand_val = "";
	$model_val = "";
	$version_val = "";
	$venta_val = "";
	$compra_val = "";
	$description_val = "";
	$status_val = "checked";
	$pageTitle = "Agregar registro";
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
include 'views/edit.php';
include 'views/footer.php';

mysqli_close($conn);
unset($_SESSION['alert']);