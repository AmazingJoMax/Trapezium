<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Show All Listings
Route::get('/', [ListingController::class, 'index']);

//Create Listing
Route::get('/listings/create', [ListingController::class, 'create'])
->middleware('auth');

//Store Listing
Route::post('/listings', [ListingController::class, 'store'])
->middleware('auth');

//Edit Listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])
->middleware('auth');

//Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])
->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])
->middleware('auth');

//Manage Listing
Route::get('/listings/manage', [ListingController::class, 'manage'])
->middleware('auth');

//Show Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Show Register Form
Route::get('/register', [UserController::class, 'create'])
->middleware('guest');

//Create User
Route::post('/users', [UserController::class, 'store']);

//Show Login Form
Route::get('/login', [UserController::class, 'login'])
->name('login')->middleware('guest');

//Login Users
Route::post('/user/authenticate', [UserController::class, 'authenticate']);

//Logout
Route::post('/logout', [UserController::class, 'logout']);

//User Profile
Route::get('/profile/{user_id}', [ProfilesController::class, 'show'])->middleware('auth');

//Update Profile
Route::put('/profile/{user_id}', [UserController::class, 'update'])->middleware('auth');

//Delete Profile
Route::delete('/profile/{user_id}', [UserController::class, 'destroy'])->middleware('auth');