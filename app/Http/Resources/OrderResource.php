<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\ItemResource;
use Carbon\Carbon;
use App\Order;
use App\User;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'order_id' => $this->id,
            'order_date' => Carbon::parse($this->orderdate)->toDayDateTimeString(),
            'voucher_no' => $this->voucherno,
            'total' => $this->total,
            'note' => $this->note,
            'status' => $this->status,
            'user' => new UserResource(User::find($this->user_id)),
            'items' => ItemResource::collection($this->items)
        ];
    }
}
