@extends('admin.common.master')
@section('content')
<div class="body-wrapper">
    <div class="bodywrapper__inner">
       <div class="row align-items-center mb-30 justify-content-between">
          <div class="col-lg-6 col-sm-6">
             <h6 class="page-title">Password Setting</h6>
          </div>
          <div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3 right-part">
             <a href="{{url('/profile')}}" class="btn btn-sm btn--primary box--shadow1 text--small" ><i class="fa fa-user"></i>Profile Setting</a>
          </div>
       </div>
       <div class="row mb-none-30">
          <div class="col-lg-3 col-md-3 mb-30">
             <div class="card b-radius--5 overflow-hidden">
               <div class="card-body p-0">
                  <div class="d-flex p-3 bg--primary align-items-center">
                     <div class="avatar avatar--lg">
                        <img src=" @if($user->image == Null)
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
          <div class="col-lg-9 col-md-9 mb-30">
             <div class="card">
                <div class="card-body">
                   <h5 class="card-title mb-20 border-bottom pb-2 text-danger">Delete Account</h5>
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
                   <p class="mb-20 text-danger">Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>
                   <form action="{{ route('profile.destroy') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     @method('delete')
                      <div class="form-group row">
                         <label class="col-lg-3 col-form-label form-control-label">Password</label>
                         <div class="col-lg-9">
                            <input class="form-control" type="password" placeholder="Password" name="password">
                         </div>
                         @if($errors->userDeletion->has('password'))
                         <div class="col-lg-9 offset-lg-3 text-danger">{{ $errors->userDeletion->first('password') }}</div>
                     @endif
                      </div>
                      <div class="form-group row">
                         <label class="col-lg-3 col-form-label form-control-label"></label>
                         <div class="col-lg-9">
                            <button type="submit" class="btn btn--primary btn-block btn-lg">delete account</button>
                         </div>
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