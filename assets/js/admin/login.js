$(document).ready(function(){

    // const site_url = "http://localhost:8080/oop-project1/";

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

    // register js
    $("#registerUser").click(function(e){
        if($("#register-form")[0].checkValidity()){
            e.preventDefault();
            $("#registerUser").val("Loading....").attr("disabled", true);

            if($("#name").val() === "" ){
                $("#name").addClass("is-invalid");
            }else{
                $("#name").removeClass("is-invalid");
            }

            if($("#r_email").val() === "" ){
                $("#r_email").addClass("is-invalid");
            }else{
                $("#r_email").removeClass("is-invalid");
            }

            if($("#r_password").val() === "" ){
                $("#r_password").addClass("is-invalid");
            }else{
                $("#r_password").removeClass("is-invalid");
            }

            if($("#c_password").val() === "" ){
                $("#c_password").addClass("is-invalid");
            }else{
                $("#c_password").removeClass("is-invalid");
            }

            if($("#r_password").val() ===  $("#c_password").val()){
                if($("#name").val() !== '' && $("#r_email").val() !== ''){
                    $.ajax({
                        url: './action.php',
                        method: 'post',
                        data: $("#register-form").serialize()+"&action=register",
                        success: function(response){
                            if(response === 'ok'){
                                window.location = 'dashboard.php';
                            }else{
                                $("#registerError").html(response);
                            }
                        }
                    })
                }
            }else{
                $(".password-not-match").addClass("p-not-match-bloock");
            }
            $("#registerUser").val("Register").attr("disabled", false);
        }
    });

    // login js
    $("#loginBtn").click(function(e){
        if($("#login-form")[0].checkValidity()){
            e.preventDefault();
            $("#loginBtn").val("Loading....").attr("disabled", true);
            if($("#email").val() === "" ){
                $("#email").addClass("is-invalid");
            }else{
                $("#email").removeClass("is-invalid");
            }

            if($("#password").val() === "" ){
                $("#password").addClass("is-invalid");
            }else{
                $("#password").removeClass("is-invalid");
            }

            $.ajax({
                url: './action.php',
                method: 'post',
                data: $("#login-form").serialize() + "&action=login",
                success: function(response){
                    $("#loginBtn").val("Sign In").attr("disabled", false);
                    if(response === 'ok'){
                        window.location = 'dashboard.php';
                    }else{
                        $("#loginError").html(response);
                    }
                }
            })


        }
    });


    // forgot password js
    $("#resetPassword").click(function(e){
        if($("#forgotten-form")[0].checkValidity()){
            e.preventDefault();
            $("#resetPassword").val("Loading....").attr("disabled", true);

            if($("#reset-email").val() === "" ){
                $("#reset-email").addClass("is-invalid");
            }else{
                $("#reset-email").removeClass("is-invalid");
            }

            $.ajax({
                url: './action.php',
                method: 'post',
                data: $("#forgotten-form").serialize() + "&action=reset-password",
                success: function(response){
                    $("#resetPassword").val("Reset Password").attr("disabled", false);
                    $("#resetPasswordError").html(response);
                }
            })


        }
    });
});