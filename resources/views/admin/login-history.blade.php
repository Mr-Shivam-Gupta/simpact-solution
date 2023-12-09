@extends('admin.common.master')
@section('content')
<div class="body-wrapper">
   <div class="bodywrapper__inner">
      <div class="row align-items-center mb-30 justify-content-between">
         <div class="col-lg-6 col-sm-6">
            <h6 class="page-title">Login History</h6>
         </div>
         <div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3 right-part">
            <a href="{{url('/dashboard')}}" class="btn btn-sm btn--info box--shadow1 text--small"><i class=" las la-home"></i>Dashboard</a>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <div class="table-responsive--sm table-responsive">
                     <table class="table table--light style--two custom-data-table">
                        <thead>
                           <tr>
                              <th scope="col">SL</th>
                              <th scope="col">Name</th>
                              <th scope="col">Ip Address</th>
                              <th scope="col">Browser</th>
                              <th scope="col">Location</th>
                              <th scope="col">Login Date</th>
                              <th scope="col">Login Time</th>
                           </tr>
                        </thead>
                        <tbody class="list">
                        @php $i = 1;  @endphp
                        @foreach($logs as $log)
                        @php $locations = json_decode($log->location, true);  @endphp 
                        <tr>
                           <td data-label="SL"> {{ $i++ }} </td>
                           <td data-label="Name">{{ $user->name }}</td>
                           <td data-label="Ip Address">{{ $log->ip_address }}</td>
                           <td data-label="Browser">{{ $log->browser }}</td>
                           <td data-label="Location">@if($locations) {{ $locations['cityName']; }} @endif</td>
                           <td data-label="Login Date">{{ $log->login_at->format('d-M-Y') }}</td>
                           <td data-label="Login Time">{{ $log->login_at->format('H:i:s') }}</td>
                        </tr>
                     @endforeach
                        </tbody>
                     </table>
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

