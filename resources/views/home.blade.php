@extends('layouts.master')

@section('content')


<section class="banner-section bg--title shapes-container">
   <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item  active">
            <div class="banner-shape shape1">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/1.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape2">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/2.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape3">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/3.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape4">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/4.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape5">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/5.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape6">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/6.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape7">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/7.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape8 ">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/8.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape9">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/9.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape10">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/10.png')}}" alt="banner-shapes">
            </div>
            <div class="container">
               <div class="banner__wrapper">
                  <div class="banner__wrapper-content">
                     <h2 class="banner__wrapper-content-title">Multilevel Marketing Platform</h2>
                     <p class="banner__wrapper-content-txt">
                        Win more commissions by making more members and increase your capital. And you can earn more money by viewing advertisements on our site.
                     </p>
                     <div class="btn__grp white-btns">
                        <a href="{{url('login')}}" class="cmn--btn">Login</a>
                        <a href="{{url('register')}}" class="cmn--btn cmn--btn1">Registration</a>
                     </div>
                  </div>
                  <div class="banner__wrapper-thumb">
                     <img loading="lazy" src="{{asset('assets/images/frontend/banner/binaryMLM.png')}}" alt="banner">
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-item ">
            <div class="banner-shape shape1">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/1.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape2">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/2.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape3">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/3.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape4">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/4.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape5">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/5.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape6">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/6.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape7">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/7.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape8">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/8.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape9">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/9.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape10">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/10.png')}}" alt="banner-shapes">
            </div>
            <div class="container">
               <div class="banner__wrapper">
                  <div class="banner__wrapper-content">
                     <h1 class="banner__wrapper-content-title">Web Development</h1>
                     <p class="banner__wrapper-content-txt">
                        We've got the expertise to create a website that will perform well on search engines and capture your target audience. Contact us today!
                     </p>
                     <div class="btn__grp white-btns">
                        <a href="{{url('login')}}" class="cmn--btn">Login</a>
                        <a href="{{url('register')}}" class="cmn--btn cmn--btn1">Registration</a>
                     </div>
                  </div>
                  <div class="banner__wrapper-thumb">
                     <img loading="lazy" src="{{asset('assets/images/frontend/banner/wbdd.jpg')}}" alt="banner">
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-item ">
            <div class="banner-shape shape1">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/1.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape2">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/2.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape3">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/3.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape4">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/4.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape5">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/5.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape6">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/6.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape7">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/7.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape8">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/8.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape9">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/9.png')}}" alt="banner-shapes">
            </div>
            <div class="banner-shape shape10">
               <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/10.png')}}" alt="banner-shapes">
            </div>
            <div class="container">
               <div class="banner__wrapper">
                  <div class="banner__wrapper-content">
                     <h2 class="banner__wrapper-content-title">Mobile Application Development</h2>
                     <p class="banner__wrapper-content-txt"> 
                        Mobile Websites are Compatible Across Devices. A single mobile website can reach users across many different types of mobile devices, whereas native apps require a separate version to be developed for each type of device.
                     </p>
                     <div class="btn__grp white-btns">
                        <a href="{{url('login')}}" class="cmn--btn">Login</a>
                        <a href="{{url('register')}}" class="cmn--btn cmn--btn1">Registration</a>
                     </div>
                  </div>
                  <div class="banner__wrapper-thumb">
                     <img loading="lazy" src="{{asset('assets/images/frontend/banner/mb_n.png')}}" alt="banner">
                  </div>
               </div>
            </div>
         </div>
      </div>
 
   </div>
