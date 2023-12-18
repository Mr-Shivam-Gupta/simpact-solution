@extends('layouts.master')

@section('content')
<style>
    .div {
        padding: 5px;
        transition: background-color 0.4s ease;
    }
    .div:hover {
        padding: 5px;
        background-color: #a8a8a8;
        border-radius: 5px;
        color: #fff;
    }
</style>

<section class="hero-section bg--title shapes-container">
    <div class="container">
        <h1 class="hero-title">Products</h1>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <form id="domainForm" method="POST">
                    @csrf
                    <input name="domain" type="text">
                    <div class="d-flex align-items-center">
                        <input type="radio" id="com" name="tlds" value="com"> <label for="com">com</label><br>
                        <input type="radio" id="net" name="tlds" value="net"> <label for="net">net</label><br>
                        <input type="radio" id="in" name="tlds" value="in"> <label for="in">in</label>
                        <input type="radio" id="org" name="tlds" value="org"> <label for="org">org</label>
                        <input type="radio" id="co.in" name="tlds" value="co.in"> <label for="co.in">co.in</label>
                    </div>
                    <button type="submit" onclick="submitForm()">Submit</button>
                </form>

                <div class="card-body">
                    <div id="checkDomainsContainer"></div>
                    <hr class="my-1">
                    <!-- Add more sections as needed -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container card">
    <div class="row p-2">
        <h5>@if($user) {{$user->name}} @else<p>prvide some details </p>@endif</h5>
    </div>
    <form  id="add-customers"  method="post" class="d-flex">
        @csrf
        <div class="row card-body p-2">
            <div class="col-md-6 col-sm-12">
                <div class="col-12">
                    <label for="input_fullname">Name</label>
                    <input name="name" type="text" id="input_fullname" class="form-control" value="@if($user) {{$user->name}} @endif">
                </div>
                <div class="col-12">
                    <label for="input_email">Email</label>
                    <input name="email" type="text" class="form-control" value="@if($user) {{$user->email}} @endif" id="input_email" size="35">
                </div>
                <div class="col-12">
                    <label for="input_companyname">Company Name</label>
                    <input name="companyname" type="text" class="form-control" value="simpact solution" id="input_companyname" size="35">
                </div>
                <div class="col-12">
                    <label for="input_address1">Address</label>
                    <input name="address1" type="text" class="form-control" value="santoshi nagar raipur" id="input_address1" size="35">
                    <div class="col-12">
                        <label for="select_city">City</label>
                        <input name="city"  type="text" class="form-control" value="raipur" id="select_city" size="35">
                    </div>
                    <div class="col-12">
                        <label for="input_zip">Zip</label>
                        <input name="zip" type="text" class="form-control" value="492001" id="input_zip" size="35">
                    </div>
                </div>
            </div>
    
            <div class="col-md-6 col-sm-12">
                <div class="col-12">
                    <label for="country">Country</label>
                    <select id="country" class="form-control required" name="country" >
                        <option selected value="IN">India</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="stateSelect">State</label>
                    <select name="state" class="form-control required"  id="stateSelect">
                        <option value="Select State">Select State</option>
                                          <option value="1711">Andaman and Nicobar Islands</option>
                                          <option value="1712">Andhra Pradesh</option>
                                          <option value="1713">Arunachal Pradesh</option>
                                          <option value="1714">Assam</option>
                                          <option value="1715">Bihar</option>
                                          <option value="1716">Chandigarh</option>
                                          <option selected value="Chhattisgarh">Chhattisgarh</option>
                                          <option value="1717">Dadra and Nagar Haveli and Daman and Diu</option>
                                          <option value="1719">Delhi</option>
                                          <option value="1720">Goa</option>
                                          <option value="1721">Gujarat</option>
                                          <option value="1722">Haryana</option>
                                          <option value="1723">Himachal Pradesh</option>
                                          <option value="1724">Jammu and Kashmir</option>
                                          <option value="3951">Jharkhand</option>
                                          <option value="1725">Karnataka</option>
                                          <option value="1726">Kerala</option>
                                          <option value="4317">Ladakh</option>
                                          <option value="1727">Lakshadweep</option>
                                          <option value="1728">Madhya Pradesh</option>
                                          <option value="1729">Maharashtra</option>
                                          <option value="1730">Manipur</option>
                                          <option value="1731">Meghalaya</option>
                                          <option value="1732">Mizoram</option>
                                          <option value="1733">Nagaland</option>
                                          <option value="1734">Orissa</option>
                                          <option value="1735">Pondicherry</option>
                                          <option value="1736">Punjab</option>
                                          <option value="1737">Rajasthan</option>
                                          <option value="1738">Sikkim</option>
                                          <option value="1739">Tamil Nadu</option>
                                          <option value="4284">Telangana</option>
                                          <option value="1740">Tripura</option>
                                          <option value="1741">Uttar Pradesh</option>
                                          <option value="3867">Uttaranchal</option>
                                          <option value="1742">West Bengal</option>
                                          <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="input_phone">Phone</label>
                    <div style="display: -webkit-box">
                        <input class="form-control w-25" type="text" id="input_phone_cc" name="telnocc" maxlength="3" size="3" value="+91">
                        <input class="form-control w-75" type="text" id="input_phone" name="telno" maxlength="12" value="9669729320" size="35">
                    </div>
                </div>
                <div class="col-12">
                    <label for="passwd">Password</label>
                    <input name="passwd" type="text" class="form-control" value="SHivam@123" id="passwd" size="35">
                </div>
                <div class="col-12">
                    <label for="conf_passwd">Confirm Password</label>
                    <input name="conf_passwd" type="text" class="form-control" value="SHivam@123" id="conf_passwd" size="35">
                </div>
            </div>
            <div class="d-flex justify-content-center col-12 mt-2">
                <button  type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <form action="modify-user" method="post" id="modifyUser" class="d-none">
        @csrf
        <input type="hidden" name="user_id" value="@if($user) {{$user->id}} @endif">
        <input type="hidden" name="name" value="@if($user) {{$user->name}} @endif">
        <input type="hidden" name="email" value="@if($user) {{$user->email}} @endif">
        <input type="hidden" name="customer_id" id="customer_id" value="">
        <input type="hidden" name="companyname_id" id="companyname_id" value="">
        <input type="hidden" name="address1_id" id="address1_id" value="">
        <input type="hidden" name="city_id" id="city_id" value="">
        <input type="hidden" name="country_id" id="country_id" value="">
        <input type="hidden" name="state_id" id="state_id" value="">
        <input type="hidden" name="phone_id" id="phone_id" value="">
        <input type="hidden" name="zip_id" id="zip_id" value="">
        <button type="submit">submit</button>
    </form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


