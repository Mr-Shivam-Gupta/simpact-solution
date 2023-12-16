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

{{-- <div class="container">
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
</div> --}}
<div class="container card">
    <div class="row p-2">
        <h5>@if($user) {{$user->name}} @else<p>prvide some details </p>@endif</h5>
    </div>
    <form action="{{url('add-customers')}}"  method="post" class="d-flex">
        @csrf
        <div class="row card-body p-2">
            <div class="col-md-6 col-sm-12">
                <div class="col-12">
                    <label for="input_fullname">Name</label>
                    <input name="name" type="text" id="input_fullname" class="form-control" value="shivam gupta">
                </div>
                <div class="col-12">
                    <label for="input_email">Email</label>
                    <input name="email" type="text" class="form-control" value="shivam@gmail.com" id="input_email" size="35">
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
                        <input name="city" type="text" class="form-control" value="raipur" id="select_city" size="35">
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
                    <select id="country" class="form-control required" name="country" onchange="change_country(this.value)">
                        <option value="null">
                            Select a Country
                         </option>
                         <option value="AX">Åland Islands</option>
                         <option value="AF">Afghanistan</option>
                         <option value="AL">Albania</option>
                         <option value="DZ">Algeria</option>
                         <option value="AS">American Samoa</option>
                         <option value="AD">Andorra</option>
                         <option value="AO">Angola</option>
                         <option value="AI">Anguilla</option>
                         <option value="AQ">Antarctica</option>
                         <option value="AG">Antigua And Barbuda</option>
                         <option value="AR">Argentina</option>
                         <option value="AM">Armenia</option>
                         <option value="AW">Aruba</option>
                         <option value="AU">Australia</option>
                         <option value="AT">Austria</option>
                         <option value="AZ">Azerbaijan</option>
                         <option value="BS">Bahamas</option>
                         <option value="BH">Bahrain</option>
                         <option value="BD">Bangladesh</option>
                         <option value="BB">Barbados</option>
                         <option value="BY">Belarus</option>
                         <option value="BE">Belgium</option>
                         <option value="BZ">Belize</option>
                         <option value="BJ">Benin</option>
                         <option value="BM">Bermuda</option>
                         <option value="BT">Bhutan</option>
                         <option value="BO">Bolivia</option>
                         <option value="BA">Bosnia and Herzegovina</option>
                         <option value="BW">Botswana</option>
                         <option value="BV">Bouvet Island</option>
                         <option value="BR">Brazil</option>
                         <option value="IO">British Indian Ocean Territory</option>
                         <option value="BN">Brunei</option>
                         <option value="BG">Bulgaria</option>
                         <option value="BF">Burkina Faso</option>
                         <option value="BI">Burundi</option>
                         <option value="KH">Cambodia</option>
                         <option value="CM">Cameroon</option>
                         <option value="CA">Canada</option>
                         <option value="CV">Cape Verde</option>
                         <option value="BQ">Caribbean Netherlands</option>
                         <option value="KY">Cayman Islands</option>
                         <option value="CF">Central African Republic</option>
                         <option value="TD">Chad</option>
                         <option value="CL">Chile</option>
                         <option value="CN">China</option>
                         <option value="CX">Christmas Island</option>
                         <option value="CC">Cocos (Keeling) Islands</option>
                         <option value="CO">Colombia</option>
                         <option value="KM">Comoros</option>
                         <option value="CG">Congo</option>
                         <option value="CD">Congo, Democractic Republic</option>
                         <option value="CK">Cook Islands</option>
                         <option value="CR">Costa Rica</option>
                         <option value="CI">Cote D'Ivoire (Ivory Coast)</option>
                         <option value="HR">Croatia (Hrvatska)</option>
                         <option value="CW">Curacao</option>
                         <option value="CY">Cyprus</option>
                         <option value="CZ">Czech Republic</option>
                         <option value="DK">Denmark</option>
                         <option value="DJ">Djibouti</option>
                         <option value="DM">Dominica</option>
                         <option value="DO">Dominican Republic</option>
                         <option value="TP">East Timor</option>
                         <option value="EC">Ecuador</option>
                         <option value="EG">Egypt</option>
                         <option value="SV">El Salvador</option>
                         <option value="GQ">Equatorial Guinea</option>
                         <option value="ER">Eritrea</option>
                         <option value="EE">Estonia</option>
                         <option value="ET">Ethiopia</option>
                         <option value="FK">Falkland Islands (Islas Malvinas)</option>
                         <option value="FO">Faroe Islands</option>
                         <option value="FJ">Fiji Islands</option>
                         <option value="FI">Finland</option>
                         <option value="FR">France</option>
                         <option value="FX">France, Metropolitan</option>
                         <option value="GF">French Guiana</option>
                         <option value="PF">French Polynesia</option>
                         <option value="TF">French Southern Territories</option>
                         <option value="GA">Gabon</option>
                         <option value="GM">Gambia, The</option>
                         <option value="GE">Georgia</option>
                         <option value="DE">Germany</option>
                         <option value="GH">Ghana</option>
                         <option value="GI">Gibraltar</option>
                         <option value="GR">Greece</option>
                         <option value="GL">Greenland</option>
                         <option value="GD">Grenada</option>
                         <option value="GP">Guadeloupe</option>
                         <option value="GU">Guam</option>
                         <option value="GT">Guatemala</option>
                         <option value="GG">Guernsey</option>
                         <option value="GN">Guinea</option>
                         <option value="GW">Guinea-Bissau</option>
                         <option value="GY">Guyana</option>
                         <option value="HT">Haiti</option>
                         <option value="HM">Heard and McDonald Islands</option>
                         <option value="HN">Honduras</option>
                         <option value="HK">Hong Kong S.A.R.</option>
                         <option value="HU">Hungary</option>
                         <option value="IS">Iceland</option>
                         <option selected value="IN">India</option>
                         <option value="ID">Indonesia</option>
                         <option value="IQ">Iraq</option>
                         <option value="IE">Ireland</option>
                         <option value="IM">Isle of Man</option>
                         <option value="IL">Israel</option>
                         <option value="IT">Italy</option>
                         <option value="JM">Jamaica</option>
                         <option value="JP">Japan</option>
                         <option value="JE">Jersey</option>
                         <option value="JO">Jordan</option>
                         <option value="KZ">Kazakhstan</option>
                         <option value="KE">Kenya</option>
                         <option value="KI">Kiribati</option>
                         <option value="KR">Korea</option>
                         <option value="XK">Kosovo</option>
                         <option value="KW">Kuwait</option>
                         <option value="KG">Kyrgyzstan</option>
                         <option value="LA">Laos</option>
                         <option value="LV">Latvia</option>
                         <option value="LB">Lebanon</option>
                         <option value="LS">Lesotho</option>
                         <option value="LR">Liberia</option>
                         <option value="LY">Libya</option>
                         <option value="LI">Liechtenstein</option>
                         <option value="LT">Lithuania</option>
                         <option value="LU">Luxembourg</option>
                         <option value="MO">Macau S.A.R.</option>
                         <option value="MK">Macedonia</option>
                         <option value="MG">Madagascar</option>
                         <option value="MW">Malawi</option>
                         <option value="MY">Malaysia</option>
                         <option value="MV">Maldives</option>
                         <option value="ML">Mali</option>
                         <option value="MT">Malta</option>
                         <option value="MH">Marshall Islands</option>
                         <option value="MQ">Martinique</option>
                         <option value="MR">Mauritania</option>
                         <option value="MU">Mauritius</option>
                         <option value="YT">Mayotte</option>
                         <option value="MX">Mexico</option>
                         <option value="FM">Micronesia</option>
                         <option value="MD">Moldova</option>
                         <option value="MC">Monaco</option>
                         <option value="MN">Mongolia</option>
                         <option value="ME">Montenegro</option>
                         <option value="MS">Montserrat</option>
                         <option value="MA">Morocco</option>
                         <option value="MZ">Mozambique</option>
                         <option value="MM">Myanmar</option>
                         <option value="NA">Namibia</option>
                         <option value="NR">Nauru</option>
                         <option value="NP">Nepal</option>
                         <option value="NL">Netherlands</option>
                         <option value="AN">Netherlands Antilles</option>
                         <option value="NC">New Caledonia</option>
                         <option value="NZ">New Zealand</option>
                         <option value="NI">Nicaragua</option>
                         <option value="NE">Niger</option>
                         <option value="NG">Nigeria</option>
                         <option value="NU">Niue</option>
                         <option value="NF">Norfolk Island</option>
                         <option value="MP">Northern Mariana Islands</option>
                         <option value="NO">Norway</option>
                         <option value="OM">Oman</option>
                         <option value="PK">Pakistan</option>
                         <option value="PW">Palau</option>
                         <option value="PS">Palestinian Territory, Occupied</option>
                         <option value="PA">Panama</option>
                         <option value="PG">Papua new Guinea</option>
                         <option value="PY">Paraguay</option>
                         <option value="PE">Peru</option>
                         <option value="PH">Philippines</option>
                         <option value="PN">Pitcairn Island</option>
                         <option value="PL">Poland</option>
                         <option value="PT">Portugal</option>
                         <option value="PR">Puerto Rico</option>
                         <option value="QA">Qatar</option>
                         <option value="RE">Reunion</option>
                         <option value="RO">Romania</option>
                         <option value="RU">Russia</option>
                         <option value="RW">Rwanda</option>
                         <option value="BL">Saint Barthelemy</option>
                         <option value="SH">Saint Helena</option>
                         <option value="KN">Saint Kitts And Nevis</option>
                         <option value="LC">Saint Lucia</option>
                         <option value="PM">Saint Pierre and Miquelon</option>
                         <option value="VC">Saint Vincent And The Grenadines</option>
                         <option value="WS">Samoa</option>
                         <option value="SM">San Marino</option>
                         <option value="ST">Sao Tome and Principe</option>
                         <option value="SA">Saudi Arabia</option>
                         <option value="SN">Senegal</option>
                         <option value="RS">Serbia</option>
                         <option value="SC">Seychelles</option>
                         <option value="SL">Sierra Leone</option>
                         <option value="SG">Singapore</option>
                         <option value="SX">Sint Maarten</option>
                         <option value="SK">Slovakia</option>
                         <option value="SI">Slovenia</option>
                         <option value="SB">Solomon Islands</option>
                         <option value="SO">Somalia</option>
                         <option value="ZA">South Africa</option>
                         <option value="GS">South Georgia And The South Sandwich Islands</option>
                         <option value="SS">South Sudan</option>
                         <option value="ES">Spain</option>
                         <option value="LK">Sri Lanka</option>
                         <option value="SR">Suriname</option>
                         <option value="SJ">Svalbard And Jan Mayen Islands</option>
                         <option value="SZ">Swaziland</option>
                         <option value="SE">Sweden</option>
                         <option value="CH">Switzerland</option>
                         <option value="TW">Taiwan</option>
                         <option value="TJ">Tajikistan</option>
                         <option value="TZ">Tanzania</option>
                         <option value="TH">Thailand</option>
                         <option value="TL">Timor-Leste</option>
                         <option value="TG">Togo</option>
                         <option value="TK">Tokelau</option>
                         <option value="TO">Tonga</option>
                         <option value="TT">Trinidad And Tobago</option>
                         <option value="TN">Tunisia</option>
                         <option value="TR">Turkey</option>
                         <option value="TM">Turkmenistan</option>
                         <option value="TC">Turks And Caicos Islands</option>
                         <option value="TV">Tuvalu</option>
                         <option value="UG">Uganda</option>
                         <option value="UA">Ukraine</option>
                         <option value="AE">United Arab Emirates</option>
                         <option value="GB">United Kingdom</option>
                         <option value="US">United States</option>
                         <option value="UM">United States Minor Outlying Islands</option>
                         <option value="UY">Uruguay</option>
                         <option value="UZ">Uzbekistan</option>
                         <option value="VU">Vanuatu</option>
                         <option value="VA">Vatican City State (Holy See)</option>
                         <option value="VE">Venezuela</option>
                         <option value="VN">Vietnam</option>
                         <option value="VG">Virgin Islands (British)</option>
                         <option value="VI">Virgin Islands (US)</option>
                         <option value="WF">Wallis And Futuna Islands</option>
                         <option value="EH">WESTERN SAHARA</option>
                         <option value="YE">Yemen</option>
                         <option value="ZM">Zambia</option>
                         <option value="ZW">Zimbabwe</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="stateSelect">State</label>
                    <select name="state" class="form-control required" onchange="showHideOtherState(this);" id="stateSelect">
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
                    <label for="input_mobile">Mobile</label>
                    <div style="display: -webkit-box">
                        <input class="form-control w-25" type="text" id="input_mobile_cc" name="mobilenocc" maxlength="3" size="3" value="+91">
                        <input class="form-control w-75" type="text" id="input_mobile" name="mobileno" maxlength="12" value="9669729320" size="35">
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
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    
</div>
</div>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
//    $(document).ready(function () {
//     // jQuery Validation
//     $('#formId').validate({
//         rules: {
//             // Your validation rules
//         },
//         messages: {
//             // Your validation messages
//         },
//         submitHandler: function (form) {
//             // Prepare data as JSON
//             var formData = {
//                 name: $('#name').val(),
//                 email: $('#email').val(),
//                 // Add other form fields as needed
//             };

//             // AJAX form submission
//             $.ajax({
//                 type: 'POST',
//                 url: 'add-customers',
//                 contentType: 'application/json', // Set content type to JSON
//                 data: JSON.stringify(formData), // Convert data to JSON string
//                 success: function (response) {
//                     console.log(response);
//                 },
//                 error: function (error) {
//                     console.log(error);
//                 }
//             });
//         }
//     });

    // Trigger form submission when the anchor is clicked
//     $('#submit').on('click', function () {
//         $('#formId').submit();
//     });
// });

</script>



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
