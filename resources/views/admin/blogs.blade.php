@extends('admin.common.master')
@section('content')
<div class="body-wrapper">
   <div class="bodywrapper__inner">
      <div class="row align-items-center mb-30 justify-content-between">
         <div class="col-lg-6 col-sm-6">
            <h6 class="page-title">Blog Section</h6>
         </div>
         <div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3 right-part">
            <a href="{{url('/admin/blog-create')}}" class="btn btn-sm btn--success box--shadow1 text--small"><i class="fa fa-fw fa-plus"></i>Add New</a>
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
                              <th scope="col">Image</th>
                              <th scope="col">Title</th>
                              <th scope="col">Publish Date</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                           </tr>
                        </thead>
                        <tbody class="list">
                        @php $i = 1;  @endphp
                        @foreach($blogs as $blog)
                           <tr>
                              <td data-label="SL">{{ $i++ }}</td>
                              <td data-label="Image">
                                 <div class="customer-details d-block">
                                    <a href="javascript:void(0)" class="thumb">
                                    <img src="{{ asset('blog_images') . '/' . $blog->image }}" alt="{{$blog->title}}">
                                    </a>
                                 </div>
                              </td>
                              <td data-label="Title" style="text-transform: capitalize;">{{$blog->title}}</td>
                              <td data-label="Publish Date">{{ \Carbon\Carbon::parse($blog->publish_date)->format('d-m-Y') }}</td>
                              <td data-label="Status">
                              <input type="checkbox" data-id="{{ $blog->id }}" data-width="90%" data-onstyle="-success" data-offstyle="-danger"
                                       data-toggle="toggle"  data-on="Active" data-off="Deactive" name="Status"
                                       @if($blog->status == '0') checked
                                        @elseif($blog->status == '1') unchecked @endif>
                                       <meta name="csrf-token" content="{{ csrf_token() }}">
                                    </td>
                              <td data-label="Action">
                                 <a href="{{url('/admin/blog').'/'.$blog->id.'/'. ('edit')}}" class="icon-btn"><i class="la la-pencil-alt"></i></a>
                                 <a href=" {{ url('/admin/blog/' . $blog->id . '/delete') }}" class="icon-btn btn--danger removeBtn" data-id="62"><i class="la la-trash"></i></a>
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
                  {{ $blogs->links('vendor.pagination.bootstrap-4') }}
                  </ul>
                  </nav>
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
@section('script')
<script>
   $(document).ready(function () {
       $('input[name="Status"]').change(function () {
           var status = $(this).prop('checked') ? '0' : '1';
           var itemId = $(this).data('id');
           $.ajax({
               url: '/admin/update-status', 
               type: 'PUT',
               headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
               data: {
                   id: itemId,
                   status: status,
               },
               success: function (response) {
                   console.log(response);
               },
               error: function (xhr, status, error) {
                   console.error(error);
               }
           });
       });
   });
</script>

@endsection
