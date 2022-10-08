<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\E_AgentProductsController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */


// Route::post('/home', [PagesController::class , 'store'])->name('home');
Route::post('/home', [PagesController::class , 'store']);
Route::post('/views', [PagesController::class , 'views']);

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home', [HomeController::class , 'index']);
// Route::get('/user', 'HomeController@index')->name('user');

Route::get('/contact', 'PagesController@contact');
Route::get('/about', 'PagesController@about');
// Route::get('ecomm', 'E_AgentProductsController@ecoms');

Route::resource('/', 'PagesController');
// Route::get('/', [PagesController::class , 'index']);
// Route::get('home', [PagesController::class , 'fetchAllProduct'])->name('homePage');

// Route::get('/test', [ProductsController::class , 'test']);
Route::get('pages', [ProductsController::class , 'index']);
Route::post('pages', [ProductsController::class , 'store']);
Route::get('fetch-Product', [ProductsController::class , 'fetchProduct']);
Route::get('/pages/fetch_data', [ProductsController::class , 'fetch_data']);
Route::get('fetch-Profile', [ProductsController::class , 'fetchProfile']);
Route::get('editProduct/{id}', [ProductsController::class , 'edit']);
Route::put('updateProduct/{id}', [ProductsController::class , 'update']);
Route::delete('deleteProduct/{id}', [ProductsController::class , 'destroy']);
// Route::get('fetchProducts', [ProductsController::class , 'fetchProducts']);
// Route::resource('/pages', 'ProductsController');

// Auth::routes(['verify' => true]);



// Route::get('/ecomm', function(){
//     return view ('EcommAgent');
// })->middleware(['auth', 'verified']);

Route::get('ecomm', [E_AgentProductsController::class , 'index']);
Route::post('ecomm', [E_AgentProductsController::class , 'store']);
Route::get('fetch-EcommProduct', [E_AgentProductsController::class , 'fetchProduct']);
Route::get('fetch-EcommProfile', [E_AgentProductsController::class , 'fetchProfile']);
Route::get('fetchDeliveryAgents', [E_AgentProductsController::class , 'fetchDeliveryAgents']);
Route::get('editEcommProduct/{id}', [E_AgentProductsController::class , 'edit']);
Route::put('updateEcommProduct/{id}', [E_AgentProductsController::class , 'update']);
// Route::put('updateFirstName/{id}', [E_AgentProductsController::class , 'updateFirstName']);
Route::delete('deleteEcommProduct/{id}', [E_AgentProductsController::class , 'destroy']);

Route::get('fetch-EcommDetails', [E_AgentProductsController::class , 'fetchEcommdetails']);
Route::post('ecomm', [E_AgentProductsController::class , 'EAgentDetails']);
Route::get('/ecomForm', [E_AgentProductsController::class , 'ecoms']);
Route::post('ecomm', [E_AgentProductsController::class , 'updateFirstname']);
Route::post('lastname', [E_AgentProductsController::class , 'updateLastname']);
Route::post('username', [E_AgentProductsController::class , 'updateUsername']);
Route::post('email', [E_AgentProductsController::class , 'updateEmail']);
Route::post('password', [E_AgentProductsController::class , 'updatePassword']);



Route::get('agent', [AgentController::class , 'index']);
Route::delete('deleteAgentNotify/{id}', [AgentController::class , 'destroy']);
Route::get('fetch-AgentNotify', [AgentController::class , 'fetchNotify']);
Route::get('notification', [AgentController::class , 'notification']);
Route::post('/notifyUpdate', [AgentController::class , 'notifyUpdate']);

Route::get('/chat', [PagesController::class , 'chat']);
Route::get('/message/{id}', [PagesController::class , 'getMessage']);
Route::post('message', [PagesController::class , 'sendMessage']);
// getMessage



Route::get('logout', [LoginController::class], 'logout');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/pages', function () {
            return view('pages.admin');
        }
        )->name('admin');    });

Route::middleware(['auth', 'E_CommerceAgent'])->group(function () {
    Route::get('/ecomm', function () {
            return view('ecomm.EcommAgent');
        }
        )->name('EcommAgent');    });

Route::middleware(['auth', 'DeliveryAgent'])->group(function () {
    Route::get('/agent', function () {
            return view('agent.index');
        }
        )->name('index');
    
});

Auth::routes();

// Route::get('/agentForm', [AgentController::class , 'agent']);
// Route::get('fetch-AgentDetails', [AgentController::class , 'fetchAgentDetails']);



//GOOGLE LOGIN
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

//FACEBOOK LOGIN
Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);

// //TWITTER LOGIN
// Route::get('login/twitter', [LoginController::class, 'redirectToTwitter'])->name('login.twitter');
// Route::get('login/twitter/callback', [LoginController::class, 'handleTwitterCallback']);

// // 
// / LoginController.php
// Route::resource('/pages', 'ProductsController');
// Route::resources([
//     'pages' => 'ProductsController',
//     'dashboard' => 'E_AgentProductsController' ,
// ]);