<?php
require_once "../vendor/autoload.php";

use App\Classes\Auth;
$auth = new Auth();

$auth->isLogin() ? header( "location: dashboard.php" ) : false;

if ( isset( $_GET['email'] ) && isset( $_GET['token'] ) ) {
    $email  = $_GET['email'];
    $token  = $_GET['token'];
    $result = $auth->check_token( $email, $token );

    if ( $result->num_rows !== 1 ) {
        header( "location: login.php" );
    }

} else {
    header( "location: login.php" );
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/css/admin/login.css">
</head>
<body>
    <div class="container">
        <!-- Admin login form start -->
        <div class="row justify-content-center h-100vh" id="forgot-password-form-box">
            <div class="col-lg-10 my-auto">
                <div class="card-group">
                    <div class="card p-4 justify-content-center" style="background:#313339">
                        <h2 class="text-center font-weight-bold text-white">Reset your password</h2>
                        <hr class="my-3 bg-light">
                        <p class="text-center text-white">Please log in using your email and password. If you haven't registered yet, you can register for free.</p>
                    </div>

                    <div class="card p-4" style="flex-grow:1.3">
                        <h2 class="text-center text-primary">Reset your password</h2>
                        <div id="resetError"></div>
                        <hr class="my-2">
                        <form action="#" method="POST" class="px-3" id="forgot-password-form">
                            <input type="hidden" value="<?=$email?>" name="email">
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" class="form-control" id="password" placeholder="New password">
                                <div class="invalid-feedback" role="alert"> Please put your new password! </div>
                            </div>

                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input type="password" name="confirm-password" class="form-control" id="confirm-password" placeholder="Confirm password">
                                <div class="invalid-feedback" role="alert"> Please put your confirm password! </div>
                            </div>

                            <div class="clear-fix"></div>

                            <div class="form-group">
                                <input type="submit" value="Reset Password" id="forgotBtn" class="btn btn-block btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Admin login form end -->
    </div>

    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/admin/login.js"></script>
</body>
</html>
