@extends('admin.common.master')
@section('content')
<style>
   .msg{
      max-width: 500px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    text-align: right;
   }
</style>
<div class="body-wrapper">
   <div class="bodywrapper__inner">
      <div class="row align-items-center mb-30 justify-content-between">
         <div class="col-lg-6 col-sm-6">
            <h6 class="page-title">Contact Data</h6>
         </div>
         <div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3 right-part">
         <form action="{{ route('contact.index') }}" method="GET" class="form-inline float-sm-right bg--white">
            @csrf
            <div class="input-group has_append">
                <input type="text" name="search" class="form-control" placeholder="Search here" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div class="card b-radius--10 ">
               <div class="card-body p-0">
                  <div class="table-responsive--sm table-responsive">
                     <table class="table table--light style--two">
                        <thead>
                           <tr>
                              <th scope="col">SL</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Phone</th>
                              <th scope="col">Subject</th>
                              <th scope="col" width="100">Message</th>
                              <th scope="col">View</th>
                           </tr>
                        </thead>
                        <tbody > 
                           @php $i=1;@endphp
                        @foreach($contactData as $contact)
                        <tr>
                           <td data-label="SL"> <a href="{{url('/admin/contact').'/'.$contact->id.'/'. ('view')}}"  data-toggle="tooltip" data-original-title="Detail">{{ $i++ }} </a></td>
                           <td data-label="Username">{{ $contact->name }}</td>
                           <td data-label="Email">{{ $contact->email }}</td>
                           <td data-label="Phone">{{ $contact->phone }}</td>
                           <td data-label="Subject">{{ $contact->subject }}</td>
                           <td data-label="Message" class="msg">{{ $contact->message }}</td>
                           <td data-label="View">
                              <a href="{{url('/admin/contact').'/'.$contact->id.'/'. ('view')}}" class="icon-btn ml-1 " data-toggle="tooltip" data-original-title="Detail">
                              <i class="la la-eye"></i>
                              </a>
                           </td>
                        </tr>
                     @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="card-footer py-4">
                  <nav aria-label="...">
                  <ul id="pagination" class="pagination justify-content-end mb-0">
                  {{ $contactData->links('vendor.pagination.bootstrap-4') }}
                  </ul>
                  </nav>
               </div>
            </div>
            <!-- card end -->
         </div>
      </div>
   </div>
   <!-- bodywrapper__inner end -->
</div>
<!-- body-wrapper end -->
</div>

@endsection