<script>
$(document).ready(function () {
    $('#add-customers').submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        console.log(formData);
        Swal.fire({
            title: 'Loading...',
            allowOutsideClick: false,
            showConfirmButton: false,
            onBeforeOpen: () => {
                Swal.showLoading();
            }
        });
        $.ajax({
            type: 'POST',
            url: 'add-customers',
            data: formData,
            success: function (response) {
                Swal.close();
                if (response.success) {
                    const customerId = $(response.data).text();
                    setCustomerIdAndSubmit(customerId);
                    Swal.fire({
                        icon: 'success',
                        title: 'API requests successful',
                        text: 'This is your customer ID: ' + customerId
                    });
                } else {
                    // API request failed
                    const errorMessage = $(response.error).find('message').text();
                    Swal.fire({
                        icon: 'error',
                        title: 'API request failed',
                        text: errorMessage
                    });
                }
            },
            error: function (error) {
                // Close loader
                Swal.close();

                // Handle the error response
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred during the API request.'
                });
            }
        });
    });

    function setCustomerIdAndSubmit(customerId) {

        var companyname = $('#input_companyname').val();
        var address1 = $('#input_address1').val();
        var city = $('#select_city').val();
        var zip = $('#zip').val();
        var country = $('#country').val();
        var state = $('#stateSelect').val();
        var phone = $('#input_phone').val();
        var password = $('#passwd').val();


        $('#password_id').val(password);
        $('#customer_id').val(customerId);
        $('#address1_id').val(address1);
        $('#companyname_id').val(companyname);
        $('#zip_id').val(zip);
        $('#city_id').val(city);
        $('#country_id').val(country);
        $('#state_id').val(state);
        $('#phone_id').val(phone);

        $('#modifyUser').submit();
    }

 
});
</script>

