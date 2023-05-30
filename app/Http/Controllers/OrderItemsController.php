<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrderItemsRequest;
use App\Models\OrderItem;
use App\Http\Resources\OrderItemsResource;

class OrderItemsController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest $request
     * @param  \App\Models\product $product
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateOrderItemsRequest $request, OrderItem $order_item)
    {

        if (empty($order_item) ) {
            return "Order item with id: $order_item->id has not been found, no change has been made.";
        }

        if ($request->has('order_id')) {
            $order_item->order_id = $request->order_id;
        }
     
        if ($request->has('product_id')) {
            $order_item->product_id = $request->product_id;
        }

        if ($request->has('quantity')) {
            $order_item->quantity = $request->quantity;
        }
       

        if ($order_item->save())
        {
            return new OrderItemsResource($order_item);
        }
        
    }
}