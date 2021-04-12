<?php
session_start();
require_once "../vendor/autoload.php";

use App\Classes\Auth;
use PHPMailer\PHPMailer\PHPMailer;

$auth = new Auth();
$mail = new PHPMailer( true );

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
                $_SESSION['user_name']  = $row['name'];
                $_SESSION['user_id']    = $row['id'];
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

// reset password action
if ( isset( $_POST['action'] ) && $_POST['action'] === 'reset-password' ) {
    $email  = $_POST['email'];
    $result = $auth->getUser( $email );

    if ( $result->num_rows === 1 ) {
        $token = uniqid();
        if ( $auth->tokenUpdate( $token, $email ) ) {
            try {
                //Server settings
                $mail->isSMTP(); //Send using SMTP
                $mail->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
                $mail->SMTPAuth   = true; //Enable SMTP authentication
                $mail->Username   = 'he786lal@gmail.com'; //SMTP username
                $mail->Password   = 'helal786uddin'; //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587; //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom( 'he786lal@gmail.com', 'OOP Project 1' );
                $mail->addAddress( $email ); //Add a recipient
                // $mail->addAddress( 'ellen@example.com' );
                // $mail->addReplyTo( 'info@example.com', 'Information' );
                // $mail->addCC( 'cc@example.com' );
                // $mail->addBCC( 'bcc@example.com' );

                //Content
                $mail->isHTML( true ); //Set email format to HTML
                $mail->Subject = 'Reset Password';
                $mail->Body    = '<!DOCTYPE html>
                                    <html lang="en">
                                    <head>
                                        <meta charset="UTF-8">
                                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                        <title>Document</title>

                                        <style>
                                            .email-body h3 {
                                                background-color: #ddd;
                                                padding: 23px;
                                                text-align: center;
                                            }

                                            .email-body {
                                                border: 1px solid #bdbcbc;
                                                border-radius: 4px;
                                                text-align: center;
                                            }

                                            .email-body a {
                                                background: #fe6f4b;
                                                color: #fff;
                                                font-size: 18px;
                                                padding: 18px;
                                                display: inline-block;
                                                text-decoration: none;
                                            }
                                        </style>
                                    </head>
                                    <body>
                                        <div class="email-body">
                                            <h3>Reset your password?</h3>
                                            <a href="http://localhost:81/OOP-project-1/admin/reset-password.php?email=' . $email . '&token=' . $token . '">Click Here</a>
                                        </div>
                                    </body>
                                    </html>';

                $mail->send();
                echo $auth->showMessage( 'success', 'Message has been sent to your email: ' . $email );
            } catch ( Exception $e ) {
                echo $auth->showMessage( "danger", "Message could not be sent. Mailer Error: {$mail->ErrorInfo}" );
            }
        } else {
            echo $auth->showMessage( 'danger', 'Something Wrong.....!' );
        }
    } else {
        echo $auth->showMessage( 'danger', 'Your email is invalid!' );
    }
}

// reset new password
if ( isset( $_POST['action'] ) && $_POST['action'] === 'reset' ) {
    $email            = $_POST['email'];
    $password         = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    if ( $email !== NULL || $password !== NULL || $confirm_password !== NULL ) {
        $newPassword = password_hash( $password, PASSWORD_BCRYPT );
        echo $auth->reset_password( $email, $newPassword ) ? $auth->showMessage( 'success', 'New password has been changed. <a href="login.php">Login</a>' ) : $auth->showMessage( 'danger', 'Something wrong!' );
    } else {
        echo $auth->showMessage( 'danger', 'The password not changed!' );
    }
}