{{-- <script>
    $(document).ready(function () {
    $('#add-customers').submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        console.log(formData);
        Swal.fire({
            title: 'Loading...',
            allowOutsideClick: false,
            showConfirmButton: false,
            onBeforeOpen: () => {
                Swal.showLoading();
            }
        });
        $.ajax({
            type: 'POST',
            url: 'add-customers',
            data: formData,
            success: function (response) {
                Swal.close();
                if (response.success) {
                    const customerId = $(response.data).text();
                    setCustomerIdAndSubmit(customerId);
                    Swal.fire({
                        icon: 'success',
                        title: 'API requests successful',
                        text: 'This is your customer ID: ' + customerId
                    });
                } else {
                    // API request failed
                    const errorMessage = $(response.error).find('message').text();
                    Swal.fire({
                        icon: 'error',
                        title: 'API request failed',
                        text: errorMessage
                    });
                }
            },
            error: function (error) {
                // Close loader
                Swal.close();

                // Handle the error response
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred during the API request.'
                });
            }
        });
    });

            function setCustomerIdAndSubmit(customerId) {
                $('#customer_id').val(customerId);
                var formData = $('#modifyUser').serialize();
        $.ajax({
            type: 'POST',
            url: 'modify-user/',
            data: formData,
        
            success: function (modifyResponse) {
                Swal.fire({
                    icon: 'success',
                    title: 'API requests successful',
                    text: 'This is your customer ID: ' + customerId
                });
            },
            error: function (modifyError) {
               
                Swal.fire({
                    icon: 'error',
                    title: 'modify-user request failed',
                    text: 'An error occurred during the modify-user request.'
                });
            }
        });
    }

});


</script> --}}

<script>
  function submitForm() {
      // Get form data
      var formData = $('#domainForm').serialize();

      // AJAX request
      $.ajax({
          type: 'POST',
          url: 'check-domain',
          data: formData,
          success: function (response) {
              // Update HTML content based on the response
              updateContent(response);
          },
          error: function (error) {
              console.log(error);
          }
      });
  }

  function updateContent(response) {
      // Example of updating the content dynamically
      var checkDomainsContainer = $('#checkDomainsContainer');

      // Clear previous content
      checkDomainsContainer.empty();

      // Check Domains
      if (response.check_domains) {
          $.each(response.check_domains, function (domain, details) {
              var domainElement = $('<div class="row div d-flex justify-content-between align-items-center border-bottom">' +
                  '<div class="col-md-8"><h5 class="d-flex"> ' + domain + '</h5></div>' +
                  '<div class="col-md-4">' +
                  '<div class="d-flex justify-content-between mt-2">' +
                  '<div class="d-flex flex-column">' +
                  '<span>Status: ' + details.status + '</span></div>' +
                  '<button class="btn btn-primary custom-btn">Btn</button>' +
                  '</div>' +
                  '</div>' +
                  '</div>');
              checkDomainsContainer.append(domainElement);

              // Display pricing and button only if the domain is available
              if (details.status === 'available') {
                  domainElement.find('.d-flex.flex-column').append(
                      '<span>Price: ' + details.price + ' &#8377;</span><span>1 Year</span>'
                  );
              }
          });
      } else {
          // Display a message if there are no domains to display
          checkDomainsContainer.append('<p>No domains to display.</p>');
      }

      // Premium Domains
      if (response.premium_domains) {
          $.each(response.premium_domains, function (index, premiumDomain) {
              var premiumDomainElement = $('<div class="row div d-flex justify-content-between align-items-center">' +
                  '<div class="col-md-8"><h5 class="d-flex">' + premiumDomain.domain + '</h5></div>' +
                  '<div class="col-md-4">' +
                  '<div class="d-flex justify-content-between mt-2">' +
                  '<div class="d-flex flex-column">' +
                  '<span>Price: ' + premiumDomain.price + ' &#8377;</span>' +
                  '</div>' +
                  '<button class="btn btn-primary custom-btn">Btn</button>' +
                  '</div>' +
                  '</div>' +
                  '</div>');
              checkDomainsContainer.append(premiumDomainElement);
          });
      } else {
          checkDomainsContainer.append('<p>No premium domains to display.</p>');
      }
  }
  $(document).ready(function() {
      $('#domainForm').submit(function(e) {
          e.preventDefault(); 
          submitForm(); 
      });
  });
</script>


@endsection
