<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'type' => 'Listings',
            'attributes' => [
                'category' => (string)$this->category,
                'sub_category' => (string)$this->sub_category,
                'brand' => (string)$this->brand,
                'product_model' => (string)$this->product_model,
                'product_name' => (string)$this->product_name,
                'price' => (int)$this->price,
                'quantity' => (int)$this->quantity,
                'description' => (string)$this->description,
                'is_active' => (bool)$this->is_active,
                'no_of_views' => (int)$this->no_of_views,
                'no_of_wishlist' => (int)$this->no_of_wishlist,
                'images' => ['image1' => (string)$this->image1]
            ]
        ];
    }
}