</section>
<section class="about-section pt-120 pb-60">
   <div class="container">
      <div class="row justify-content-between flex-wrap-reverse gy-4">
         <div class="col-lg-6">
            <div class="about__thumb">
               <div class="thumb">
                  <img loading="lazy" src="{{asset('assets/images/frontend/about/6215d5c3b5a6d1645598147.jpg')}}" alt="about">
                  <a href="#" class="video-button" data-lightbox><i class="las la-play"></i></a>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="ps-xl-4 ps-xxl-5">
               <div class="about-content">
                  <div class="section__header">
                     <span class="section__cate">About Us</span>
                     <h3 class="section__title">15 Years of Trust</h3>
                     <p>
                     <div style="text-align:justify;">
                        <div>We are more than just an online representation of a business market; we are a reflection of the entire MLM industry. Our international financial company is actively involved in investment activities connected to MLM within the financial markets, led by qualified professional traders.</div>
                     </div>
                     <blockquote style="margin:0 0 0 40px;border:none;padding:0px;"></blockquote>
                     <blockquote style="margin:0 0 0 40px;border:none;padding:0px;"></blockquote>
                     <blockquote style="margin:0 0 0 40px;border:none;padding:0px;"></blockquote>
                     <blockquote style="margin:0 0 0 40px;border:none;padding:0px;"></blockquote>
                     </p>
                  </div>
                  <div class="row g-4">
                     <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="about__item">
                           <div class="icon">
                              <i class="las la-gem"></i>                                        
                           </div>
                           <div class="info">
                              <h6 class="subtitle">Premier Platform with Over 1000+ Satisfied Clients</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="about__item">
                           <div class="icon">
                              <i class="las la-chart-line"></i>                                        
                           </div>
                           <div class="info">
                              <h6 class="subtitle">Expanding Your Business Worldwide</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="about__item">
                           <div class="icon">
                              <i class="las la-award"></i>                                        
                           </div>
                           <div class="info">
                              <h6 class="subtitle">We Offer a Full 100% Money-Back Guarantee Within 30 Days</h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="about__item">
                           <div class="icon">
                              <i class="las la-headphones-alt"></i>                                        
                           </div>
                           <div class="info">
                              <h6 class="subtitle">Our Customer Support is Available 24/7</h6>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="btn__grp">
                     <a href="{{url('about')}}" class="cmn--btn">More About</a>
                     <a href="{{url('about')}}" class="cmn--btn">Explore More</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section  class="feature-section pt-60 pb-120">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6 col-md-10">
            <div class="section__header text-center">
               <span class="section__cate">Our Services</span>
               <h3 class="section__title">Why Choose Us</h3>
               <p>
                  We fulfill your requirements with exceptional dedication and expertise, ensuring your complete satisfaction. Our relentless commitment to quality and innovation sets us apart from the rest.
               </p>
            </div>
         </div>
      </div>
      <div class="row g-3 g-sm-4">
         <div class="col-lg-4 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                  <i class="fas  fa-laptop"></i>                        
               </div>
               <div class="feature__item-cont">
                  <h6 class="feature__item-cont-title">Web Development</h6>
                
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                  <i class="fas fa-mobile-alt"></i>                        
               </div>
               <div class="feature__item-cont">
                  <h6 class="feature__item-cont-title">Mobile App Development</h6>
             
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                  <i class="far fa-hdd"></i>                        
               </div>
               <div class="feature__item-cont">
                  <h6 class="feature__item-cont-title">Software Development</h6>
                
               </div>
            </div>
         </div>

         <div class="col-lg-4 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                  <i class="fas fa-eye"></i>                        
               </div>
               <div class="feature__item-cont">
                  <h6 class="feature__item-cont-title">UI/UX Design</h6>
               </div>
            </div>
         </div>

 
         <div class="col-lg-4 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                  <i class="far fa-life-ring"></i>                        
               </div>
               <div class="feature__item-cont">
                  <a href="{{url('contact')}}">
                     <h6 class="feature__item-cont-title">Maintenance and Support</h6>
                  </a>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                  <i class="fas fa-lock"></i>                        
               </div>
               <div class="feature__item-cont">
                  <h6 class="feature__item-cont-title">Secure Software </h6>

               </div>
            </div>
         </div>
         <div class="btn__grp white-btns mt-2 d-flex justify-content-center ">
                        <a href="{{url('services')}}" class="cmn--btn">More Services</a>
                     </div>   
      </div>
   </div>
