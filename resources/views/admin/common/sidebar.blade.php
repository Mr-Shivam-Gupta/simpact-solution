<div class="sidebar capsule--rounded bg_img overlay--dark overlay--opacity-8"
            data-background="{{asset('assets/admin/images/sidebar/2.jpg')}}">
            <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
            <div class="sidebar__inner">
               <div class="sidebar__logo d-flex justify-content-center" style="background-color: #fff;">
                  <a href="{{url('/dashboard')}}" class="sidebar__main-logo"><img
                     src="{{asset('assets/images/logoIcon/simpact_logo.png')}}" alt="image"></a>
                  <a href="{{url('/dashboard')}}" class="sidebar__logo-shape"><img
                     src="{{asset('assets/images/logoIcon/s.ico')}}" alt="image"></a>
                  <button style="color:red" type="button" class="navbar__expand"></button>
               </div>
               <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
                  <ul class="sidebar__menu">
                     <li class="sidebar-menu-item ">
                        <a href="{{url('/')}}" class="nav-link ">
                        <i class="menu-icon las la-home"></i>
                        <span class="menu-title">Home</span>
                        </a>
                     </li>
                     <li class="sidebar-menu-item ">
                        <a href="{{url('/dashboard')}}" class="nav-link ">
                        <i class="menu-icon la la-dashboard"></i>
                        <span class="menu-title">Dashboard</span>
                        </a>
                     </li>
                     <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="">
                        <i class="menu-icon la la-html5"></i>
                        <span class="menu-title">Manage Section</span>
                        </a>
                        <div class="sidebar-submenu  ">
                           <ul>

                             <li class="sidebar-menu-item ">
                                 <a href="{{url('/admin/blog')}}" class="nav-link">
                                 <i class="menu-icon las la-dot-circle"></i>
                                 <span class="menu-title">Blog Section</span>
                                 </a>
                              </li> 
                             <li class="sidebar-menu-item">
                                 <a href="{{url('/admin/contact')}}" class="nav-link">
                                 <i class="menu-icon las la-dot-circle"></i>
                                 <span class="menu-title">Contact Data</span>
                                 </a>
                              </li> 
                              
                           </ul>
                        </div>
                     </li>
                     <li class="sidebar-menu-item ">
                        <a href="{{url('/login-history')}}" class="nav-link ">
                        <i class="menu-icon las la-history"></i>
                        <span class="menu-title">Login History</span>
                        </a>
                     </li>
                  </ul>
                  <div class="text-center mb-3 text-uppercase">
                     <span class="text--danger">Simpact</span>
                     <span class="text--orange">Solutions</span>
                  </div>
               </div>
            </div>
         </div>
         <!-- sidebar end -->
         <!-- navbar-wrapper start -->
         <nav class="navbar-wrapper">
            <form class="navbar-search" onsubmit="return false;">
               <button type="submit" class="navbar-search__btn">
               <i class="las la-search"></i>
               </button>
               <input type="search" name="navbar-search__field" id="navbar-search__field"
                  placeholder="Search...">
               <button type="button" class="navbar-search__close"><i class="las la-times"></i></button>
               <div id="navbar_search_result_area">
                  <ul class="navbar_search_result"></ul>
               </div>
            </form>
            <div class="navbar__left">
               <button class="res-sidebar-open-btn"><i class="las la-bars"></i></button>
               <button type="button" class="fullscreen-btn">
               <i class="fullscreen-open las la-compress" onclick="openFullscreen();"></i>
               <i class="fullscreen-close las la-compress-arrows-alt" onclick="closeFullscreen();"></i>
               </button>
            </div>
            <div class="navbar__right">
               <ul class="navbar__action-list">
                  <li>
                     <button type="button" class="navbar-search__btn-open">
                     <i class="las la-search"></i>
                     </button>
                  </li>
                  <li class="dropdown">
                     <button type="button" class="primary--layer" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                     <i class="las la-bell text--primary"></i>
                     <span class="pulse--primary"></span>
                     </button>
                     <div class="dropdown-menu dropdown-menu--md p-0 border-0 box--shadow1 dropdown-menu-right">
                        <div class="dropdown-menu__header">
                           <span class="caption">Notification</span>
                           <p>You have 254 unread notification</p>
                        </div>
                        <div class="dropdown-menu__body">
                           
                         
                           <a href="javascript:void(0);"  class="dropdown-menu__item">
                              <div class="navbar-notifi">
                                 <div class="navbar-notifi__left bg--green b-radius--rounded"><img src="https://script.viserlab.com/bisurv/placeholder-image/350x300" alt="Profile Image"></div>
                                 <div class="navbar-notifi__right">
                                    <h6 class="notifi__title">New member registered</h6>
                                    <span class="time"><i class="far fa-clock"></i> 1 year ago</span>
                                 </div>
                              </div>
                              <!-- navbar-notifi end -->
                           </a>
                        </div>
                        <div class="dropdown-menu__footer">
                           <a href="javascript:void(0);" class="view-all-message">View all notification</a>
                        </div>
                     </div>
                  </li>
                  <li class="dropdown">
                     <button type="button" class="" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                     <span class="navbar-user">
                     <span class="navbar-user__thumb"><img src=" @if($user->image == Null)
                        @if($user->gender == 'female') {{ asset('assets/admin/images/female_user.png')}}
                        @elseif($user->gender == 'male') {{ asset('assets/admin/images/male_user.png')}}
                        @elseif($user->gender == 'other') {{ asset('assets/admin/images/female_user.png')}}
                        @else {{ asset('assets/admin/images/male_user.png')}}
                        @endif
                    @else {{ asset('profile_image/'.$user->image)}} @endif" alt="image"></span>
                     <span class="navbar-user__info">
                     <span class="navbar-user__name text-capitalize">{{$user->name}}</span>
                     </span>
                     <span class="icon"><i class="las la-chevron-circle-down"></i></span>
                     </span>
                     </button>
                     <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">
                        <a href="{{url('/profile')}}"
                           class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                        <i class="dropdown-menu__icon las la-user-circle"></i>
                        <span class="dropdown-menu__caption">Profile</span>
                        </a>
                        <a href="{{url('/password')}}"
                           class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                        <i class="dropdown-menu__icon las la-key"></i>
                        <span class="dropdown-menu__caption">Password</span>
                        </a>
                        <a href="{{url('/account')}}"
                           class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                        <i class="dropdown-menu__icon las la-trash-alt"></i>
                        <span class="dropdown-menu__caption">Account</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit();"
                           class="dropdown-menu__item d-flex align-items-center px-3 py-2s">
                        <i class="dropdown-menu__icon las la-sign-out-alt"></i>
                        <span class="dropdown-menu__caption">Logout</span>
                        </a>
                     </form>
                     </div>
                  </li>
               </ul>
            </div>
         </nav>