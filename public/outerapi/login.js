$(document).ready(function(){
    
    (function($) {
        "use strict";
        if(localStorage.authorizationData)
        {
            window.location.replace("/members/#!/home");
        }
       

    // validate contactForm form
    $(function() {
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
                name: {
                    required: "Username is required",
                    minlength: "your username must consist of at least 6 characters"
                },
                password: {
                    required: "Password is required"
                }
            },
            submitHandler: function(form) {
                
                var username = $(form).find( "input[name='username']" ).val();
                var password = $(form).find("input[name='password']").val();
                
                var stoken=btoa(username + ':' + password);
                var data={route:'adminlogin',token:stoken};
                $.ajax({
                    type: "POST",
                    url: "auth.php",
                    data: JSON.stringify(data),
					dataType: "json",
            		contentType: 'application/json',
                    success: function (data) {
						
                        //try {
                            var response = data;
                            
                        //}
                       /* catch(e)
                        {
                            $('#error').fadeIn()
                            $('.modal').modal('hide');
                            $('#error').modal('show');
                        	
                            $(this).find(':input').removeAttr('disabled');
                            return;
                        }*/
                        
                       
                        $('#loginForm :input').attr('disabled', 'disabled');
                        $('#loginForm').fadeTo( "slow", 1, function() {
                            $(this).find(':input').attr('disabled', 'disabled');
                            $(this).find('label').css('cursor','default');
                            
                            if(response.result=='1')
                            {
                                
								localStorage.setItem('currentUser', JSON.stringify(response));
                                //localStorageService.set('authorizationData', { token: response.token, userName: username });
                                //localStorage.authorizationData= "{ token: " + response.token + ", userName: " + username +" }";
                               
                                    if(response.isadmin=='1')
                                        window.location.replace("/admin/#/dashboard");
                                    else if(response.isadmin=='2')
                                        window.location.replace("/admin/#/members/dashboard");
                                    else if(response.isadmin=='3')
                                        window.location.replace("/admin/#/products/dashboard");
                                    else if(response.isadmin=='4')
                                        window.location.replace("/admin/#/payouts/dashboard");
                                    else if(response.isadmin=='5')
                                        window.location.replace("/admin/#/accounts/dashboard");
                               
                                else
                                
                                    window.location.replace("/members/#/dashboard");
                                                        
                               
                                return;
                            }
                            else
                            {
                                Swal.fire("Error","Error while login, please try again","error");                            
                                 $(this).find(':input').removeAttr('disabled');
                            }
                        })     
                                
                            
                        
            
                    }
                })
                return false; // required to block normal submit since you used ajax
            }
                
    })
})
        
 })(jQuery)
});