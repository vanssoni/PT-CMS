<?php

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


//auth routes(login regsiter)
Auth::routes();
//authenticated routes
Route::group(['middleware' => ['auth:web']], function() {
    
    Route::get('/', 'HomeController@index');
    // Route::resource(UserController::class);
    Route::get('/profile', function(){
        return view('modules.users.my-profile');
    });
    Route::post('/update-profile', 'UserController@updateProfile');
    Route::get('/logout', function(){
        \Auth::logout();
        return back();
    });
});
