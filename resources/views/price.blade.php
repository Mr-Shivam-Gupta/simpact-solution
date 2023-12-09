@extends('layouts.master')
@section('content')

<!-- Hero Section -->
<section class="hero-section bg--title shapes-container">
   <div class="container">
      <h1 class="hero-title">Prices</h1>
   </div>
</section>
<!-- Hero Section -->
<!-- Pricing Plan Section -->
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
               <div class="pricing-price"><span class="pricing-currency"></span>?
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
               <div class="pricing-price"><span class="pricing-currency"></span>?
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
<!-- Pricing Plan Section -->
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
<section class="faq-section pt-120 pb-120 bg--section">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6 col-md-10">
            <div class="section__header text-center">
               <span class="section__cate">FAQs</span>
               <h3 class="section__title">Frequently Asked Questions</h3>
               <p>
                  Your primary queries that any one always asked.
               </p>
            </div>
         </div>
      </div>
      <div class="row justify-content-center g-y">
         <div class="col-lg-6">
            <div class="faq__wrapper">
               <div class="faq__item">
                  <div class="faq__title">
                     <h5 class="title">
                        What services does Simpact Solution offer?
                     </h5>
                     <span class="right--icon"></span>
                  </div>
                  <div class="faq__content">
                     <p>Simpact Solution provides a wide array of software development services, including custom software development, web application development, mobile app development, software consulting, and quality assurance.</p>
                  </div>
               </div>
               <div class="faq__item">
                  <div class="faq__title">
                     <h5 class="title">
                        How experienced is Simpact Solution in the industry?
                     </h5>
                     <span class="right--icon"></span>
                  </div>
                  <div class="faq__content">
                     <p>
                     <p>With 15 years of experience, Simpact Solution has successfully delivered numerous projects across various industries. Our team of skilled developers and experts is well-versed in the latest technologies and industry best practices.</p>
                     </p>
                  </div>
               </div>
               <div class="faq__item">
                  <div class="faq__title">
                     <h5 class="title">
                        What industries does Simpact Solution cater to?
                     </h5>
                     <span class="right--icon"></span>
                  </div>
                  <div class="faq__content">
                    <p>Simpact Solution has experience serving clients in diverse industries, such as  healthcare, finance, e-commerce, education, and more. Our adaptable approach allows us to tailor solutions to meet the specific needs of each industry.</p>
                  </div>
               </div>
               <div class="faq__item">
                  <div class="faq__title">
                     <h5 class="title">
                        How does the development process at Simpact Solution work?
                     </h5>
                     <span class="right--icon"></span>
                  </div>
                  <div class="faq__content">
                     <p>
                     <p>Our development process follows a systematic approach, encompassing requirements gathering, design, development, testing, deployment, and ongoing support. We prioritize clear communication and collaboration with clients throughout the entire project lifecycle.
                     </p>
                     </p>
                  </div>
               </div>
               <div class="faq__item">
                  <div class="faq__title">
                     <h5 class="title">
                        What technologies does Simpact Solution specialize in?
                     </h5>
                     <span class="right--icon"></span>
                  </div>
                  <div class="faq__content">
                    <p>Simpact Solution is proficient in a wide range of technologies, including but not limited to Java, Python, JavaScript, .NET, PHP, React, Angular, Node.js, and mobile app frameworks such as Flutter and React Native.</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="faq__wrapper">
               <div class="faq__item">
                  <div class="faq__title">
                     <h5 class="title">
                        Can Simpact Solution work with existing systems or legacy software?
                     </h5>
                     <span class="right--icon"></span>
                  </div>
                  <div class="faq__content">
                     <p>Yes, Simpact Solution has experience in integrating and modernizing existing systems. We understand the challenges associated with legacy software and can provide solutions for seamless integration or migration.</p>
                  </div>
               </div>
               <div class="faq__item">
                  <div class="faq__title">
                     <h5 class="title">
                        How does Simpact Solution ensure the security of developed software?
                     </h5>
                     <span class="right--icon"></span>
                  </div>
                  <div class="faq__content">
                    <p>Security is a top priority for us. Simpact Solution follows industry best practices and conducts regular security audits to identify and address vulnerabilities. We implement encryption, secure coding practices, and other measures to safeguard your software.</p>
                  </div>
               </div>
               <div class="faq__item">
                  <div class="faq__title">
                     <h5 class="title">
                        What is the typical timeframe for a software development project with Simpact Solution?
                     </h5>
                     <span class="right--icon"></span>
                  </div>
                  <div class="faq__content">
                   <p>Project timelines can vary based on the complexity and scope of the project. Simpact Solution works closely with clients to establish realistic timelines during the initial planning phase and strives to deliver projects on time without compromising quality.</p>
                  </div>
               </div>
               <div class="faq__item">
                  <div class="faq__title">
                     <h5 class="title">
                        How does Simpact Solution handle post-development support and maintenance?
                     </h5>
                     <span class="right--icon"></span>
                  </div>
                  <div class="faq__content">
                   <p>We offer ongoing support and maintenance services to ensure that your software remains secure, up-to-date, and aligned with your evolving business needs. Our support team is available to address any issues and implement updates as required.</p>
                  </div>
               </div>
               {{-- <div class="faq__item">
                  <div class="faq__title">
                     <h5 class="title">
                        How can I get a quote for my project with Simpact Solution?
                     </h5>
                     <span class="right--icon"></span>
                  </div>
                  <div class="faq__content">
                   <p>To receive a project quote, you can reach out to our sales team through the contact form on our website, and we will get back to you promptly. We typically request detailed project requirements to provide an accurate and competitive quote.</p>
                  </div>
               </div> --}}
            </div>
         </div>
      </div>
   </div>
</section>
@endsection