</section>
<section class="how-to-section bg--title shapes-container">
   <div class="banner-shape shape1">
      <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/1.png')}}" alt="banner/shapes">
   </div>
   <div class="banner-shape shape2">
      <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/2.png')}}" alt="banner/shapes">
   </div>
   <div class="banner-shape shape3">
      <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/3.png')}}" alt="banner/shapes">
   </div>
   <div class="banner-shape shape4">
      <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/4.png')}}" alt="banner/shapes">
   </div>
   <div class="banner-shape shape6">
      <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/6.png')}}" alt="banner/shapes">
   </div>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6 col-md-10">
            <div class="section__header text-center text-white">
               <span class="section__cate text-white">Our Technologies</span>
               <h3 class="section__title text-white">Technologies</h3>
               <p>
                  We use these technologies for your better experience.
               </p>
            </div>
         </div>
      </div>
      <img src="{{asset('assets/images/frontend/tech.png')}}" style="background: white;width: 100%;border-radius: 20px;" alt="">
      <img src="{{asset('assets/images/frontend/tech-1.png')}}" class="mt-1" style="background: white;width: 100%;border-radius: 20px;" alt="">
      <img src="{{asset('assets/images/frontend/tech-2.png')}}" class="mt-1" style="background: white;width: 100%;border-radius: 20px;" alt="">
      {{-- 
      <div class="how--wrapper">
         <div class="how__item">
            <div class="how__item-icon text--base">
               <i class="las la-user-plus"></i>                    
            </div>
            <div class="how__item-content">
               <h6 class="how__item-title">Create An Account</h6>
            </div>
         </div>
         <div class="how__item">
            <div class="how__item-icon text--base">
               <i class="las la-hand-pointer"></i>                    
            </div>
            <div class="how__item-content">
               <h6 class="how__item-title">Choose Plan</h6>
            </div>
         </div>
         <div class="how__item">
            <div class="how__item-icon text--base">
               <i class="las la-users"></i>                    
            </div>
            <div class="how__item-content">
               <h6 class="how__item-title">Invite More People</h6>
            </div>
         </div>
         <div class="how__item">
            <div class="how__item-icon text--base">
               <i class="las la-wallet"></i>                    
            </div>
            <div class="how__item-content">
               <h6 class="how__item-title">Get Commission</h6>
            </div>
         </div>
      </div>
      --}}
   </div>
</section>
<section class="pricing-section pt-120 pb-60">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6 col-md-10">
            <div class="section__header text-center">
               <span class="section__cate">Pricing Plan</span>
               <h3 class="section__title">Our Pricing Structure</h3>
               <p>
                  We offer competitive pricing plans designed to meet your needs. Our commitment is to provide value and quality.
               </p>
            </div>
         </div>
      </div>
      <div class="price-wrapper">
         <div class="pricing-item">
            <div class="pricing-deco">
               <div class="wave">&nbsp;</div>
               <div class="pricing-price"><span class="pricing-currency">RS</span>?
               </div>
               <h3 class="pricing-title">Basic</h3>
            </div>
            <ul class="pricing-feature-list">
               <li class="pricing-feature">
               Style or Theme :<span class="amount text-success">Yes
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-check text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Responsive design : <span class="amount text-success">Yes
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-check text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Number of pages : <span class="amount text-success">5
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-check text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Secure Sockets Layer (SSL) : <span class="amount text-success">Yes
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-check text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Website security : <span class="amount text-success">Yes
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-check text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Database integration : <span class="amount">No
                  <span data-bs-target="#exampleModal3" data-bs-toggle="modal"><i class="fas fa-times"></i></span>
               </li>
               <!-- <li class="pricing-feature">
               Functionalities : <span class="amount">$ 0.03
                  <span data-bs-target="#exampleModal3" data-bs-toggle="modal"><i class="fas la-question"></i></span>
               </li> -->
               <li class="pricing-feature">
               Dynamic Website : <span class="amount">No
                  <span data-bs-target="#exampleModal3" data-bs-toggle="modal"><i class="fas fa-times"></i></span>
               </li>
               <li class="pricing-feature">
               Admin Panel : <span class="amount">No
                  <span data-bs-target="#exampleModal3" data-bs-toggle="modal"><i class="fas fa-times"></i></span>
               </li>
               <li class="pricing-feature">
               Free Maintenance : <span class="amount text-success">1 Mounths
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-check text-success text-boldest"></i></span>
               </li>
            </ul>
            <div class="text-center pb-4 mb-2">
               <a class="cmn--btn" href="{{url('login')}}">Subscribe now</a>
            </div>
         </div>
         <div class="pricing-item">
            <div class="pricing-deco">
               <div class="wave">&nbsp;</div>
               <div class="pricing-price"><span class="pricing-currency"></span>?
               </div>
               <h3 class="pricing-title">Custom</h3>
            </div>
            <ul class="pricing-feature-list">
               <li class="pricing-feature">
               Style or Theme :<span class="amount text-success">
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas la-question text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Responsive design : <span class="amount text-success">
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas la-question text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Number of pages : <span class="amount text-success">
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas la-question text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Secure Sockets Layer (SSL) : <span class="amount text-success">
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas la-question text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Website security : <span class="amount text-success">
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas la-question text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Database integration : <span class="amount">
                  <span data-bs-target="#exampleModal3" data-bs-toggle="modal"><i class="fas la-question text-success text-boldest"></i></span>
               </li>
               <!-- <li class="pricing-feature">
               Functionalities : <span class="amount">$ 0.03
                  <span data-bs-target="#exampleModal3" data-bs-toggle="modal"><i class="fas la-question"></i></span>
               </li> -->
               <li class="pricing-feature">
               Dynamic Website : <span class="amount">
                  <span data-bs-target="#exampleModal3" data-bs-toggle="modal"><i class="fas la-question text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Admin Panel : <span class="amount">
                  <span data-bs-target="#exampleModal3" data-bs-toggle="modal"><i class="fas la-question text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Free Maintenance : <span class="amount text-success">
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas la-question text-success text-boldest"></i></span>
               </li>
            </ul>
            <div class="text-center pb-4 mb-2">
               <a class="cmn--btn" href="{{url('login')}}">Subscribe now</a>
            </div>
         </div>
         <div class="pricing-item">
            <div class="pricing-deco">
               <div class="wave">&nbsp;</div>
               <div class="pricing-price"><span class="pricing-currency">RS</span>?
               </div>
               <h3 class="pricing-title">Premium</h3>
            </div>
            <ul class="pricing-feature-list">
               <li class="pricing-feature">
               Style or Theme :<span class="amount text-success">Yes
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-check text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Responsive design : <span class="amount text-success">Yes
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-check text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Number of pages : <span class="amount text-success">10-20
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-check text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Secure Sockets Layer (SSL) : <span class="amount text-success">Yes
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-check text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Website security : <span class="amount text-success">Yes
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-check text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Database integration : <span class="amount text-success">Yes
                  <span data-bs-target="#exampleModal3" data-bs-toggle="modal"><i class="fas fa-check text-success text-boldest"></i></span>
               </li>
               <!-- <li class="pricing-feature">
               Functionalities : <span class="amount">$ 0.03
                  <span data-bs-target="#exampleModal3" data-bs-toggle="modal"><i class="fas la-question"></i></span>
               </li> -->
               <li class="pricing-feature">
               Dynamic Website : <span class="amount text-success">Yes
                  <span data-bs-target="#exampleModal3" data-bs-toggle="modal"><i class="fas fa-check text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature"> 
               Admin Panel : <span class="amount text-success">Yes
                  <span data-bs-target="#exampleModal3" data-bs-toggle="modal"><i class="fas fa-check text-success text-boldest"></i></span>
               </li>
               <li class="pricing-feature">
               Free Maintenance : <span class="amount text-success">1 Mounths
                  <span data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-check text-success text-boldest"></i></span>
               </li>
            </ul>
            <div class="text-center pb-4 mb-2">
               <a class="cmn--btn" href="{{url('login')}}">Subscribe now</a>
            </div>
         </div>
      </div>
   </div>
