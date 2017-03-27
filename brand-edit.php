<?php
require 'app/config.php';
require 'app/controller.php';

if ( isset($_POST['save']) ) {
	extract($_POST);

	$stat = ( isset($status) )? 1 : 0;
	
	if ( is_numeric($id) ) {
		$sql = "UPDATE ga_brands SET name='$name', status = '$stat' WHERE id = '$id'";
		if ( !mysqli_query($conn, $sql) ) {
			die( $sql . '<br>' . mysqli_error($conn) );
		}
		$last = $id;

		$sqlLog = "INSERT INTO ga_log (id_user, type, data, date) VALUES ('$id_user', '3', '$last', '$currentDate')";
        if ( !mysqli_query($conn, $sqlLog) ) {
            die( $sqlLog . '<br>' . mysqli_error($conn) );
        }
	}else {
		$sql = "INSERT INTO ga_brands (name, status) VALUES ('$name', '$stat')";
		if ( !mysqli_query($conn, $sql) ) {
			die( $sql . '<br>' . mysqli_error($conn) );
		}
		$last = mysqli_insert_id($conn);

		$sqlLog = "INSERT INTO ga_log (id_user, type, data, date) VALUES ('$id_user', '2', '$last', '$currentDate')";
        if ( !mysqli_query($conn, $sqlLog) ) {
            die( $sqlLog . '<br>' . mysqli_error($conn) );
        }
	}

	$_SESSION['alert']['success'] = "Se guardaron los cambios correctamente";
	header("Location:brand-edit?row=".$last);
	die();
}

if ( isset($_GET['del']) ) {
	$id_brand = $_GET['del'];
	$sql = "UPDATE ga_brands SET status = 0 WHERE id = '$id_brand'";
	if ( !mysqli_query($conn, $sql) ) {
		die( $sql . '<br>' . mysqli_error($conn) );
	}else {

		$sqlLog = "INSERT INTO ga_log (id_user, type, data, date) VALUES ('$id_user', '3', '$id_brand', '$currentDate')";
        if ( !mysqli_query($conn, $sqlLog) ) {
            die( $sqlLog . '<br>' . mysqli_error($conn) );
        }

		$_SESSION['alert']['success'] = 'Se desactivo un registro correctamente';
		header("Location:./brands");
		die();	
	}

}

if ( isset($_GET['row']) ) {
	extract($_GET);

	$sql = "SELECT * FROM ga_brands WHERE id='$row'";
	$result = mysqli_query($conn, $sql);

	if ( $result ) {
	    $brand = mysqli_fetch_assoc($result);
	}else {
		die( $sql . '<br>' . mysqli_error($conn) );
	}

	$id_val = $brand['id'];
	$name_val = $brand['name'];
	$status_val = ( $brand['status'] == 1 )? "checked" : "";
	$pageTitle = "Edición de marca";
}else {

	$id_val = "";
	$name_val = "";
	$status_val = "checked";
	$pageTitle = "Agregar nueva marca";
}
include 'views/header.php';
include 'views/brand-edit.php';
include 'views/footer.php';

mysqli_close($conn);
unset($_SESSION['alert']);