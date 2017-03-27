<?php
session_start();
session_destroy();

require 'app/config.php';

if ( isset($_POST['login']) ) {

    extract($_POST);

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, md5($password));

    $sql = "SELECT * FROM ga_users WHERE email = '$email' AND password = '$password' AND status = 1";
    $result = mysqli_query($conn, $sql);

    if ( $result ) {

        if ( mysqli_num_rows($result) > 0 ) {

            $row = mysqli_fetch_assoc($result);

            session_start();
            $_SESSION = $row;

            $id_user = $row['id'];
            $currentDate = date('Y-m-d h:i:s', time());

            $sqlLog = "INSERT INTO ga_log (id_user, type, date) VALUES ('$id_user', '1', '$currentDate')";
            if ( !mysqli_query($conn, $sqlLog) ) {
                die( $sql . '<br>' . mysqli_error($conn) );
            }

            header("Location:./");
            die();

        }else{
            header("Location:login?error=login");
            die();
        }
    }else {
        die( $sql . '<br>' . mysqli_error($conn) );
    }
}

include 'views/login.php';

mysqli_close($conn);
