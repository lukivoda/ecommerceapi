<?php

namespace App\Http\Resources\Product;

use App\Models\Product;
use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


        return [

            'name' =>$this->name,
//rounding the number that we are  getting with price - discount price
            'total_price' => $this->discount>0?round($this->price-($this->discount/100*$this->price),2):$this->price,
            'discount' =>$this->discount,

            'rating' => $this->reviews->count()>0?round($this->reviews->sum('star')/$this->reviews->count()):"No reviews yet.",
            'href' => route("products.show",$this->id)

        ];
    }
}
