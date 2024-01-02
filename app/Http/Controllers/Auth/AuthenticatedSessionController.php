<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\LoginHistory;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use \Jenssegers\Agent\Agent; 
use Stevebauman\Location\Facades\Location;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $data['title'] = 'Login | Simpact Solutions - Web Design, Development, SEO, and IT Solutions';
      $data['canonical'] = 'https://mlmcreatorsindia.com/login';
      $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
      $data['description'] = 'Log in to your Simpact Solutions account. Access your dashboard, manage your settings, and explore our services.';
        return view('auth.login',$data);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $agent = new Agent();
        // Create LoginHistory record
        $ipAddress = $request->ip();
        $location = Location::get( $ipAddress);
       $data= LoginHistory::create([
            'user_id' => Auth::id(),
            'ip_address' => $request->ip(),
            'login_at' => now(),
		   'location' => json_encode($location),
            'browser' =>  $agent->browser(),
            
        ]);
	
        $request->session()->regenerate();
        $user = $request->user();

        if($user->is_admin ==1){
          $r=  RouteServiceProvider::ADMIN;
        } else{
          $r = RouteServiceProvider::HOME;
        } 
        return redirect()->intended($r);
       
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return redirect()->back();
    }
}
