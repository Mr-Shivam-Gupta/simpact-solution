<?php

namespace App\Http\Controllers;

use SimpleXMLElement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Registration;
use App\Models\blogs;
use App\Models\UserInfo;
use App\Models\LoginHistory;
use App\Mail\mailsender;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;
// use App\Mail\MailSender;
// use Exception;
// use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Session; 
 use Illuminate\Support\Facades\Auth;
 use Stevebauman\Location\Facades\Location;
class simpactController extends Controller
{
    public function index()
   {
      $data['title'] = 'Simpact Solutions - Web Design, Development, SEO, and IT Solutions ';
      $data['canonical'] = 'https://mlmcreatorsindia.com/';
      $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
      $data['description'] = 'Simpact Solutions is your one-stop destination for Web Design, Web Development, SEO Services, Software Development, IT Solutions, and more. Located in Raipur .';
		   $last_blogs = Blogs::where('status', 0)
    ->where('publish_date', '<=', date('Y-m-d'))
    ->orderBy('publish_date', 'desc')
    ->limit(3)
    ->get();
      return view('home',['last_blogs' => $last_blogs])->with($data);
   }
   public function about()
   {
      $data['title'] = 'About | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
      $data['canonical'] = 'https://mlmcreatorsindia.com/about';
      $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, Mobile App Development, Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company,  SEO,  IT Support, Website Security, Raipur Technology Experts.';
      $data['description'] = 'Learn more about Simpact Solutions - your trusted technology experts in Raipur. Discover our expertise in Web Design, Web Development, SEO Services, Software Development, and IT Solutions.';
      return view('about', $data);
   }

   // public function faq1()
   // {
   //    $data['title'] = 'FAQ | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
   //    $data['canonical'] = 'https://mlmcreatorsindia.com/faq';
   //    $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
   //    $data['description'] = 'Find answers to commonly asked questions about Simpact Solutions, including information about our services, expertise, and more.';
   //    return view('faq', $data);
   // }
   public function blog()
   {
      $data['title'] = 'Blog | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
      $data['canonical'] = 'https://mlmcreatorsindia.com/blog';
      $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
      $data['description'] = 'Explore our latest blog posts at Simpact Solutions. Stay updated with insightful articles on web design, development, SEO, software, IT solutions, and more.';
      $blog = Blogs::orderBy('id', 'desc')
      ->where('status', 0)
      ->where('publish_date', '<=', date('Y-m-d'))
      ->get();
      return view('blog',['blogs'=>$blog])->with($data);
   }
   public function blogPreview($id)
  {
   $data['title'] = 'Blog | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
   $data['canonical'] = 'https://mlmcreatorsindia.com/blog/'.$id.'/view';
   $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
   $data['description'] = 'Explore our latest blog posts at Simpact Solutions. Stay updated with insightful articles on web design, development, SEO, software, IT solutions, and more.';
   $blog = Blogs::where('id',$id)->where('status', 0)
   ->where('publish_date', '<=', date('Y-m-d'))->first();
   $last_blogs = Blogs::where('id', '!=', $id)
    ->where('status', 0)
    ->where('publish_date', '<=', date('Y-m-d'))
    ->orderBy('publish_date', 'desc')
    ->limit(6)
    ->get();
   return view('blog-preview',['blogs'=>$blog, 'last_blogs' => $last_blogs])->with($data);
  } 

   public function price1()
   {
      $data['title'] = 'Price | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
      $data['canonical'] = 'https://mlmcreatorsindia.com/price';
      $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
      $data['description'] = 'Discover our pricing plans at Simpact Solutions. Get detailed information on our competitive pricing for web design, web development, SEO services, software development, and IT solutions.';
      return view('price', $data);
   }

