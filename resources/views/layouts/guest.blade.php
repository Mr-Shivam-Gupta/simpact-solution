<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title ?? 'Simpact Solutions' }}</title>
        <meta name="title" content="{{ $title ?? 'Simpact Solutions' }}">
        <meta name="description" content="{{ $description ?? 'Simpact Solutions' }}">
        <meta name="keywords" content="{{ $keywords ?? 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.' }}">
        <meta name="robots" content="index,follow" />
        <meta name="author" content="Simpact Solutions">
        <meta name="language" content="English">
        <link rel="shortcut icon" href="{{ asset('assets/images/logoIcon/s.ico') }}" type="image/x-icon">
        <link rel="canonical" href="{{ $canonical ?? 'https://mlmcreatorsindia.com/' }}"/>
        <meta http-equiv="content-language" content="en-gb" />
        <meta http-equiv="content-script-type" content="text/javascript" />
        <meta http-equiv="content-style-type" content="text/css" />
        <meta http-equiv="window-target" content="_top" />
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="{{ $canonical ?? 'https://mlmcreatorsindia.com/' }}">
        <meta name="twitter:creator" content="Simpact Solutions">
        <meta name="twitter:image" content="{{ asset('assets/images/logoIcon/simpact_logo.png') }}">
        <meta name="twitter:title" content="{{ $title ?? 'Simpact Solutions' }}">
        <meta name="twitter:description" content="{{ $description ?? 'Simpact Solutions' }}">
        <meta itemprop="name" content="simpact - Home">
        <meta itemprop="description" content="{{ $description ?? 'Simpact Solutions' }}">
        <meta itemprop="image" content="{{ asset('assets/images/logoIcon/simpact_logo.png') }}">
        <meta property="og:locale" content="en_GB" />
        <meta property="og:site_name" content="Simpact Solutions" />
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $title ?? 'Simpact Solutions' }}">
        <meta property="og:description" content="{{ $description ?? 'Simpact Solutions' }}">
        <meta property="og:image" content="{{ asset('assets/images/logoIcon/simpact_logo.png') }}" />
        <meta property="og:image:type" content="image/png" />
        <meta property="og:image:width" content="600" />
        <meta property="og:image:height" content="315" />
        <meta property="og:url" content="{{ $canonical ?? 'https://mlmcreatorsindia.com/' }}">
        
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

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
