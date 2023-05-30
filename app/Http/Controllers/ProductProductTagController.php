<?php

namespace App\Http\Controllers;

use App\Models\ProductProductTag;
use App\Http\Requests\StoreProductProductTagRequest;
use App\Http\Requests\UpdateProductProductTagRequest;
use App\Http\Resource\ProductTagResource;

class ProductProductTagController extends Controller
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
    public function store(StoreProductProductTagRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductProductTag $productProductTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductProductTag $productProductTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductProductTagRequest $request, ProductProductTag $productProductTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductProductTag $productProductTag)
    {
        //
    }
}