   public function contact1()
   {
      $data['title'] = 'Contact | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
      $data['canonical'] = 'https://mlmcreatorsindia.com/contact';
      $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
      $data['description'] = 'Contact Simpact Solutions today for inquiries, collaborations, or to get in touch with our team. We are here to assist you with web design, web development, SEO services, software development, and IT solutions.';
      return view('contact', $data);
   }
   public function login1()
   {
      $data['title'] = 'Login | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
      $data['canonical'] = 'https://mlmcreatorsindia.com/login';
      $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
      $data['description'] = 'Log in to your Simpact Solutions account. Access your dashboard, manage your settings, and explore our services.';
      return view('login', $data);
   }
   public function register1()
   {
      $data['title'] = 'Registration | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
      $data['canonical'] = 'https://mlmcreatorsindia.com/register';
      $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
      $data['description'] = 'Register for an account with Simpact Solutions. Sign up to access exclusive services, personalized content, and stay updated with our latest offerings in web design, development, SEO, and IT solutions.';
      return view('register', $data);
   }
   public function services1()
   {
      $data['title'] = 'Services | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
      $data['canonical'] = 'https://mlmcreatorsindia.com/services';
      $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
      $data['description'] = 'Explore our comprehensive range of services at Simpact Solutions. We offer expert solutions in web design, web development, SEO services, software development, IT solutions, and more. Discover how we can help your business succeed online.';
      return view('services', $data);
   }
   public function products1()
   {
      $data['title'] = 'Products | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
      $data['canonical'] = 'https://mlmcreatorsindia.com/products';
      $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
      $data['description'] = 'Discover our featured products at Simpact Solutions. Explore our high-quality offerings, including web design tools, development software, SEO services, and IT solutions. Find the right products to elevate your online presence.';
      return view('products', $data);
   }
   // public function aboutus1()
   // {
   //    $data['title'] = 'About-Us | Simpact Solutions  ';
   //    $data['canonical'] = 'https://mlmcreatorsindia.com/aboutus';
   //    $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
   //    $data['description'] = 'Learn more about Simpact Solutions - your trusted technology experts in Raipur. Discover our expertise in Web Design, Web Development, SEO Services, Software Development, and IT Solutions';
   //    return view('aboutus', $data);
   // }

   // public function blog1()
   // {
   //    $data['title'] = 'Blog | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
   //    $data['canonical'] = 'https://mlmcreatorsindia.com/blog1';
   //    $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
   //    $data['description'] = 'Explore our latest blog posts at Simpact Solutions. Stay updated with insightful articles on web design, development, SEO, software, IT solutions, and more.';
   //    return view('blogdetails.blog1', $data);
   // }
   // public function blog2()
   // {
   //    $data['title'] = 'Blog | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
   //    $data['canonical'] = 'https://mlmcreatorsindia.com/blog2';
   //    $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
   //    $data['description'] = 'Explore our latest blog posts at Simpact Solutions. Stay updated with insightful articles on web design, development, SEO, software, IT solutions, and more.';
   //    return view('blogdetails.blog2', $data);
   // }
   // public function blog3()
   // {
   //    $data['title'] = 'Blog | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
   //    $data['canonical'] = 'https://mlmcreatorsindia.com/blog3';
   //    $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
   //    $data['description'] = 'Explore our latest blog posts at Simpact Solutions. Stay updated with insightful articles on web design, development, SEO, software, IT solutions, and more.';
   //    return view('blogdetails.blog3', $data);
   // }
   // public function blog4()
   // {
   //    $data['title'] = 'Blog | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
   //    $data['canonical'] = 'https://mlmcreatorsindia.com/blog4';
   //    $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
   //    $data['description'] = 'Explore our latest blog posts at Simpact Solutions. Stay updated with insightful articles on web design, development, SEO, software, IT solutions, and more.';
   //    return view('blogdetails.blog4', $data);
   // }
   // public function blog5()
   // {
   //    $data['title'] = 'Blog | Simpact Solutions  ';
   //    $data['canonical'] = 'https://mlmcreatorsindia.com/blog5';
   //    $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
   //    $data['description'] = 'Explore our latest blog posts at Simpact Solutions. Stay updated with insightful articles on web design, development, SEO, software, IT solutions, and more.';
   //    return view('blogdetails.blog5', $data);
   // }
   // public function blog6()
   // {
   //    $data['title'] = 'Blog | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
   //    $data['canonical'] = 'https://mlmcreatorsindia.com/blog6';
   //    $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
   //    $data['description'] = 'Explore our latest blog posts at Simpact Solutions. Stay updated with insightful articles on web design, development, SEO, software, IT solutions, and more.';
   //    return view('blogdetails.blog6', $data);
   // }
   // public function product1()
   // {
   //    $data['title'] = 'Products | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
   //    $data['canonical'] = 'https://mlmcreatorsindia.com/product1';
   //    $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
   //    $data['description'] = 'Discover our featured products at Simpact Solutions. Explore our high-quality offerings, including web design tools, development software, SEO services, and IT solutions. Find the right products to elevate your online presence.';
   //    return view('productdetails.product1', $data);
   // }
   // public function product2()
   // {
   //    $data['title'] = 'Products | Simpact Solutions  ';
   //    $data['canonical'] = 'https://mlmcreatorsindia.com/product2';
   //    $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
   //    $data['description'] = 'desc';
   //    return view('productdetails.product2', $data);
   // }
   // public function product3()
   // {
   //    $data['title'] = 'Products | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
   //    $data['canonical'] = 'https://mlmcreatorsindia.com/product3';
   //    $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
   //    $data['description'] = 'Discover our featured products at Simpact Solutions. Explore our high-quality offerings, including web design tools, development software, SEO services, and IT solutions. Find the right products to elevate your online presence.';
   //    return view('productdetails.product3', $data);
   // }
   // public function product4()
   // {
   //    $data['title'] = 'Products | Simpact Solutions';
   //    $data['canonical'] = 'https://mlmcreatorsindia.com/product4';
   //    $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
   //    $data['description'] = 'Discover our featured products at Simpact Solutions. Explore our high-quality offerings, including web design tools, development software, SEO services, and IT solutions. Find the right products to elevate your online presence.';
   //    return view('productdetails.product4', $data);
   // }
   // public function product5()
   // {
   //    $data['title'] = 'Products | Simpact Solutions';
   //    $data['canonical'] = 'https://mlmcreatorsindia.com/product5';
   //    $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
   //    $data['description'] = 'Discover our featured products at Simpact Solutions. Explore our high-quality offerings, including web design tools, development software, SEO services, and IT solutions. Find the right products to elevate your online presence.';
   //    return view('productdetails.product5', $data);
   // }
   // public function product6()
   // {
   //    $data['title'] = 'Products | Simpact Solutions';
   //    $data['canonical'] = 'https://mlmcreatorsindia.com/product6';
   //    $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
   //    $data['description'] = 'Discover our featured products at Simpact Solutions. Explore our high-quality offerings, including web design tools, development software, SEO services, and IT solutions. Find the right products to elevate your online presence.';
   //    return view('productdetails.product6', $data);
   // }
   // public function exploremore1()
   // {
   //    $data['title'] = 'Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
   //    $data['canonical'] = 'https://mlmcreatorsindia.com/';
   //    $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
   //    $data['description'] = 'desc';
   //    return view('exploremore', $data);
   // }

