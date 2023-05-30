<?php

namespace App\Http\Controllers;

use App\Models\ProductTag;
use App\Http\Requests\StoreProductTagRequest;
use App\Http\Requests\UpdateProductTagRequest;
use App\Http\Resources\ProductTagResource;

class ProductTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productTags = ProductTag::all();
      
        return ProductTagResource::collection($productTags);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductTagRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductTag $ProductTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductTag $ProductTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductTagRequest $request, ProductTag $ProductTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductTag $ProductTag)
    {
        //
    }
}
