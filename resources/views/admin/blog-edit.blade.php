@extends('admin.common.master')
@section('content')
<div class="body-wrapper">
   <div class="bodywrapper__inner">
      <div class="row align-items-center mb-30 justify-content-between">
         <div class="col-lg-6 col-sm-6">
            <h6 class="page-title">Blog Section Items</h6>
         </div>
         <div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3 right-part">
            <a href="{{url('/admin/blog')}}" class="btn btn-sm btn--dark box--shadow1 text--small"><i class="fa fa-fw fa-backward"></i>Go Back</a>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 mb-30">
            <div class="card">                                                            
               <div class="card-body">
                  <div class="col-8">
                              @if(session('success'))
                              <div class="alert alert-success p-2">
                                 {{ session('success') }}
                              </div>
                           @endif
                           @if(session('danger'))
                              <div class="alert alert-danger p-2">
                                 {{ session('danger') }}
                              </div>
                           @endif
                   </div>
                  <form action="{{ url('/admin/blog/' . $blogs->id . '/update') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="form-row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Blog image</label>
                              <div class="image-upload">
                                 <div class="thumb">
                                    <div class="avatar-preview">
                                       <div class="profilePicPreview" style="background-image: url({{asset('blog_images/'. $blogs->image)}})">
                                          <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                       </div>
                                    </div>
                                    <div class="avatar-edit">
                                       <input type="file" class="profilePicUpload" name="image" id="profilePicUpload0" accept=".png, .jpg, .jpeg" value="{{old('image')}}">
                                       <label for="profilePicUpload0" class="bg--primary">Blog image</label>
                                       <small class="mt-2 text-facebook">Supported files: <b>jpeg, jpg, png</b>.
                                       | Will be resized to:
                                       <b>700x450</b>
                                       px.
                                       </small>
                                    </div>
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                 @enderror
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class=" col-md-8 ">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Title</label>
                                 <input type="text" class="form-control" placeholder="Title" name="title" value="{{old('title')}} {{$blogs->title}}" required/>
                                 @error('title')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Publish Date</label>
                                 <input name="date" type="text" data-range="false" data-multiple-dates-separator=" - " data-language="en"
                                 class="datepicker-here form-control bg-white text--black" data-position='bottom left'
                                 placeholder="{{ date('d/m/Y', strtotime($blogs->publish_date)) }}" autocomplete="off" readonly
                                 value="{{old('date')}} {{ date('d/m/Y', strtotime($blogs->publish_date)) }}">
                                 @error('date')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Description</label>
                                 <textarea rows="10" class="form-control nicEdit" placeholder="Description" name="description" >{{old('description')}} {{$blogs->description}}</textarea>
                                 @error('description')
                                 <div class="text-danger">{{ $message }}</div>
                              @enderror
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn--primary btn-block btn-lg">Create</button>
                     </div>
                  </form>
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