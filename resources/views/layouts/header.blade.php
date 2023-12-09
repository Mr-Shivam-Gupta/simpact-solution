
<div class="header-top">
    <div class="container">
       <div class="header__top__wrapper">
          <ul>
             <li>
                <span class="name h6">Email: </span> 
                <a class="text--base" href="mailto:simpactservices@gmail.com">simpactservices@gmail.com</a> 
             </li>
             <li>
                <span class="name h6">Call Us: </span><a href="tel:(+91) 8839775589" class="text--base">(+91) 8839775589</a>
             </li>
          </ul>
          <ul>
         <p class="h6">Welcome ! <b class="text--base text-uppercase"> @if($user) {{$user->name}} @else GUEST @endif</b></p>
          </ul>
          {{-- <ul class="social-icons">
             <li><a href="https://www.facebook.com/people/Simpact-Online-Services/61553129525397/" target="_blank"
                title="Facebook"><i class="lab la-facebook"></i></a>
             </li>
             <li><a href="https://maps.app.goo.gl/peBM1V3hnMzBFJpM9" target="_blank"
                title="google-business"><i class="lab la-google"></i></a>
             </li>
             <li><a href="https://www.youtube.com/" target="_blank"
                title="youtube"><i class="fab fa-youtube"></i></a>
             </li>
             <li><a href="https://www.instagram.com/" target="_blank"
                title="instagram"><i class="lab la-instagram"></i></a>
             </li>
          </ul> --}}
       </div>
    </div>
 </div>
 <div class="header-bottom bg--section">
    <div class="header-area">
       <div class="container">
          <div class="header-wrapper">
             <div class="logo me-lg-4 me-auto">
                <a href="{{url('/')}}"><img src="{{asset('assets/images/logoIcon/simpact_logo.png')}}"
                   alt="logo">
                </a>
             </div>
             <div class="menu-area">
                <div class="menu-close">
                   <i class="las la-times"></i>
                </div>
                <ul class="menu">
                   <li><a href="{{ url('/') }}">Home</a></li>
                   <li><a href="{{ url('about') }}">About</a></li>
                   <!-- <li><a href="{{ url('faq') }}">FAQ's</a></li> -->
                   <li><a href="{{ url('blog') }}">Blog</a></li>
                   <li><a href="{{ url('price') }}">Pricing</a></li>
                   <li><a href="{{ url('products') }}">Products</a></li>
                   <li><a href="{{ url('services') }}">Services</a></li>
                   <li><a href="{{ url('contact') }}">Contact</a></li>
                </ul>
				    <div class=" d-lg-none  d-sm-block" >
						   <ul class="menu">
							   <li> <a href="{{url('login')}}"><i class="fas fa-sign-in-alt text-danger"></i> LogIn</a></li>
							   <li> <a href="{{url('register')}}"><i class="fas la-user text-danger"></i> Registration</a></li>
                     </ul>
                  
                </div>
             </div>
             <div class="change-language me-3 me-lg-0">
                <div class="sign-in-up d-none d-sm-block">
                   <span><i class="fas la-user text-danger"></i></span>
                   @if($user)  <a href="{{url('dashboard')}}">Dashboard</a>
                   <form method="POST" class="d-inline" action="{{ route('logout') }}">
                     @csrf
                   <a href="{{ route('logout') }}" onclick="event.preventDefault();
                   this.closest('form').submit();"  >
                   Logout</a> 
                  </form> @else
                     <a href="{{url('login')}}">LogIn</a>
                   <a href="{{url('register')}}">Registration</a> @endif
             
                  
                </div>
             </div>
             <div class="header-bar d-lg-none">
                <span></span>
                <span></span>
                <span></span>
             </div>
          </div>
       </div>
    </div>
 </div>
