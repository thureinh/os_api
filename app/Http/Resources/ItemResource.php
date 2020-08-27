<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SubcategoryResource;
use App\Http\Resources\BrandResource;
use App\Subcategory;
use App\Brand;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'item';
    public function toArray($request)
    {
        return [
            'item_id' => $this->id,
            'item_code' => $this->codeno,
            'item_name' => $this->name,
            'item_photo' => url($this->photo),
            'item_price' => $this->price,
            'item_discount' => $this->discount,
            'item_description' => $this->description,
            'subcategory' => new SubcategoryResource(Subcategory::find($this->subcategory_id)),
            'brand' => new BrandResource(Brand::find($this->brand_id)),
        ];
    }
}