   // public function premiumDomain($request)
   // {
  
      
   // }

   public function modifyUser(Request $request){
      $id = $request->user_id;
      $user = User::find($id);
  
      if ($user) {
          $user->costomer_id = $request->customer_id;
          $user->save();
  
          // Check if user_info record exists for the given user_id
          $user_info = UserInfo::where('user_id', $id)->first();
  
          if ($user_info) {
              // If user_info record exists, update it
              $user_info->companyname = $request->companyname_id;
              $user_info->address = $request->address1_id;
              $user_info->city = $request->city_id; 
              $user_info->zip = $request->zip_id; 
              $user_info->country = $request->country_id;
              $user_info->state = $request->state_id;
              $user_info->phone = $request->phone_id;
              $user_info->password = $request->passwd;
              $user_info->save();
          } else {
              // If user_info record doesn't exist, create a new one
              $new_user_info = new UserInfo();
              $new_user_info->user_id = $id;
              $new_user_info->companyname = $request->companyname_id;
              $new_user_info->address = $request->address1_id;
              $new_user_info->city = $request->city_id;
              $user_info->zip = $request->zip_id; 
              $new_user_info->country = $request->country_id;
              $new_user_info->state = $request->state_id;
              $new_user_info->phone = $request->phone_id;
              $new_user_info->password = $request->passwd;
              $new_user_info->save();
          }
  
          return response()->json(['success' => true, 'message' => 'User modified successfully']);
      } else {
          return response()->json(['success' => false, 'message' => 'User not found']);
      }
  }

  public function apiContact(Request $request){

  }


public function customers(Request $request)
{
    $url = 'https://test.httpapi.com/api/customers/v2/signup.xml?auth-userid=172238&api-key=zphlhRJETuaSCbYNl0cJKF2Y0H7bX1hX&username='.$request->email.'&passwd='.$request->passwd.'&name='.$request->name.'&company='.$request->companyname.'&address-line-1='.$request->address1.'&city='.$request->city.'&state='.$request->state.'&country='.$request->country.'&zipcode='.$request->zip.'&phone-cc='.$request->telnocc.'&phone='.$request->telno.'&lang-pref=en';
    $response = Http::post($url);
    if ($response->successful()) {
        $xmlResponse = $response->body();
        return   response()->json(['success' => true, 'message' => 'API request successful', 'data' => $xmlResponse,]);
    } else {
        $errorMessage = $response->body();
        return response()->json(['success' => false, 'message' => 'API request failed', 'error' => $errorMessage]);
    }
}

