<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Item;
use App\Http\Resources\OrderResource;
use HylianShield\KeyGenerator\KeyGenerator;
use HylianShield\NumberGenerator\NumberGenerator;
use HylianShield\Encoding\Base32CrockfordEncoder;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return response()->json([
            "status" => "ok",
            "totalResults" => count($orders),
            "orders" => OrderResource::collection($orders)
        ]);    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //voucher number
        $generator = new KeyGenerator(
            new NumberGenerator(),
            new Base32CrockfordEncoder()
        );
        
        $total_price = collect($request->input('items'))->reduce(function($carry, $item){
            $carry += Item::find($item['item_id'])->price * $item['item_qty'];
            return $carry;
        });
        $order = new Order;
        $order->orderdate = now();
        $order->voucherno = $generator->generateKey(4);
        $order->total = $total_price;
        $order->status = 0;
        $order->user_id = 1;
        $order->save();
        foreach ($request->input('items') as $item) {
            # code...
            $item_model = Item::find($item['item_id']);
            $order->items()->attach($item_model->id, ['qty' => $item['item_qty']]);
        }
        return new OrderResource($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
