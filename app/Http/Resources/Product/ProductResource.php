<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
          'name' => $this->name,
          'description' =>$this->detail,
           'price' =>$this->price,
            //if number of products is 0 we print Out of stock
            'stock' =>$this->stock == 0?'Out of stock':$this->stock,
           'discount' =>$this->discount,
               //roundind the number that we are  getting with price - discount price
            'total_price' => $this->discount>0?round($this->price-($this->discount/100*$this->price),2):$this->price,

            //checking if we have reviews(if we have we divide sum of stars with number of reviews and then round that number)

            'rating' => $this->reviews->count()>0?round($this->reviews->sum('star')/$this->reviews->count()):"No reviews yet.",
            'href' => [
                "reviews" => route('reviews.index',$this->id)
            ]
        ];
    }
}