   public function checkDomain(Request $request)
   {
      $url1 = 'https://domaincheck.httpapi.com/api/domains/available.json';
      $domain =$request->domain;
      $tlds =$request->tlds;
      $queryParams1 = [
          'auth-userid' => '172238',
          'api-key' => 'zphlhRJETuaSCbYNl0cJKF2Y0H7bX1hX',
          'domain-name' => $domain,
          'tlds' => $tlds,
      ];
      $response1 = Http::get($url1, $queryParams1);
      $responseData1 = $response1->json();
      // return response()->json(['check_domains' => $responseData1]);
    
      $url2 = 'https://domaincheck.httpapi.com/api/domains/premium/available.xml';
      $queryParams2 = [
          'auth-userid' => '172238',
          'api-key' => 'zphlhRJETuaSCbYNl0cJKF2Y0H7bX1hX',
          'domain-name' => $request->domain,
          'key-word' => 'shivam',
          'tlds' => $request->tlds,
          'price-high' => '10000',
          'no-of-results' => '20',
      ];
      $response2 = Http::get($url2,$queryParams2);
      $xmlResponse = $response2->body();
      $xml = new \SimpleXMLElement($xmlResponse);
      $premiumDomains = [];
      foreach ($xml->entry as $entry) {
          $domain = (string)$entry->string[0];
          $price = (float)$entry->string[1];
          $premiumDomains[] = ['domain' => $domain, 'price' => $price];
      }
   
      return response()->json(['check_domains' => $responseData1,'premium_domains' => $premiumDomains]);

   }





   public function contactForm(Request $req)
   {

      $agent = new Agent();
      $userAgent = $req->header('User-Agent');
      $validation = $req->validate([
         'name' => 'required',
         'phone' => 'required|numeric',
         'email' => 'required|email',
         'subject' => 'required',
         'message' => 'required',
      ]);
      $ipAddress = $req->ip();
      $location = Location::get($ipAddress);
     $formData = [
      'name' =>  $req->name,
      'email' =>  $req->email,
      'phone' =>  $req->phone,
      'subject' =>  $req->subject,
      'message' =>  $req->message,
      'ip_address' =>  $ipAddress ,
      'browser' =>  $browser = $agent->browser(),
      'location' => json_encode($location),
     ];
     $query = DB:: table('contact_tbl')->insert($formData);
    
     Mail::to("simpactservices@gmail.com")->send(new mailsender($formData));
     if($query){
        return redirect('contact')->with('success', 'form submited successful!');
     }
     else{
      return redirect('contact')->with('danger', 'Somthing went worng!,Please try again');
     }
   }

   public function registerForm(Request $req){
      $agent = new Agent();
      
      $validation = $req->validate([
         'name' => 'required',
         'username' => 'required|email',
         'pass' => 'required',
      ]);

     $formData = [
      'name' =>  $req->name,
      'email' =>  $req->username,
      'password' =>  $req->pass,
      'ip_address' =>  $ipAddress = $req->ip(),
      'browser' =>  $browser = $agent->browser(),
      // .' '.$agent->getBrowserVersion(),
      // 'submit_date' =>  now(), 
     ];
     $registration = Registration::create($formData);
    //dd($formData);
   }



   public function logout(){
      Session::flush();
      Auth::logout(); 
    return redirect()->back();
   }

   public function googleLogin()
   {
      return Socialite::driver('google')->redirect();
   }
   public function googleHandle(Request $request)
   {
         try {
           $googleUser = Socialite::driver('google')->user();
         //   dd($googleUser);
        
           $user = User::where('email', $googleUser->email)->firstOrNew([
            'email' => $googleUser->email,
        ]);
     if (!$user->exists) {
         $user->name = $googleUser->name;
         $user->email_verified_at = now();
         $user->password = ''; 
         $user->save();
     } else {
         $user->name = $googleUser->name;
         $user->save();
     }
            $agent = new Agent();
            $ipAddress = $request->ip();
            $location = Location::get( $ipAddress);
            $data= LoginHistory::create([
                  'user_id' => $user->id,
                  'ip_address' => $request->ip(),
                  'login_at' => now(),
               'location' => json_encode($location),
                  'browser' =>  $agent->browser(),
            ]);
               Auth::login($user);
         session()->put('id',$user->id);
         session()->put('type',$user->is_admin);
         return redirect('/');
         }
         catch (\Exception $e) {
            echo ($e->getMessage());
            return redirect()->route('login')->with('error', 'Google authentication failed. Please try again later.');
        }

}

}