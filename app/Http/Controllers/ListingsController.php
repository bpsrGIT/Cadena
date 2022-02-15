<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Models\Listing;
use App\Http\Resources\ListingResource;
use Illuminate\Support\Facades\Request;

class ListingsController extends Controller
{

    //Create new listing (Dealer/Distributor only)
    public function newListing(StoreListingRequest $request){
        $listing = Listing::create([
            'category' => $request->input('category'),
            'sub_category' => $request->input('sub_category'),
            'brand' => $request->input('brand'),
            'product_model' => $request->input('product_model'),
            'product_name' => $request->input('product_name'),
            'price' => $request->input('price'),
            'quantity' => $request->input('price'),
            'description' => $request->input('description'),
            'is_active' => 1,
            'no_of_views' => 0,
            'no_of_wishlist' => 0,
            'image' => null
        ]);
        return new ListingResource($listing);
    }
    
    //Get all listing
    public function getAllListing(){
        return ListingResource::collection(Listing::all());
    }

    //get all active listing
    public function getActiveListing(){
        $listing = Listing::all()->reject(function ($entry) {
            return $entry->is_active === false;
        });
        return ListingResource::collection($listing);
    }

    //get all active by brand (user input)
    public function searchListingByBrand(Request $request){
        $listing = Listing::all()->reject(function ($entry){
            return $entry->is_active === false;
        })->map(function ($entry){
            return $entry->brand == $request;
        });
        return ListingResource::collection($listing);
    }

    //get all active by subcategory (userinput)
    public function searchListingBySubCategory(Request $request){
        $listing = Listing::all()->reject(function ($entry){
            return $entry->is_active === false;
        })->map(function ($entry){
            return $entry->sub_category === $request;
        });
        return ListingResource::collection($listing);
    }

    //get all active listing sorted by price (ascending)
    public function sortListingByPrice(){
        $listing = Listing::all()->reject(function ($entry){
            return $entry->is_active === false;
        })->sortBy('price');
        return ListingResource::collection($listing);
    }

    //get all active listing sorted by price (descending)
    public function sortListingByPriceDesc(){
        $listing = Listing::all()->reject(function ($entry){
            return $entry->is_active === false;
        })->sortByDesc('price');
        return ListingResource::collection($listing);
    }
    
    //get all active listing sorted by subcategory (userinput)

    //get all active listing sorted by model (ascending)
    public function sortListingByModel(){
        $listing = Listing::all()->reject(function ($entry){
            return $entry->is_active === false;
        })->sortBy('product_model');
        return ListingResource::collection($listing);
    }

    //get all active listing sorted by name (descending)
    public function sortListingByModelDesc(){
        $listing = Listing::all()->reject(function ($entry){
            return $entry->is_active === false;
        })->sortByDesc('product_model');
        return ListingResource::collection($listing);
    }

    //get all active listing sorted by date listed (new to old)
    public function sortListingByDate(){
        $listing = Listing::all()->reject(function ($entry){
            return $entry->is_active === false;
        })->sortByDesc('date_listed');
        return ListingResource::collection($listing);
    }

    //get all active listing sorted by date listed (old to new)
    public function sortListingByDateDesc(){
        $listing = Listing::all()->reject(function ($entry){
            return $entry->is_active === false;
        })->sortBy('date_listed');
        return ListingResource::collection($listing);
    }

    //deactivate listing
    public function deactivateListing(Listing $list){
        $list->update([
            'is_active' => 0
        ]);
        return new ListingResource($list);
    }

    //activate listing
    public function activateListing(Listing $list){
        $list->update([
            'is_active' => 1
        ]);
        return new ListingResource($list);
    }

    //delete listing
    public function deleteListing(Listing $list){
        $list->delete();
        return new ListingResource($list);
    }

}


