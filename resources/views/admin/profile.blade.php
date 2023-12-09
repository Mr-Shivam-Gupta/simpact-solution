@extends('admin.common.master')
@section('content')
<div class="body-wrapper">
    <div class="bodywrapper__inner">
       <div class="row align-items-center mb-30 justify-content-between">
          <div class="col-lg-6 col-sm-6">
             <h6 class="page-title">Profile</h6>
          </div>
          <div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3 right-part">
             <a href="{{url('/password')}}" class="btn btn-sm btn--primary box--shadow1 text--small" ><i class="fa fa-key"></i>Password Setting</a>
          </div>
       </div>
       <div class="row mb-none-30">
          <div class="col-lg-3 col-md-3 mb-30">
             <div class="card b-radius--5 overflow-hidden">
                <div class="card-body p-0">
                   <div class="d-flex p-3 bg--primary align-items-center">
                      <div class="avatar avatar--lg">
                         <img src="  @if($user->image == Null)
                         @if($user->gender == 'female') {{ asset('assets/admin/images/female_user.png')}}
                         @elseif($user->gender == 'male') {{ asset('assets/admin/images/male_user.png')}}
                         @elseif($user->gender == 'other') {{ asset('assets/admin/images/female_user.png')}}
                         @else {{ asset('assets/admin/images/male_user.png')}}
                         @endif
                     @else {{ asset('profile_image/'.$user->image)}} @endif" alt="Image">
                      </div>
                      <div class="pl-3">
                         <h4 class="text--white text-capitalize">{{$user->name}}</h4>
                      </div>
                   </div>
                   <ul class="list-group">
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                         Name                            <span class="font-weight-bold text-capitalize">{{$user->name}} </span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                         Email                            <span  class="font-weight-bold"><a href="javascript:void(0);" class="__cf_email__">{{$user->email}}</a></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           Phone                            <span class="font-weight-bold text-capitalize">@if($user->phone == '') -- @else {{$user->phone}} @endif</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           Gender                            <span class="font-weight-bold text-capitalize">@if($user->gender == 'male')Male @elseif($user->gender == 'female') Female @else -- @endif</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           Type                            <span class="font-weight-bold text-capitalize">@if($user->is_admin == '0')User @elseif($user->is_admin == '1') Admin  @endif</span>
                        </li>
                   </ul>
                </div>
             </div>
          </div>
          <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>   
          <div class="col-lg-9 col-md-9 mb-30">
             <div class="card">
                <div class="card-body">
                   <h5 class="card-title mb-20 border-bottom pb-2">Profile Information</h5>
                   @if(session('success'))
                   <div class="alert alert-success mb-20 p-2">
                      {{ session('success') }}
                   </div>
                @endif
                @if(session('danger'))
                   <div class="alert alert-danger mb-20 p-2">
                      {{ session('danger') }}
                   </div>
                @endif
                   <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     @method('patch')
                      <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                               <div class="image-upload">
                                  <div class="thumb">
                                     <div class="avatar-preview">
                                       <div class="profilePicPreview" style="background-image: url(
                                          @if($user->image == Null)
                        @if($user->gender == 'female') {{ asset('assets/admin/images/female_user.png')}}
                        @elseif($user->gender == 'male') {{ asset('assets/admin/images/male_user.png')}}
                        @elseif($user->gender == 'other') {{ asset('assets/admin/images/female_user.png')}}
                        @else {{ asset('assets/admin/images/male_user.png')}}
                        @endif
                    @else {{ asset('profile_image/'.$user->image)}} @endif
                                      )">                                      
                                           <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                        </div>
                                     </div>
                                     <div class="avatar-edit">
                                        <input type="file" class="profilePicUpload" name="image" id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                        <label for="profilePicUpload1" class="bg--success">Upload Image</label>
                                        <small class="mt-2 text-facebook">Supported files: <b>jpeg, jpg.</b> Image will be resized into 400x400px </small>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group ">
                               <label class="form-control-label font-weight-bold">Name</label>
                               <input class="form-control" type="text" name="name" value="{{old('name',$user->name)}}" >
                            </div>
                            <div class="form-group">
                               <label class="form-control-label  font-weight-bold">Email</label>
                               <input class="form-control" type="email" name="email" value="{{old('email',$user->email)}}" >
                            </div>
                            <div class="form-group">
                               <label class="form-control-label  font-weight-bold">Phone</label>
                               <input class="form-control" type="text" name="phone" value="{{old('phone',$user->phone)}}" >
                            </div>
                            <div class="form-group">
                              <label class="form-control-label font-weight-bold">Gender</label>
                              <select class="form-control" name="gender">
                                @if($user->gender == Null) <option selected disabled>Select Gender</option> @endif
                                  <option value="male" @if($user->gender == 'male') selected @endif {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                  <option value="female" @if($user->gender == 'female') selected @endif {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                  <option value="other" @if($user->gender == 'other') selected @endif {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>Other</option>
                              </select>
                          </div>
                          
                         </div>
                      </div>
                      <div class="form-group">
                         <button type="submit" class="btn btn--primary btn-block btn-lg">Save Changes</button>
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