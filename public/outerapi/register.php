<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
   
</head>
<body>

    <section class="account-section padding-bottom padding-top">
        <div class="container">
            <div class="account-wrapper">
                <div class="login-area account-area">
                    <div class="row m-0">
                        <div class="col-lg-4 p-0">
                            <div class="change-catagory-area bg_img" data-background="assets/images/frontend/register/63821af2b19aa1669470962.jpg">
                                <h4 class="title">Welcome To MLMLAB</h4>
                                <p>Already have an account?</p>
                                <a class="custom-button account-control-button" href="login.php">Login</a>
                            </div>
                        </div>
                        <div class="col-lg-8 p-0">
                            <div class="common-form-style bg-one create-account">
                                <h4 class="title">Create Your Account</h4>
                                <p class="mb-sm-4 mb-3">Haven&#039;t registered yet! don&#039;t worry just fillip all the information below and get your account now.</p>
                                <form class="row "  id="registerForm">
                                   
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Sponser Id</label>
                                            <input class="checkUser" name="sponsorid" id="sponsorid"  type="text" value=""  placeholder="Your Sponser Id" required>
                                            <small class="text--danger usernameExist"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input class="checkUser" name="name" id="name" type="text" value="" placeholder="Your Name Id" required>
                                            <small class="text--danger usernameExist"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input class="checkUser" name="email" id="email" type="email" value="" placeholder="Your Email Id" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Mobile</label>
                                            <div class="input-group">
                                                <input class="form-control" name="mobile" id="mobile" type="text" value="" placeholder="Your Phone Number" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Password</label>
                                            <input name="password" id="password" type="password" placeholder="Enter Password" required>
                                                                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Confirm password</label>
                                            <input name="password_confirm" id="password_confirm" type="Confirm Password" required>
                                        </div>
                                    </div>

                               

                                                                            <div class="col-md-12 mb-3">
                                            <div class="form--check">
                                                <input class="form-check-input" id="agree" name="agree" type="checkbox"  required>
                                                <label class="form-check-label" for="agree">
                                                    I agree with                                                </label>
                                                <span class="ms-1">
                                                                                                            <a href="policy/privacy-policy/42.html" target="_blank">Privacy Policy</a>
                                                                                                                    ,
                                                                                                                                                                    <a href="policy/terms-of-service/43.html" target="_blank">Terms of Service</a>
                                                                                                                                                            </span>
                                            </div>

                                        </div>
                                                                        <div class="form-group col-md-12">
                                        <input class="w-100" type="submit" value="Create an Account">
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
            var formsubmitting = false;

            (function ($) {
                "use strict";

                jQuery.validator.setDefaults({
                    ignore: ":hidden, [readonly=readonly], [disabled=disabled]",
                });

                // validate contactForm form
                $(function () {
                    $("#registerForm").validate({
                        rules: {
                            email: {
                                required: true,
                                rightemail: true,
                            },
                            mobile: {
                                required: true,
                                maxlength: 10,
                                minlength: 10,
                            },
                            name: "required",
                            password: "required",

                            password_confirm: {
                                minlength: 5,
                                equalTo: "#password",
                            },
                        },
                        messages: {
                            acceptcheck: { required: "Please accept the terms" },
                        },
                        submitHandler: function (form) {
                            if (!formsubmitting) {
                                formsubmitting = true;
                                $("#registerForm :input").attr("disabled", "disabled");
                                var name = $(form).find("input[name='name']").val().toUpperCase();
                                var mobile = $(form).find("input[name='mobile']").val().toUpperCase();
                                var email = $(form).find("input[name='email']").val();
                                var password = $(form).find("input[name='password']").val();
                                var spid = $(form).find("input[name='sponsorid']").val().toUpperCase();

                                $.ajax({
                                    type: "POST",
                                    url: "api.php",
                                    contentType: "application/json",
                                    data: JSON.stringify({
                                        route: "register",
                                        sid: spid,
                                        name: name,
                                        email: email,
                                        mobile: mobile,
                                        password: password,
                                    }),
                                    success: function (data) {
                                        alert('Your UserId is : ' +data.newuserid);
                                        var response = jQuery.parseJSON(data);
                                        $("#registerForm").fadeTo("slow", 1, function () {
                                            $(this).find("label").css("cursor", "default");
                                            if (response.result == 1) {
                                                // Handle success case
                                                $("#fullname").text(name.toUpperCase());
                                                $("#nname").text(name.toUpperCase());
                                                $("#nemail").text(email.toLowerCase());
                                                $("#ncontact").text(mobile.toUpperCase());
                                                $("#nspid").text(spid.toUpperCase());
                                                $("#npassword").text(password);
                                                $("#nusername").text(response.newuserid);

                                                $("#success").fadeIn();
                                                $(".modal").modal("hide");
                                                $("#success").modal("show");

                                                // Reset form fields
                                                $(form).find("input[name='name']").val("");
                                                $(form).find("input[name='mobile']").val("");
                                                $(form).find("input[name='email']").val("");
                                                $(form).find("input[name='password']").val("");

                                                $(this).find(":input").removeAttr("disabled");
                                          
                                                return false;
                                            } else {
                                                // Handle error case
                                                $("#error").fadeIn();
                                                $(".modal").modal("hide");
                                                $("#error").modal("show");
                                                formsubmitting = false;
                                            }
                                        });
                                    },
                                });
                                $(this).find(":input").removeAttr("disabled");
                                return false; // required to block normal submit since you used ajax
                            }
                        },
                    });
                });
            })(jQuery);

            jQuery.validator.addMethod(
                "rightemail",
                function (value, element) {
                    var output = false;
                    $.ajax({
                        type: "POST",
                        url: "api.php",
                        async: false,
                        contentType: "application/json",
                        data: JSON.stringify({ route: "checkemail", email: value }),
                        success: function (data) {
                            var response = jQuery.parseJSON(data);
                            if (response.result == "1") {
                                output = true;
                            } else {
                                $("#email").removeAttr("readonly");
                                output = false;
                            }
                        },
                        error: function () {
                            $("#email").removeAttr("readonly");
                            output = false;
                        },
                    });
                    return output;
                },
                "Email Already In Use"
            );
        });
    </script>

</body>
</html>
