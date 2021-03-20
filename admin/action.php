<?php
session_start();
require_once "../vendor/autoload.php";

use App\Classes\Auth;

$auth = new Auth();

// register action
if ( isset( $_POST['action'] ) && $_POST['action'] === 'register' ) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = password_hash( $_POST['r_password'], PASSWORD_BCRYPT );

    if ( $auth->user_exist( $email ) > 0 ) {
        echo $auth->showMessage( 'warning', 'This ' . $email . ' already exists!' );
    } else {
        if ( $auth->register( $name, $email, $password ) ) {
            echo "ok";
            $_SESSION['user_email'] = $email;
        } else {
            echo $auth->showMessage( 'warning', 'Something Wrong!' );
        }
    }
}

// login action
if ( isset( $_POST['action'] ) && $_POST['action'] === 'login' ) {
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $rememberMe = isset( $_POST['rememberMe'] ) ? 1 : 0;

    $result = $auth->login( $email );
    if ( $result->num_rows === 1 ) {
        $row = $result->fetch_assoc();
        if ( password_verify( $password, $row['password'] ) ) {
            if ( $row['status'] == '1' ) {
                echo "ok";

                if ( $rememberMe ) {
                    setcookie( 'user_email', $email, time() + ( 7 * 24 * 60 * 60 ) );
                    setcookie( 'user_pass', $password, time() + ( 7 * 24 * 60 * 60 ) );
                } else {
                    setcookie( 'user_email', '', -time() + ( 7 * 24 * 60 * 60 ) );
                    setcookie( 'user_pass', '', -time() + ( 7 * 24 * 60 * 60 ) );
                }

                $_SESSION['user_email'] = $email;
            } else {
                echo $auth->showMessage( 'warning', 'Your account inactive! Please contact with owner.' );
            }
        } else {
            echo $auth->showMessage( 'warning', 'The credentials do not match our records!' );
        }
    } else {
        echo $auth->showMessage( 'warning', 'The credentials do not match our records!' );
    }
}