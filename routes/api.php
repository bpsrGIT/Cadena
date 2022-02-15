<?php

use App\Http\Controllers\ListingsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->prefix('users')->group(function () {

    //User Registration
    Route::post('/register', [UsersController::class, 'register']);

    //User Login
    Route::get('login', [UsersController::class, 'login']);

    //User Logout
    Route::get('/logout', [UsersController::class, 'logout']);

    //Get user details
    Route::get('/{id}', [UsersController::class, 'userDetails']);

    //User update details
    Route::put('/id/{edit}', [UsersController::class, 'editUserDetails']);

    //User change password
    Route::put('/{id}/changepassword', [UsersController::class, 'changePassword']);

    //Change user to admin(admin only)
    Route::put('/{id}/adminrole', [UsersController::class, 'changeToAdmin']);

    //Change user to dealer/distributor (admin only)
    Route::put('/{id}/changerole', [UsersController::class, 'changeRole']);

    //Change dealer/distributor to user (admin only)
    Route::




    // Add listing to compare/saved listing (User only)

    // Add listing to wishlist (async: push to user wishlist and add 1 to listing no_of_wishlist) (User only)

    // Remove listing to wishlist (async: push to user wishlist and add 1 to listing no_of_wishlist) (User only)

    // Add new listing (async: push to dealer/distributor listings and add listing)

    // Remove listing (async: pop from dealer/distributor listings and remove from listing)


    // Get all Dealers (admin only)

    // Get all distributors (admin only)

    // Get all users (admin only)

});

Route::middleware('auth:api')->prefix('listings')->group(function () {

    //Listings

    //Create new listing (Dealer/Distributor only)
    Route::post('/new', [ListingsController::class, 'newListing'])->middleware('user_type:dealer');
    
    //Get all listing
    Route::get('/all', [ListingsController::class], 'getAllListing')->middleware('is_admin:1');

    //get all active listing
    Route::get('/', [ListingsController::class, 'getActiveListing'])->middleware('guest');

    //get all active by brand (user input)
    Route::get('/brand', [ListingsController::class, 'searchListingByBrand'])->middleware('guest');

    //get all active by subcategory (userinput)
    Route::get('/subcategory', [ListingsController::class, 'searchListingBySubCategory'])->middleware('guest');

    //get all active listing sorted by price (ascending)
    Route::get('/priceasc', [ListingsController::class, 'sortListingByPriceAsc'])->middleware('guest');

    //get all active listing sorted by price (ascending)
    Route::get('/priceasc', [ListingsController::class, 'sortListingByPrice'])->middleware('guest');

    //get all active listing sorted by price (descending)
    Route::get('/pricedesc', [ListingsController::class, 'sortListingByPriceDesc'])->middleware('guest');

    //get all active listing sorted by subcategory (userinput)

    //get all active listing sorted by model (ascending)
    Route::get('/modelasc', [ListingsController::class, 'sortListingByModel'])->middleware('guest');

    //get all active listing sorted by name (descending)
    Route::get('/modeldesc', [ListingsController::class, 'sortListingByModelDesc'])->middleware('guest');

    //get all active listing sorted by date listed (new to old)
    Route::get('/bydateasc', [ListingsController::class, 'sortListingByDate'])->middleware('guest');

    //get all active listing sorted by date listed (old to new)
    Route::get('/bydatedesc', [ListingsController::class, 'sortListingByDateDesc'])->middleware('guest');

    //deactivate listing
    Route::put('/{id}/deactivate', [ListingsController::class, 'deactivateListing'])->middleware('user_type:dealer');

    //activate listing
    Route::put('/{id}/activate', [ListingsController::class, 'activateListing'])->middleware('user_type:dealer');

    //delete listing
    Route::delete('/{id}/delete', [ListingsController::class, 'deleteListing'])->middleware('user_type:dealer');

});
