@extends('layouts.master')
@section('content')

<!-- Hero Section -->
<section class="hero-section bg--title shapes-container">
    <div class="container">
       <h1 class="hero-title">Services</h1>
    </div>
 </section>
 <!-- Hero Section -->

 <!-- Service Section -->
<section  class="feature-section pt-60 pb-120">
   <div class="container">

   <div class="row g-3 g-sm-4">
         <div class="col-lg-6 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                  <i class="fas  fa-laptop"></i>                        
               </div>
               <div class="feature__item-cont">
                  <h6 class="feature__item-cont-title">Website Design and Development</h6>
                  <ul>
                    <li>Creating visually appealing and functional websites.</li>
                    <li>Responsive web design to ensure compatibility across various devices.</li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                  <i class="fas  fa-file-archive"></i>                        
               </div>
               <div class="feature__item-cont">
                  <h6 class="feature__item-cont-title">Custom Web Application Development</h6>
                  <ul>
                    <li>Developing bespoke web applications tailored to specific business needs.</li>
                    <li>Utilizing technologies such as React, Angular, or Vue.js for interactive user interfaces. </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                  <i class="fas fa-mobile-alt"></i>                        
               </div>
               <div class="feature__item-cont">
                  <h6 class="feature__item-cont-title">Mobile App Development</h6>
                  <ul>
                    <li>Creating mobile applications for iOS and Android platforms.</li>
                    <li>Developing cross-platform apps using frameworks like React Native or Flutter. </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                 <i class="fas fa-shopping-cart"></i>                       
               </div>
               <div class="feature__item-cont">
                  <h6 class="feature__item-cont-title">E-commerce Development</h6>
                  <ul>
                    <li>Building online stores and integrating secure payment gateways.</li>
                    <li>Implementing shopping carts and product catalog features. </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                 <i class="fas fa-briefcase"></i>                       
               </div>
               <div class="feature__item-cont">
                  <h6 class="feature__item-cont-title">Content Management Systems (CMS)</h6>
                  <ul>
                    <li>Implementing CMS like WordPress, Drupal, or Joomla for easy content updates.</li>
                    <li>Customizing and extending CMS functionality.</li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                  <i class="fas fa-server"></i>                        
               </div>
               <div class="feature__item-cont">
                  <h6 class="feature__item-cont-title">Web Hosting and Maintenance</h6>
                  <ul>
                    <li>Providing hosting solutions for websites and applications.</li>
                    <li>Regular maintenance and updates to ensure optimal performance and security.</li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                  <i class="fas fa-bullhorn"></i>                        
               </div>
               <div class="feature__item-cont">
                  <h6 class="feature__item-cont-title">Search Engine Optimization (SEO)</h6>
                  <ul>
                    <li>Optimizing websites for search engines to improve visibility.</li>
                    <li>Keyword research, on-page optimization, and link building.</li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                  <i class="fas fa-bullhorn"></i>                        
               </div>
               <div class="feature__item-cont">
                  <h6 class="feature__item-cont-title">E-commerce SEO</h6>
                  <ul>
                    <li>Optimizing online stores for better search engine rankings.</li>
                    <li>Improving product visibility and online sales.</li>
                  </ul>
               </div>
            </div>
         </div>

         <div class="col-lg-6 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                  <i class="fas fa-eye"></i>                        
               </div>
               <div class="feature__item-cont">
                  <h6 class="feature__item-cont-title">UI/UX Design</h6>
                  <ul>
                    <li>Designing user interfaces and experiences for websites and applications.</li>
                    <li>Conducting user research and usability testing.   </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                  <i class="fas fa-database"></i>
               </div>
               <div class="feature__item-cont">
                  <h6 class="feature__item-cont-title">Database Development and Integration</h6>
                  <ul>
                    <li>Setting up and managing databases for web applications.</li>
                    <li>Integrating databases with web services and APIs.</li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                <i class="fas fa-lock"></i>                      
               </div>
               <div class="feature__item-cont">
                  <h6 class="feature__item-cont-title">Security Services</h6>
                  <ul>
                    <li>Implementing security measures to protect against cyber threats.</li>
                    <li>Regular security audits and vulnerability assessments.</li>
                  </ul>
               </div>
            </div>
         </div>

 
         <div class="col-lg-6 col-md-6">
            <div class="feature__item">
               <div class="feature__item-icon">
                  <i class="far fa-life-ring"></i>                        
               </div>
               <div class="feature__item-cont">
                  <a href="{{url('contact')}}">
                     <h6 class="feature__item-cont-title">Maintenance and Support</h6>
                  </a>
                  <p>
                     Our commitment is to consistently offer top-notch support to all our users.
                  </p>
               </div>
            </div>
         </div>


         
      
      </div>   </div>
</section>
<!-- Service Section -->
@endsection