</section>
{{-- <section class="team-section pt-60 pb-120">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6 col-md-10">
            <div class="section__header text-center">
               <span class="section__cate">Survey</span>
               <h3 class="section__title">Our Leading Survey Participants</h3>
               <p>
                  Meet some of our most accomplished survey earners, who have demonstrated remarkable dedication and success.
               </p>
            </div>
         </div>
      </div>
      <div class="row g-4">
         <div class="col-xl-4 col-md-6">
            <div class="team__item">
               <div class="team__thumb">
                  <img loading="lazy" src="{{asset('assets/images/user/profile/1646148109_testuser.jpg')}}" alt="profile">
               </div>
               <div class="team__content">
                  <h6 class="team__title">Jane Smith</h6>
                  <span class="info">$19</span>
                  <ul class="social__icons"></ul>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-md-6">
            <div class="team__item">
               <div class="team__thumb">
                  <img loading="lazy" src="{{asset('assets/images/avatar.png')}}" alt="profile">
               </div>
               <div class="team__content">
                  <h6 class="team__title">fgd dfdsfd</h6>
                  <span class="info">$19</span>
                  <ul class="social__icons"></ul>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-md-6">
            <div class="team__item">
               <div class="team__thumb">
                  <img loading="lazy" src="{{asset('assets/images/avatar.png')}}" alt="profile">
               </div>
               <div class="team__content">
                  <h6 class="team__title">demo holo</h6>
                  <span class="info">$19</span>
                  <ul class="social__icons"></ul>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-md-6">
            <div class="team__item">
               <div class="team__thumb">
                  <img loading="lazy" src="{{asset('assets/images/avatar.png')}}" alt="profile">
               </div>
               <div class="team__content">
                  <h6 class="team__title">berke uysal</h6>
                  <span class="info">$19</span>
                  <ul class="social__icons"></ul>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-md-6">
            <div class="team__item">
               <div class="team__thumb">
                  <img loading="lazy" src="{{asset('assets/images/avatar.png')}}" alt="profile">
               </div>
               <div class="team__content">
                  <h6 class="team__title">alaa gamal</h6>
                  <span class="info">$19</span>
                  <ul class="social__icons"></ul>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-md-6">
            <div class="team__item">
               <div class="team__thumb">
                  <img loading="lazy" src="{{asset('assets/images/avatar.png')}}" alt="profile">
               </div>
               <div class="team__content">
                  <h6 class="team__title">Zar Gul</h6>
                  <span class="info">$19</span>
                  <ul class="social__icons"></ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> --}}
