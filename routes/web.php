<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SimpactController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {   return view('welcome');});
Route::get('/', [SimpactController::class, 'index']);
Route::get('home', [SimpactController::class, 'index']);
Route::get('/about', [SimpactController::class, 'about']);
Route::get('/aboutus', [SimpactController::class, 'aboutus1']);
// Route::get('/faq', [SimpactController::class, 'faq1']);

Route::get('/blog', [SimpactController::class, 'blog']);
Route::get('/blog/{id}/view', [SimpactController::class, 'blogPreview']);

//Route::get('/blog1', [SimpactController::class, 'blog1']);
//Route::get('/blog2', [SimpactController::class, 'blog2']);
//Route::get('/blog3', [SimpactController::class, 'blog3']);
//Route::get('/blog4', [SimpactController::class, 'blog4']);
//Route::get('/blog5', [SimpactController::class, 'blog5']);
//Route::get('/blog6', [SimpactController::class, 'blog6']);

Route::get('/price', [SimpactController::class, 'price1']);
Route::any('/products', [SimpactController::class, 'products1']);
// Route::get('/product1', [SimpactController::class, 'product1']);
// Route::get('/product2', [SimpactController::class, 'product2']);
// Route::get('/product3', [SimpactController::class, 'product3']);
// Route::get('/product4', [SimpactController::class, 'product4']);
// Route::get('/product5', [SimpactController::class, 'product5']);
// Route::get('/product6', [SimpactController::class, 'product6']);
// Route::get('/exploremore', [SimpactController::class, 'exploremore1']);
Route::get('/services', [SimpactController::class, 'services1']);
Route::get('/contact', [SimpactController::class, 'contact1']);
Route::post('/contact-form', [SimpactController::class, 'contactForm']);
// Route::get('/register', [SimpactController::class, 'register1']);
// Route::any('/register-form', [SimpactController::class, 'registerForm']);
// Route::get('/login', [SimpactController::class, 'login1']);
// Route::any('/login-form', [SimpactController::class, 'loginForm']);
Route::any('/google-login', [SimpactController::class, 'googleLogin']);
Route::get('/auth/google/callback', [SimpactController::class, 'googleHandle']);

Route::post('check-domain', [SimpactController::class, 'checkDomain']);
Route::post('add-customers', [SimpactController::class, 'customers']);
Route::post('modify-user', [SimpactController::class, 'modifyUser']);



Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/login-history', [ProfileController::class, 'history'])->name('profile.history');
    Route::get('/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::any('/account', [ProfileController::class, 'account'])->name('profile.account');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
    Route::prefix('/admin')->middleware('auth','admin')->group(function () {
    Route::get('/blog', [Controller::class, 'blogindex'])->name('blog.index');
    Route::get('/blog-create', [Controller::class, 'blogCreate'])->name('blog.create');
    Route::get('/blog-list', [Controller::class, 'blogList'])->name('blog.list');
    Route::get('/blog/{id}/view', [Controller::class, 'blogView'])->name('blog.view');
    Route::get('/blog/{id}/edit', [Controller::class, 'blogEdit'])->name('blog.edit');
    Route::put('/blog/{id}/update', [Controller::class, 'blogUpdate'])->name('blog.update');
    Route::get('/blog/{id}/delete', [Controller::class, 'blogDelete'])->name('blog.delete');
    Route::post('/blog-submit', [Controller::class, 'blogSubmit'])->name('blog.submit');
    Route::put('/update-status', [Controller::class, 'updateStatus'])->name('blog.status');
    Route::get('/contact', [Controller::class, 'contactIndex'])->name('contact.index');
    Route::get('/contact/{id}/view', [Controller::class, 'contactView'])->name('contact.view');
});

Route::fallback(function () {
    $data['title'] = 'Simpact Solutions ';
      $data['canonical'] = 'https://mlmcreatorsindia.com/';
      $data['keywords'] = 'Web Design, Web Development, SEO Services, Software Development, IT Solutions, Raipur IT Company, Website Designers, Web Developers, Search Engine Optimization, Software Solutions, E-commerce Development, Mobile App Development, Responsive Web Design, Custom Software, CMS (Content Management System), Web Hosting, UI/UX Design, Website Maintenance, Raipur Software Company, Web Design and SEO, Software Engineering, IT Support, Website Security, App Store Optimization (ASO), Raipur Technology Experts.';
      $data['description'] = 'desc';
    return view('errors', $data);
});
require __DIR__.'/auth.php';
