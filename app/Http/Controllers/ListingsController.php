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
            return $entry->brand === $request;
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
    public function sortListingByPriceAsc(){
        
    }

    //get all active listing sorted by price (descending)
    
    //get all active listing sorted by subcategory (userinput)

    //get all active listing sorted by name (ascending)

    //get all active listing sorted by name (descending)

    //get all active listing sorted by date listed (new to old)

    //get all active listing sorted by date listed (old to new)

    //deactivate listing

    //activate listing

    //delete listing












    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreListingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateListingRequest  $request
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateListingRequest $request, Listing $listing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        //
    }
}


