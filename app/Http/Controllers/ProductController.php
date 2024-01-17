<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Http\Requests\GetProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetProductRequest $request)
    {

        $products = Product::all();

        // if the product_number request get parameter exists, filter the customer collection by the product_number
        if ($request->has('product_number')) {
            $products = $products->where('product_number', $request->product_number);
        }

        // if the price_from request get parameter exists, filter the customer collection by the price_from
        if ($request->has('price_from')) {
            $products = $products->where('price', '>=', $request->price_from);
        }

        // if the price_to request get parameter exists, filter the customer collection by the price_to
        if ($request->has('price_to')) {
            $products = $products->where('price', '<=', $request->price_to);
        }
     
        return ProductResource::collection($products);
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }


    /**
     * Store product in the database
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreProductRequest $request)
    {

        $product = new Product;

        if ($request->has('name')) {
            $product->name = $request->name;
        }

        if ($request->has('product_number')) {
            $product->product_number = $request->product_number;
        }

        if ($request->has('image')) {
            $product->image = $request->image;
        }

        if ($request->has('price')) {
            $product->price = $request->price;
        }

        if ($product->save())
        {
            return new ProductResource($product);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest $request
     * @param  \App\Models\product $product
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateProductRequest $request, Product $product)
    {

        if (empty($product) ) {
            return "Product with id: $product->id has not been found, no change has been made.";
        }
     
        if ($request->has('name')) {
            $product->name = $request->name;
        }

        if ($request->has('excerpt')) {
            $product->excerpt = $request->excerpt;
        }
        
        if ($request->has('description')) {
            $product->description = $request->description;
        }

        if ($request->has('featured_image')) {
            $product->featured_image = $request->featured_image;
        }

        if ($request->has('price')) {
            $product->price = $request->price;
        }
    
        if ($request->has('sale_price')) {
            $product->sale_price = $request->sale_price;
        }

        if ($request->has('sale_price_value')) {
            $product->sale_price_value = $request->sale_price_value;
        }

        if ($request->has('stock_quantity')) {
            $product->stock_quantity = $request->stock_quantity;
        }

        if ($request->has('reviews_allowed')) {
            $product->reviews_allowed = $request->reviews_allowed;
        }

        if ($request->has('rating_items')) {
            $product->rating_items = $request->rating_items;
        }
        
        if ($request->has('rating')) {
            $product->rating = $request->rating;
        }
        
        if ($product->save())
        {
            return new ProductResource($product);
        }
    }


    /**
     * Remove a product item with a specific id
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (!empty($product) ) {
            $product->destroy($product->id);
            return "Product with id: $product->id has been deleted.";
        } else {
            return "Product with id: $product->id has not been found, no change has been made.";
        }
    }
}
