<?php
require_once "../vendor/autoload.php";

use App\Classes\Auth;
$auth = new Auth();

$auth->isLogin() ? header( "Location: dashboard.php" ) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login Panel</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/css/admin/login.css">
</head>
<body>
    <div class="container">
        <!-- Admin login form start -->
        <div class="row justify-content-center h-100vh" id="login-form-box">
            <div class="col-lg-10 my-auto">
                <div class="card-group">
                    <div class="card p-4">
                        <h2 class="text-center text-primary">Login to your account</h2>
                        <div id="loginError"></div>
                        <hr class="my-2">
                        <form action="#" method="POST" class="px-3" id="login-form">
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" value="<?=isset( $_COOKIE['user_email'] ) ? $_COOKIE['user_email'] : '';?>">
                                <div class="invalid-feedback" role="alert"> Please put your valid email! </div>
                            </div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" value="<?=isset( $_COOKIE['user_pass'] ) ? $_COOKIE['user_pass'] : '';?>">
                                <div class="invalid-feedback" role="alert"> Please put your valid password! </div>
                            </div>

                            <div class="form-group">
                                <div class="float-left custom-control custom-checkbox">
                                    <input type="checkbox" name="rememberMe" id="rememberMe" <?=isset( $_COOKIE['user_email'] ) ? 'checked' : '';?> >
                                    <label for="rememberMe">Remember me</label>
                                </div>
                                <div class="float-right">
                                    <a href="javascript:" id="showForgetForm" class="text-decoration-none">Forget Password?</a>
                                </div>
                            </div>

                            <div class="clear-fix"></div>

                            <div class="form-group">
                                <input type="submit" value="Sign In" id="loginBtn" class="btn btn-block btn-primary">
                            </div>
                        </form>
                    </div>
                    <div class="card p-4 justify-content-center" style="background:#313339">
                        <h2 class="text-center font-weight-bold text-white">Welcome back!</h2>
                        <hr class="my-3 bg-light">
                        <p class="text-center text-white">Please log in using your email and password. If you haven't registered yet, you can register for free.</p>
                        <button class="btn btn-light btn-lg align-self-center mt-4" id="showSignUpForm">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Admin login form end -->

        <!-- Admin register form start -->
        <div class="row justify-content-center h-100vh" id="register-form-box" style="display: none;">
            <div class="col-lg-10 my-auto">
                <div class="card-group">
                    <div class="card p-4">
                        <h2 class="text-center text-primary">Create new account</h2>
                        <hr class="my-2">
                        <div id="registerError"></div>
                        <form action="#" method="POST" class="px-3" id="register-form">

                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
                                <div class="invalid-feedback" role="alert"> Please fill your name! </div>
                            </div>

                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" class="form-control" id="r_email" placeholder="Enter your email" minlength="8">
                                <div class="invalid-feedback" role="alert"> Please fill the email! </div>
                            </div>

                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input type="password" name="r_password" class="form-control" id="r_password" placeholder="Enter your password" minlength="6">
                                <div class="invalid-feedback" role="alert"> Please your password! </div>
                            </div>

                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input type="password" name="c_password" class="form-control" id="c_password" placeholder="Confirm password" minlength="6">
                                <div class="invalid-feedback" role="alert"> Please add your confirm password! </div>
                                <div class="alert alert-danger password-not-match mt-3" role="alert" style="display:none;"> Password does not match! </div>
                            </div>

                            <div class="clear-fix"></div>

                            <div class="form-group">
                                <input type="submit" value="Register" id="registerUser" class="btn btn-block btn-primary">
                            </div>
                        </form>
                    </div>
                    <div class="card p-4 justify-content-center" style="background:#313339">
                        <h2 class="text-center font-weight-bold text-white">Welcome back!</h2>
                        <hr class="my-3 bg-light">
                        <p class="text-center text-white">Please log in using your email and password.</p>
                        <button class="btn btn-light btn-lg align-self-center mt-4" id="showSignInForm">Sign In</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Admin register form end -->

        <!-- Admin forget password start -->
        <div class="row justify-content-center h-100vh" id="forgotten-form-box" style="display: none;">
            <div class="col-lg-10 my-auto">
                <div class="card-group">
                    <div class="card p-4">
                        <h2 class="text-center text-primary">Reset your password</h2>
                        <div id="resetPasswordError"></div>
                        <hr class="my-2">
                        <form action="#" method="POST" class="px-3" id="forgotten-form">
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" class="form-control" id="reset-email" placeholder="Enter your email">
                                <div class="invalid-feedback" role="alert"> Please enter your valid email! </div>
                            </div>
                            <div class="clear-fix"></div>
                            <div class="form-group">
                                <input type="submit" value="Reset Password" id="resetPassword" class="btn btn-block btn-primary">
                            </div>
                        </form>
                    </div>
                    <div class="card p-4 justify-content-center" style="background:#313339">
                        <h2 class="text-center font-weight-bold text-white">Lost password?</h2>
                        <hr class="my-3 bg-light">
                        <p class="text-center text-white">Enter your email and check your inbox for instructions. Please also check your spam folder.</p>
                        <button class="btn btn-light btn-lg align-self-center mt-4" id="backSignInForm">Back</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Admin forget password end -->
    </div>

    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/admin/login.js"></script>
</body>
</html>
