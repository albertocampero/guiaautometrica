<?php
require 'app/config.php';

extract($_POST);

$sql = "SELECT id, name FROM ga_models WHERE status = '1' AND id_brand = '$id_brand'";
$result = mysqli_query($conn, $sql);

$rpta = "";

if ( $result ) {
    if ( mysqli_num_rows($result) > 0 ) {
    	$rpta .= '<option>Seleccione un modelo</option>';
		while ( $row = mysqli_fetch_assoc($result) ) {
			$rpta .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
		}
	}else {
    	$rpta .= '<option>No hay resultados</option>';
	}
	echo $rpta;
}else {
	die( $sql . '<br>' . mysqli_error($conn) );
}

mysqli_close($conn);