<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <link href="assets/global/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/global/css/all.min.css" rel="stylesheet">

    <link href="assets/global/css/line-awesome.min.css" rel="stylesheet" />

    <link href="assets/templates/basic/css/animate.css" rel="stylesheet">
    <link href="assets/templates/basic/css/nice-select.css" rel="stylesheet">
    <link href="assets/templates/basic/css/swiper.min.css" rel="stylesheet">
    <link href="assets/templates/basic/css/magnific-popup.css" rel="stylesheet">
    <link href="assets/templates/basic/css/odometer.css" rel="stylesheet">
    <link href="assets/templates/basic/css/main.css" rel="stylesheet">
    <link href="assets/templates/basic/css/custom.css" rel="stylesheet">
    <link href="assets/templates/basic/css/color4db6.css?color=1e90fF" rel="stylesheet">
</head>
<body>

<section class="account-section padding-bottom padding-top">
        <div class="container">
            <div class="account-wrapper">
                <div class="signup-area account-area">
                    <div class="row m-0 flex-wrap-reverse">
                        <div class="col-lg-6 p-0">
                            <div class="change-catagory-area bg_img" data-background="assets/images/frontend/login/63821b0737fa81669470983.jpg">
                                <h4 class="title">Welcome To MLMLAB</h4>
                                <p>Haven't registered yet! don't worry just fillip all the information below and get your account now.</p>
                                <a class="custom-button account-control-button" href="register.php">Register Now</a>
                            </div>
                        </div>
                        <div class="col-lg-6 p-0">
                            <div class="common-form-style bg-one login-account">
                                <h4 class="title">Login Account</h4>
                                <p class="mb-sm-4 mb-3">To login into the site please enter your username and password</p>
                                <form   id="loginForm">
                                                                       <div class="form-group">
                                        <label class="form-label">Email or Username</label>
                                        <input name="username" id="username" type="text" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input  name="password" id="password" type="password" required>
                                    </div>


                        
                                    <div class="form-group d-flex justify-content-between flex-wrap">
                                        <div class="form--check">
                                            <input class="form-check-input" id="remember" name="remember" type="checkbox">
                                            <label class="form-check-label" for="remember">Remember Me</label>
                                        </div>
                                        <a class="text--base" href="password/reset.html">Forget Password?</a>
                                    </div>

                                    <div class="form-group mb-0">
                                        <input class="w-100 mt-0" type="submit" value="Login">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <script src="assets/global/js/bootstrap.bundle.min.js"></script>
    <script src="assets/templates/basic/js/app.js"></script>
    <script>
        $(document).ready(function () {
            (function ($) {
                "use strict";
                if (localStorage.authorizationData) {
                    window.location.replace("/members/#!/home");
                }

                // validate contactForm form
                $(function () {
                    $('#loginForm').validate({
                        rules: {
                            username: {
                                required: true
                            },
                            password: {
                                required: true
                            },
                            number: {
                                required: true,
                                minlength: 5
                            }
                        },
                        messages: {
                            username: {
                                required: "Username is required",
                                minlength: "Your username must consist of at least 6 characters"
                            },
                            password: {
                                required: "Password is required"
                            }
                        },
                        submitHandler: function (form) {
                            var username = $(form).find("input[name='username']").val();
                            var password = $(form).find("input[name='password']").val();
                            var userid = username;
                            var stoken = btoa(username + ':' + password);
                            var data = { route: 'adminlogin', token: stoken };
                            $.ajax({
                                type: "POST",
                                url: "auth.php",
                                data: JSON.stringify(data),
                                dataType: "json",
                                contentType: 'application/json',
                                success: function (data) {
                                    var response = data;
                                    $('#loginForm :input').attr('disabled', 'disabled');
                                    $('#loginForm').fadeTo("slow", 1, function () {
                                        $(this).find(':input').attr('disabled', 'disabled');
                                        $(this).find('label').css('cursor', 'default');
                                        console.log(response);
                                        if (response.result == '1') {
                                            localStorage.setItem('currentUser', JSON.stringify(response));
                                            if (response.isadmin == '1')
                                                window.location.replace("http://localhost:4200/#/dashboard");
                                            else if (response.isadmin == '2')
                                                window.location.replace("/admin/#/members/dashboard");
                                            else if (response.isadmin == '3')
                                                window.location.replace("/admin/#/products/dashboard");
                                            else if (response.isadmin == '4')
                                                window.location.replace("/admin/#/payouts/dashboard");
                                            else if (response.isadmin == '5')
                                                window.location.replace("/admin/#/accounts/dashboard");
                                            else
                                                window.location.replace("/members.php");
                                            return;
                                        } else {
                                            Swal.fire("Error", "Error while login, please try again", "error");
                                            $(this).find(':input').removeAttr('disabled');
                                        }
                                    });
                                }
                            });
                            return false;
                        }
                    });
                });
            })(jQuery);
        });
    </script>

</body>
</html>
