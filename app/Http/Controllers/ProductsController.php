<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# List of used Libraries and Helpers 
use View;
use File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # Get product list
        $products = File::get(public_path('products.json'));

        # Pass product list to view
        return View::make('products')
        ->with('products',json_decode($products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = [
            "product_name" => $request->product_name,
            "quantity_in_stock" => $request->quantity_in_stock,
            "price_per_item" => $request->price_per_item,
            "datetime_submited" => date('Y-m-d h:i:s'),

        ];

        # Get product list
        $products = json_decode(File::get(public_path('products.json')));

        # Push new product to products array
        array_push($products, $product);

        File::put( public_path('products.json'),json_encode($products) );

        # Success response
          return response()->json(
                [
                  'status'=>'success',
                  'error' => [],
                  'details' => 
                    [
                      'success_code' => '200',
                      'success_message' => 'Product Created Successfully',
                      'product' => $product
                    ]
                ],
                200
            );
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