<section class="counter-section bg--title shapes-container">
   <div class="banner-shape shape1">
      <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/1.png')}}" alt="banner-shapes">
   </div>
   <div class="banner-shape shape2">
      <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/2.png')}}" alt="banner-shapes">
   </div>
   <div class="banner-shape shape3">
      <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/3.png')}}" alt="banner-shapes">
   </div>
   <div class="banner-shape shape4">
      <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/4.png')}}" alt="banner-shapes">
   </div>
   <div class="banner-shape shape6">
      <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/6.png')}}" alt="banner-shapes">
   </div>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6 col-md-10">
            <div class="section__header text-center text-white">
               <span class="section__cate text-white">Counter</span>
               <h3 class="section__title text-white">Our Approach</h3>
               <p>
                  Discover our strategic direction and the innovative solutions we offer to meet your needs.
               </p>
            </div>
         </div>
      </div>
      <div class="row justify-content-center g-4">
         <div class="col-lg-3 col-sm-6">
            <div class="counter-item">
               <div class="counter-header">
                  <h3 class="title rafcounter" data-counter-end="2018">00</h3>
                  <!-- <h3 class="title">+</h3> -->
               </div>
               <div class="counter-content">
               Established
               </div>
               <div class="icon">
               <i class="fas fa-building"></i>                       
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-6">
            <div class="counter-item">
               <div class="counter-header">
                  <h3 class="title rafcounter" data-counter-end="50">00</h3>
                  <h3 class="title">+</h3>
               </div>
               <div class="counter-content">
               Websites Created
               </div>
               <div class="icon">
               <i class="las la-globe"></i>                    
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-6">
            <div class="counter-item">
               <div class="counter-header">
                  <h3 class="title rafcounter" data-counter-end="400">00</h3>
                  <h3 class="title">+</h3>
               </div>
               <div class="counter-content">
               Happy Clients
               </div>
               <div class="icon">
               <i class="las la-user-friends"></i>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-6">
            <div class="counter-item">
               <div class="counter-header">
                  <h3 class="title rafcounter" data-counter-end="20">00</h3>
                  <h3 class="title">+</h3>
               </div>
               <div class="counter-content">
               Team Size
               </div>
               <div class="icon">
               <i class="las la-user-astronaut"></i>                      
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
{{-- <section class="transaction-section pt-120 pb-60">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6 col-md-10">
            <div class="section__header text-center">
               <span class="section__cate">Transaction</span>
               <h3 class="section__title">Our Most Recent Transaction</h3>
               <p>
                  Explore the details of our latest transaction and learn more about our commitment to excellence.
               </p>
            </div>
         </div>
      </div>
      <ul class="nav nav-tabs nav--tabs">
         <li>
            <a class="active" href="#deposit" data-bs-toggle="tab">Deposit</a>
         </li>
         <li>
            <a href="#withdraw" data-bs-toggle="tab">Withdraw</a>
         </li>
      </ul>
      <div class="tab-content">
         <div class="tab-pane fade show active" id="deposit">
            <table class="table cmn--table">
               <thead>
                  <tr>
                     <th>Name</th>
                     <th>Plan</th>
                     <th>Date</th>
                     <th>Amount</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td data-label="Name">
                        <div class="author">
                           <div class="thumb">
                              <img loading="lazy" src="{{asset('assets/images/avatar.png')}}" alt="image">
                           </div>
                           <div class="content">Vishal Sharma</div>
                        </div>
                     </td>
                     <td data-label="Plan">Plutinum</td>
                     <td data-label="Date">23 January, 2023</td>
                     <td data-label="Amount">10000 USD</td>
                  </tr>
                  <tr>
                     <td data-label="Name">
                        <div class="author">
                           <div class="thumb">
                              <img loading="lazy" src="{{asset('assets/images/avatar.png')}}" alt="image">
                           </div>
                           <div class="content">Vishal Sharma</div>
                        </div>
                     </td>
                     <td data-label="Plan">Plutinum</td>
                     <td data-label="Date">23 January, 2023</td>
                     <td data-label="Amount">100 USD</td>
                  </tr>
                  <tr>
                     <td data-label="Name">
                        <div class="author">
                           <div class="thumb">
                              <img loading="lazy" src="{{asset('assets/images/avatar.png')}}" alt="image">
                           </div>
                           <div class="content">Test TT</div>
                        </div>
                     </td>
                     <td data-label="Plan">No plan</td>
                     <td data-label="Date">10 October, 2022</td>
                     <td data-label="Amount">5 USD</td>
                  </tr>
                  <tr>
                     <td data-label="Name">
                        <div class="author">
                           <div class="thumb">
                              <img loading="lazy" src="{{asset('assets/images/user/profile/1669637107_username.jpg')}}" alt="image">
                           </div>
                           <div class="content">Test User</div>
                        </div>
                     </td>
                     <td data-label="Plan">Basic</td>
                     <td data-label="Date">27 June, 2022</td>
                     <td data-label="Amount">10000 USD</td>
                  </tr>
                  <tr>
                     <td data-label="Name">
                        <div class="author">
                           <div class="thumb">
                              <img loading="lazy" src="{{asset('assets/images/user/profile/1646148109_testuser.jpg')}}" alt="image">
                           </div>
                           <div class="content">Jane Smith</div>
                        </div>
                     </td>
                     <td data-label="Plan">Standard</td>
                     <td data-label="Date">01 March, 2022</td>
                     <td data-label="Amount">500 USD</td>
                  </tr>
                  <tr>
                     <td data-label="Name">
                        <div class="author">
                           <div class="thumb">
                              <img loading="lazy" src="{{asset('assets/images/user/profile/1646145673_testuser2.jpg')}}" alt="image">
                           </div>
                           <div class="content">Austin Ballard</div>
                        </div>
                     </td>
                     <td data-label="Plan">Standard</td>
                     <td data-label="Date">01 March, 2022</td>
                     <td data-label="Amount">2000 USD</td>
                  </tr>
                  <tr>
                     <td data-label="Name">
                        <div class="author">
                           <div class="thumb">
                              <img loading="lazy" src="{{asset('assets/images/user/profile/1646148109_testuser.jpg')}}" alt="image">
                           </div>
                           <div class="content">Jane Smith</div>
                        </div>
                     </td>
                     <td data-label="Plan">Standard</td>
                     <td data-label="Date">01 March, 2022</td>
                     <td data-label="Amount">5000 USD</td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="tab-pane fade" id="withdraw">
            <table class="table cmn--table">
               <thead>
                  <tr>
                     <th>Name</th>
                     <th>Plan</th>
                     <th>Date</th>
                     <th>Amount</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td data-label="Name">
                        <div class="author">
                           <div class="thumb">
                              <img loading="lazy" src="{{asset('assets/images/avatar.png')}}" alt="image">
                           </div>
                           <div class="content">
                              ROBIUL ISLAM
                           </div>
                        </div>
                     </td>
                     <td data-label="Plan">Standard</td>
                     <td data-label="Date">07 March, 2022</td>
                     <td data-label="Amount">18 USD</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</section> --}}
