$(document).ready(function(){
    $("#showSignUpForm").click(function(){
        $("#login-form-box").hide();
        $("#register-form-box").show();
    });

    $("#showSignInForm").click(function(){
        $("#register-form-box").hide();
        $("#login-form-box").show();
    });

    $("#showForgetForm").click(function(){
        $("#login-form-box").hide();
        $("#forgotten-form-box").show();
    });

    $("#backSignInForm").click(function(){
        $("#forgotten-form-box").hide();
        $("#login-form-box").show();
    });
});