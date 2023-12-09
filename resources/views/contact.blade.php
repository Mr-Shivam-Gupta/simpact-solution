@extends('layouts.master')
@section('content')
<section class="hero-section bg--title shapes-container">
   <div class="container">
      <h1 class="hero-title">Contact</h1>
   </div>
</section>
<section class="contact-section pt-120 pb-120 pb-lg-0">
   <div class="container">
      <div class="contact-area">
         <div class="contact-content">
            <div class="section__header">
               <h3 class="section__title">Contact Us</h3>
               <p>We're available to assist you at all times! Please complete the information and don't hesitate to ask if you have any questions.</p>
            </div>
            <div class="contact-content-botom">
               <h5 class="subtitle">More Information</h5>
               <ul class="contact-info">
                  <li>
                     <div class="icon">
                        <i class="las la-map-marker-alt"></i>
                     </div>
                     <div class="cont">
                        <h6 class="name">Address</h6>
                        <a href="https://maps.app.goo.gl/NXdmsdi8hoSbSPur9" target="_blank">First Floor, Shop No.121, Simpact Solutions, Golden Trade Center, New Rajendra Nagar, Raipur Chhattisgarh</a>
                     </div>
                  </li>
                  <li>
                     <div class="icon">
                        <i class="las la-envelope"></i>
                     </div>
                     <div class="cont">
                        <h6 class="name">Email</h6>
                        <a class="text--base" href="mailto:simpactservices@gmail.com?">simpactservices@gmail.com</a>
                     </div>
                  </li>
                  <li>
                     <div class="icon">
                        <i class="las la-phone-volume"></i>
                     </div>
                     <div class="cont">
                        <h6 class="name">Phone</h6>
                        <span class="name">Call Us: </span><a href="tel:(+91) 8839775589" class="text--base">(+91) 8839775589</a>
                        </span>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
         <div class="contact-wrapper bg--section">
            <div class="section__header">
               <h3 class="section__title">Drop Us a Line</h3>
               @if(session('success'))
               <div class="alert alert-success">
                  {{ session('success') }}
               </div>
               @endif
               @if(session('danger'))
               <div class="alert alert-danger">
                  {{ session('danger') }}
               </div>
               @endif
            </div>
            <form class="contact-form" method="post" action="{{url('contact-form')}}">
               @csrf
               <div class="row">
                  <div class="col-sm-12">
                     <div class="form-group">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="name" class="form--label text--title">Full Name <span class="text-danger">(*)</span></label>
                        <input type="text" name="name" value="" class="form-control form--control" placeholder="Your Full Name" id="name" required>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   
 <label for="phone" class="form--label text--title">Phone <span class="text-danger">(*)</span></label>
    <div class="input-group">        <input type="tel" name="phone"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter Your Mobile number" value="" minlength="10" id="phone" required class="form-control form--control">
    </div>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="email" class="form--label text--title">Email <span class="text-danger">(*)</span></label>
                        <input type="email" name="email"  value="" id="email" placeholder="Enter E-Mail Address" required class="form-control form--control">
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        @error('subject')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="subject" class="form--label text--title">Subject <span class="text-danger">(*)</span></label>
                        <input type="text" name="subject" placeholder="Write subject" value=" " id="subject" required class="form-control form--control">
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        @error('message')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="message" class="form--label text--title">Message <span class="text-danger">(*)</span></label>
                        <textarea name="message" id="message" rows="2" class="form-control form--control" placeholder="Write your message"></textarea>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <button type="submit" class="cmn--btn w-100">Send Message</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>

@endsection