<section class="blog-section pt-60 pb-120">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6 col-md-10">
            <div class="section__header text-center">
               <span class="section__cate">Blog Posts</span>
               <h3 class="section__title"> Latest News and Valuable Tips</h3>
               <p>
                  Explore informative content and practical tips to enhance your experience.
               </p>
            </div>
         </div>
      </div>
      <div class="row g-4 justify-content-center">
         @foreach($last_blogs as $last_blog)
         <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="post__item">
               <div class="post__thumb">
                  <a href="{{ url('/blog/' . $last_blog->id . '/view') }}">
                  <img loading="lazy" src="{{asset('blog_images')}}/{{$last_blog->image}}" alt="blog" style="width: 100%;
                     height: 300px;">
                  </a>
                  <div class="post__date">
                     <h4 class="date">{{ \Carbon\Carbon::parse($last_blog->publish_date)->format('d') }}</h4>
                     <span>{{ \Carbon\Carbon::parse($last_blog->publish_date)->format('M') }}</span>
                  </div>
               </div>
               <div class="post__content">
                  <div class="overflow-hidden">
                     <div class="post__meta">
                        <a class="item">
                        <i class="las la-user"></i>
                        <span>Admin</span>
                        </a>
                     </div>
                  </div>
                  <h5 class="post__title">
                     <a href="{{ url('/blog/' . $last_blog->id . '/view') }}">{{$last_blog->title}}</a>
                  </h5>
                  <a href="{{ url('/blog/' . $last_blog->id . '/view') }}" class="text--base">Read More <i class="las la-long-arrow-alt-right"></i></a>
               </div>
            </div>
         </div>
         @endforeach
         <div class="btn__grp white-btns mt-2 d-flex justify-content-center ">
                        <a href="{{url('blog')}}" class="cmn--btn">More Blogs</a>
                     </div>
      </div>
   </div>
