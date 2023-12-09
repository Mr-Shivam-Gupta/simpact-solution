@extends('admin.common.master')

@section('content')
<div class="body-wrapper">
   <div class="bodywrapper__inner">
      <div class="row align-items-center mb-30 justify-content-between">
         <div class="col-lg-6 col-sm-6">
            <h6 class="page-title">Contact Data View</h6>
         </div>
         <div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3 right-part">
            <a href="{{ url('/admin/contact') }}" class="btn btn-sm btn--dark box--shadow1 text--small"><i class="la la-fw la-backward"></i>Go Back</a>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card b-radius--10">
                           <div class="card-body p-0">
                              <div class="table-responsive">
                                 <table class="table table--light style--two">
                                    <tbody>
                                       <tr>
                                          <th scope="col">Name</th>
                                          <td data-label="Name">{{ $contact->name }}</td>
                                       </tr>
                                       <tr>
                                          <th scope="col">Email</th>
                                          <td data-label="Email">{{ $contact->email }}</td>
                                       </tr>
                                       <tr>
                                          <th scope="col">Phone</th>
                                          <td data-label="Phone">{{ $contact->phone }}</td>
                                       </tr>
                                       <tr>
                                          <th scope="col">Subject</th>
                                          <td data-label="Subject">{{ $contact->subject }}</td>
                                       </tr>
                                       <tr>
                                          <th scope="col" width="100">Message</th>
                                          <td data-label="Message" style="white-space: inherit;text-align: right;">{{ $contact->message }}</td>
                                       </tr>
                                       <tr>
                                          <th scope="col">IP Address</th>
                                          <td data-label="Phone">{{ $contact->ip_address }}</td>
                                       </tr>
                                       <tr>
                                          <th scope="col">Browser</th>
                                          <td data-label="Phone">{{ $contact->browser }}</td>
                                       </tr>
                                       @php $locations = json_decode($contact->location, true);  @endphp 
                                       @if ($locations)
                                      
                                       @foreach ($locations as $key => $value)
                                       @if (in_array($key, ['countryName', 'currencyCode','regionCode', 'countryCode', 'cityName', 'regionName','zipCode','latitude','longitude','areaCode','timezone']))
                                       <tr>
                                           <th scope="col " style="text-transform: capitalize;" width="100">{{ $key }}</th>
                                           <td data-label="" style="white-space: inherit;text-align: right;">{{ $value }}</td>
                                       </tr>
                                       @endif
                                   @endforeach
                                       @endif
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                        <!-- card end -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- bodywrapper__inner end -->
</div>
<!-- body-wrapper end -->
</div>

@endsection
