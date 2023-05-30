<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Http\Resources\OrderResource;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetOrderRequest $request)
    {

        $orders = Order::with('orderItems')->get();

        // if the date_from request get parameter exists, filter the orders collection by the date_from
        if ($request->has('date_from') ) {
            $orders = $orders->where('created_at', '>=', $request->date_from);
        }

        // if the date_to request get parameter exists, filter the orders collection by the date_to
        if ($request->has('date_to') ) {
            $orders = $orders->where('created_at', '<=', $request->date_to);
        }
        
        // if the customer_full_name request get parameter exists, filter the orders collection by the customer_full_name
        if ($request->has('customer_full_name') ) {
            $orders = $orders->where('customer_full_name', $request->customer_full_name);
        }

        return OrderResource::collection($orders);

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {

        if ($request->has('customer_id')) {
            $order = new Order;
            $order->customer_id = $request->customer_id;
            $order->save();
            $order_id = $order->id;
        }

        if ($request->has('order_items')) {
            $order_items = $request->order_items;
            if (is_array($order_items)) {
                foreach ($order_items as $item) {

                    $order_item = new OrderItem;
                    $order_item->order_id = $order_id;
                    $order_item->product_id = $item['product_id'];
                    $order_item->quantity = $item['quantity'];
                    $order_item->save();
                }
            }
        }

        return new OrderResource($order);     // return response with the data about the newly created order
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateOrderRequest $request, Order $order)
    {
        if (empty($order) ) {
            return "Order with id: $order->id has not been found, no change has been made.";
        }
     
        if ($request->has('customer_id')) {
            $order->customer_id = $request->customer_id;
            $order->save();
        }

        return new OrderResource($order);     // return response with the data about the newly created order
    }


    /**
     * Download order pdf file
     *
     * @param  $orderId
     * @return \Illuminate\Http\Response
     */
    public function downloadOrderPdfFile($orderId)
    {

        $order = Order::find($orderId);
        // $order = Order::find($orderId)->select();
        // return $order;

        if (empty($order) ) {
            return "Order item with id: $id has not been found, no change has been made.";
        }


        // calculate price total of all order items per order id
        $order_items_price_total = 0;
        foreach ($order->orderItems as $order_item) {
            $order_items_price_total = (float)$order_item['price'] * (float)$order_item->pivot['quantity'];
        }

        $data = array(
            "order" => $order, 
            "customer_full_name" => $order->customer_full_name, 
            "customer_email" => $order->customer->email, 
            "customer_phone" => $order->customer->phone_number, 
            "order_items" => $order->orderItems,
            "order_items_price_total" => $order_items_price_total
        );

        $pdf = PDF::loadView('pdf.invoice', $data);
        return $pdf->download('invoice_task.pdf');
    }

}