</section>
<section class="clients-section bg--title shapes-container">
   <div class="banner-shape shape1">
      <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/1.png')}}" alt="banner-shapes">
   </div>
   <div class="banner-shape shape2">
      <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/2.png')}}" alt="banner-shapes">
   </div>
   <div class="banner-shape shape3">
      <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/3.png')}}" alt="banner-shapes">
   </div>
   <div class="banner-shape shape4">
      <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/4.png')}}" alt="banner-shapes">
   </div>
   <div class="banner-shape shape6">
      <img loading="lazy" src="{{asset('assets/templates/basic/images/banner/shapes/6.png')}}" alt="banner-shapes">
   </div>
   <div class="container">
      <div class="section__title d-flex flex-wrap justify-content-between align-items-center">
         <h3 class="title mb-3 me-2 text-white">Our Testimonial</h3>
      </div>
      <div class="row g-3">
         <div class="col-sm-6 col-lg-4">
            <div class="client__item">
               <div class="client__item-title">
                  <h6 class="name">MD Monish</h6>
                  <div class="ratings">
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                  </div>
               </div>
               <div class="client__item-body">
                  <p >
                    <strong > Simpact Solutions succeeded in building a more manageable solution that is much easier to maintain.</strong>
                  </p>
                  <span class="date text-white">26 Feb, 2022</span>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-lg-4">
            <div class="client__item">
               <div class="client__item-title">
                  <h6 class="name">Shivam Gupta</h6>
                  <div class="ratings">
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                  </div>
               </div>
               <div class="client__item-body">
                  <p>
                     <strong>I was impressed by Simpact Solutions prices, especially for the project I wanted to do and in comparison to the quotes I received from a lot of other companies.</strong>
                  </p>
                  <span class="date text-white">10 Feb, 2022</span>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-lg-4">
            <div class="client__item">
               <div class="client__item-title">
                  <h6 class="name">Devendra Varma</h6>
                  <div class="ratings">
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                  </div>
               </div>
               <div class="client__item-body">
                  <p>
                     <strong>They are very sharp and have a high-quality team. I expect quality from people, and they have the kind of team I can work with.</strong>
                  </p>
                  <span class="date text-white">26 Feb, 2022 </span>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-lg-4">
            <div class="client__item">
               <div class="client__item-title">
                  <h6 class="name">Bhavna Tiwari</h6>
                  <div class="ratings">
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                  </div>
               </div>
               <div class="client__item-body">
                  <p>
                    <strong>This website development company in Raipur exceeded my expectations with their exceptional design skills and user-friendly website solutions. Their expert team ensured a seamless and engaging online experience for my business.</strong>
                  </p>
                  <span class="date text-white">23 Feb, 2022 </span>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-lg-4">
            <div class="client__item">
               <div class="client__item-title">
                  <h6 class="name">Surendra Yadav</h6>
                  <div class="ratings">
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                  </div>
               </div>
               <div class="client__item-body">
                  <p>
                   <strong>Simpact Solutions exceeded my expectations with their top-notch MLM site. Exceptional design, seamless functionality, and stellar support. Truly deserving of the highest praise!</strong>
                  </p>
                  <span class="date text-white">23 Feb, 2022 </span>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-lg-4">
            <div class="client__item">
               <div class="client__item-title">
                  <h6 class="name">Manish Sharma</h6>
                  <div class="ratings">
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                     <span>
                     <i class="las la-star"></i>
                     </span>
                  </div>
               </div>
               <div class="client__item-body">
                  <p>
                    <strong>Simpact Solutions delivered an exceptional MLM site, surpassing all expectations. From design brilliance to flawless functionality, their work deserves the highest acclaim and more.</strong>
                  </p>
                  <span class="date text-white">23 Feb, 2022 </span>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
{{-- 
<section id="subscribe" class="subscribe-section pt-60 pb-60"  >
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6 col-md-10">
            <div class="section__header text-center">
               <span class="section__cate">Subscribe</span>
               <h3 class="section__title">Dont Forget To Subscribe</h3>
               <p>
                  Necessitatibus sapiente ex earum omnis, commodi doloribus!                    
               </p>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-lg-7 col-md-10">
            <div class="subscribe-content">
               <form class="subscribe-form" method="post" action="https://www.simpact.co.in//subscriber">
                  <input type="hidden" name="_token" value="TPXhAiNNHlX7p8Usss5nBHeLx1552mXDKNMZf91b">                        
                  <div class="input-group">
                     <input type="email" name="email" class=" form-control form--control rounded-pill"  placeholder="Enter Your email address" required>
                     <button class="cmn--btn ml-2 rounded-circle" type="submit">
                     <i class="fas fa-paper-plane"></i>
                     </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
--}}
<section class="payment-gateway-section pt-60 pb-120">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6 col-md-10">
            <div class="section__header text-center">
               <span class="section__cate">Our Clients</span>
               <h3 class="section__title">Our Valuable Customers</h3>
               <p>
               Thank you for being our valued customers your satisfaction is our priority.
               </p>
            </div>
         </div>
      </div>
      <div class="payment-slider owl-carousel owl-theme">
         <div class="payment__item">
           <a href="https://www.mclubholidays.net/" target="_blank" class="d-flex justify-content-center"><img loading="lazy" src="{{asset('client/logo.jpg')}}" alt="client"></a> 
         </div>
         <div class="payment__item">
           <a href="https://oshintek.com/" target="_blank" class="d-flex justify-content-center"><img loading="lazy" src="{{asset('client/logo-1.jpg')}}" alt="client"></a> 
         </div>
         <div class="payment__item">
            <a href="https://guflu.in/" target="_blank" class="d-flex justify-content-center"><img loading="lazy" src="{{asset('client/logo-12.png')}}" alt="client"></a> 
          </div>
         <div class="payment__item">
           <a href="https://www.a1revival.com/" target="_blank" class="d-flex justify-content-center"><img loading="lazy" src="{{asset('client/logo-3.png')}}" alt="client"></a> 
         </div>
         <div class="payment__item">
           <a href="https://pixelvalues.com/" target="_blank" class="d-flex justify-content-center"><img loading="lazy" src="{{asset('client/logo-4.png')}}" alt="client"></a> 
         </div>
         <div class="payment__item">
           <a href="https://x-mart.in/" target="_blank" class="d-flex justify-content-center"><img loading="lazy" src="{{asset('client/logo-6.png')}}" alt="client"></a> 
         </div>
         <div class="payment__item">
            <a href="https://www.omgnews.co.in/" target="_blank" class="d-flex justify-content-center"><img loading="lazy" src="{{asset('client/logo-10.jpg')}}" alt="client"></a> 
          </div>
          <div class="payment__item">
            <a href="https://hotelraja.co.in/" target="_blank" class="d-flex justify-content-center"><img loading="lazy" src="{{asset('client/logo-11.png')}}" alt="client"></a> 
          </div>
        
          <div class="payment__item">
            <a href="https://msdreamworld.com/" target="_blank" class="d-flex justify-content-center"><img loading="lazy" src="{{asset('client/logo-8.png')}}" alt="client"></a> 
          </div>
         <div class="payment__item">
           <a href="https://tnidanmicrofoundation.in/" target="_blank" class="d-flex justify-content-center"><img loading="lazy" src="{{asset('client/logo-5.png')}}" alt="client"></a> 
         </div>
         
         <div class="payment__item">
           <a href="https://kanhasafarionline.com/" target="_blank" class="d-flex justify-content-center"><img loading="lazy" class="w-50" src="{{asset('client/logo-7.png')}}" alt="client"></a> 
         </div>
         <div class="payment__item">
            <a href="https://smartwomaniya.com/" target="_blank" class="d-flex justify-content-center"><img loading="lazy" class="w-75" src="{{asset('client/logo-2.jpg')}}" alt="client"></a> 
          </div>
         
         <div class="payment__item">
           <a href="https://aicicapp.com/" class="d-flex justify-content-center"><img loading="lazy" class="w-50" src="{{asset('client/logo-9.jpg')}}" alt="client"></a> 
         </div>
        
        
     
      </div>
   </div>
</section>

@endsection