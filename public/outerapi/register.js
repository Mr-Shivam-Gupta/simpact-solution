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
          acceptcheck: { requied: "Please accept the terms" },
        },
        submitHandler: function (form) {
          if (!formsubmitting) {
            formsubmitting = true;
            $("#registerForm :input").attr("disabled", "disabled");
            var name = $(form).find("input[name='name']").val().toUpperCase();
            //var lastname = $(form).find( "input[name='lname']" ).val().toUpperCase();
            var mobile = $(form)
              .find("input[name='mobile']")
              .val()
              .toUpperCase();
            var email = $(form).find("input[name='email']").val();
            var password = $(form).find("input[name='password']").val();

            var spid = $(form)
              .find("input[name='sponsorid']")
              .val()
              .toUpperCase();
            //var uid = $(form).find( "input[name='uid']" ).val();

            $.ajax({
              type: "POST",
              url: "api.php",
              //var data='route=register&sid=' + sid + '&uid=' + uid + '&pinno=' + pinno
              //+ '&firstname=' + fname + '&lastname=' + lname + '&city=' + city + '&state=' + state + '&address=&pincode=&sex=' + sex +'&dob=&pan=' + pan  +'&contact=' + contact  + '&password=' + password;
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
                var response = jQuery.parseJSON(data);

                $("#registerForm").fadeTo("slow", 1, function () {
                  //$(this).find(':input').attr('disabled', 'disabled');
                  $(this).find("label").css("cursor", "default");
                  //alert(response[0].NewUserId);
                  if (response.result == 1) {
                    //alert(response[0].NewUserId);
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

                    $(form).find("input[name='name']").val("");

                    $(form).find("input[name='mobile']").val("");
                    $(form).find("input[name='email']").val("");
                    $(form).find("input[name='password']").val("");

                    $(this).find(":input").removeAttr("disabled");
                    return false;
                  } else {
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
          //alert(JSON.stringify(data));
          var response = jQuery.parseJSON(data);
          if (response.result == "1") {
            //$("#email").attr("disabled", "disaabled");
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
