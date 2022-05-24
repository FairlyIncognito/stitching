<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Common Resource Routes:
// index - show all listings
// show - show single listing
// create - show form to create listing
// store - store new listing
// edit - show form to edit listing
// update - update listing
// destroy - delete listing

// All listings
Route::get('/', [ListingController::class, 'index']);
// Show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
// Store listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
// Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
// Update listing data
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
// Delete listing data
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
// Manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');
// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show register/create user form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
// Store register/create user data
Route::post('/users', [UserController::class, 'store']);
// Log out user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);