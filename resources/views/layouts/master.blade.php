<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php if ($title) {
                echo $title;
            } else {
                echo 'Simpact Solutions';
            } ?> </title>
    <meta name="title" Content="<?php if ($title) {echo $title;} else {echo 'Simpact Solutions';} ?>">
    <meta name="description" content="<?php if ($description) {
                                            echo $description;
                                        } else {
                                            echo 'Simpact Solutions';
                                        } ?>">
    <meta name="keywords" content="<?php if ($keywords) {
                                        echo $keywords;
                                    } else {
                                        echo 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
                                    } ?>">
    <meta name="robots" content="index,follow" />
	<meta name="author" content="Simpact Solutions">
    <link rel="shortcut icon" href="{{asset('assets/images/logoIcon/s.ico')}}" type="image/x-icon">
    <link rel="canonical" href="<?php if ($canonical) {  echo $canonical; } else { echo 'https://mlmcreatorsindia.com/';  } ?>"/>
    <meta name="language" content="en">
    <meta http-equiv="content-language" content="en" />
    <meta http-equiv="content-script-type" content="text/javascript" />
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="window-target" content="_top" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?php if ($canonical) {  echo $canonical; } else { echo 'https://mlmcreatorsindia.com/';  } ?>">
    <meta name="twitter:creator" content="Simpact Solutions">
    <meta name="twitter:image" content="{{asset('assets/images/logoIcon/simpact_logo.png')}}">
    <meta name="twitter:title" content="<?php if ($title) {  echo $title; } else { echo 'Simpact Solutions';  } ?>">
    <meta name="twitter:description" content="<?php if ($description) {  echo $description; } else { echo 'Simpact Solutions';  } ?>">
    <meta itemprop="name" content="simpact - Home">
    <meta itemprop="description" content="<?php if ($description) {echo $description;} else {echo 'Simpact Solutions';} ?>">
    <meta itemprop="image" content="{{asset('assets/images/logoIcon/simpact_logo.png')}}"> 
    <meta property="og:locale" content="en_GB" />
    <meta property="og:site_name" content="Simpact Solutions" />
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php if ($title) {echo $title;} else {echo 'Simpact Solutions';} ?>">
    <meta property="og:description" content="<?php if ($description) {echo $description;} else {echo 'Simpact Solutions';} ?>">
    <meta property="og:image" content="{{asset('assets/images/logoIcon/simpact_logo.png')}}" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:url" content="<?php if ($canonical) {echo $canonical;} else {echo 'https://mlmcreatorsindia.com/';} ?>">
	<script type="application/ld+json">
	{
	  "@context": "http://schema.org",
	  "@type": "Organization",
	  "name": "Simpact Solutions",
	  "url": "https://mlmcreatorsindia.com/",
	  "logo": "{{asset('assets/images/logoIcon/simpact_logo.png')}}",
	  "description": "Simpact Solutions is your one-stop destination for Web Design, Web Development, SEO Services, Software Development, IT Solutions, and more. Located in Raipur.",
	  "address": {
		"@type": "PostalAddress",
		"streetAddress": "First Floor, Shop No.121, Simpact Solutions, Golden Trade Center, New Rajendra Nagar,",
		"addressLocality": "Raipur",
		"addressRegion": "Chhattisgarh",
		"postalCode": "492001",
		"addressCountry": "India"
	  }
	}
	</script>

    <link media  rel="stylesheet" href="{{asset('assets/global/css/bootstrap.min.css')}}">
    <link media  rel="stylesheet" href="{{asset('assets/templates/basic/css/jquery-ui.min.css')}}">
    <link media  rel="stylesheet" href="{{asset('assets/templates/basic/css/animate.css')}}">
    <link media  rel="stylesheet" href="{{asset('assets/global/css/all.min.css')}}">
    <link media  rel="stylesheet" href="{{asset('assets/global/css/line-awesome.min.css')}}">
    <link media  rel="stylesheet" href="{{asset('assets/templates/basic/css/lightbox.min.css')}}">
    <link media  rel="stylesheet" href="{{asset('assets/templates/basic/css/owl.min.css')}}">
    <link media  rel="stylesheet" href="{{asset('assets/templates/basic/css/main.css')}}">
    <link media  rel="stylesheet" href="{{asset('assets/templates/basic/css/color8bf4.css?color=7376E7&amp;secondColor=47498f')}}">
    <script src="{{asset('assets/global/js/jquery-3.6.0.min.js')}}" ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="overflow-hidden">


    {{-- <div class="preloader">
        <div class="loader">
            <span class="loader-block"></span>
            <span class="loader-block"></span>
            <span class="loader-block"></span>
            <span class="loader-block"></span>
            <span class="loader-block"></span>
            <span class="loader-block"></span>
            <span class="loader-block"></span>
            <span class="loader-block"></span>
            <span class="loader-block"></span>
        </div>
    </div>
    <div class="overlay"></div> --}}

    @include('layouts.header')
    <div id="whatsapp-icon" class="highlight">
        <a href="https://wa.me/987654321" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp Icon">
        </a>
    </div>

    @yield('content')

    @include('layouts.footer')


    <div class="sticky-social">
        <ul class="social">
           <a href="javascript:void(0)" data-toggle="tooltip" style="position: absolute;left: 50px;"  data-placement="right" title="Hooray!"><i class="fa fa-caret-right" id="collaps_sticky_social" aria-hidden="true"></i></a>
           <li><a target="_blank" href="https://www.facebook.com/profile.php?id=61553129525397" target="_blank" tabindex="0"><i class="fab fa-facebook-f"></i></a></li>
     
           <li><a target="_blank" href="#" tabindex="-1"><i class="fab fa-instagram"></i></a></li>
           <li><a target="_blank" href="https://www.linkedin.com/company/simpact-online-services-pvt-ltd/" target="_blank" tabindex="0"><i class="fab fa-linkedin-in"></i></a></li>
             <li><a target="_blank" href="https://maps.app.goo.gl/eucsg6Lp624qVK979" target="_blank" tabindex="0"><i class="fab fa-google"></i></a></li>
         </ul>
     </div>
     
     
     
     





	
    <script src="{{asset('assets/templates/basic/js/isotope.pkgd.min.js')}}" defer></script>
    <script src="{{asset('assets/global/js/bootstrap.min.js')}}" defer></script>
    <script src="{{asset('assets/templates/basic/js/rafcounter.min.js')}}" defer></script>
    <script src="{{asset('assets/templates/basic/js/lightbox.min.js')}}" defer></script>
    <script src="{{asset('assets/templates/basic/js/owl.min.js')}}" defer></script>


    <script src="{{asset('assets/templates/basic/js/main.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('assets/global/css/iziToast.min.css')}}">
    <script src="{{asset('assets/global/js/iziToast.min.js')}}" defer></script>
    <script src="{{asset('assets-dashboard/libs/moment/moment.js')}}" defer></script>
    

    <script>
        $(document).ready(function() {
            $("#collaps_sticky_social").click(function() {
                $(".sticky-social").toggleClass("collaps_sticky_social");
            });
        });
     </script>



</body>

</html>