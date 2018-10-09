<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        $response = response()->json($products,200);
        return $response;
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {

        if((!$request->name)||(!$request->description)){

            $response = response()->json([
             
            'message' => 'Please enter all required fields'
             
            ], 422);
             return $response;
        }

      $product =  Product::create($request->all());

        $response = response()->json([

           'message' => 'The post has been created succesfully',
           'data' => $product,
        ], 201);


       return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if(!$product){

            $response = response()->json(['error'=>'This product cannot be found'],404);
             return $response;
        }

        $response = response()->json($product,200);
        return $response;

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
        $product = Product::find($id);

        if(!$product){

            $response = response()->json(['error'=>'This product cannot be found'],404);
             return $response;
        }

        if((!$request->name)||(!$request->description)){

            $response = response()->json(['message' => 'Please enter all required fields'], 422);

             return $response;
        }

        $product->update( $request->all());

        $response = response()->json([

           'message' => 'The post has been created succesfully',
           'data' => $product,
        ], 201);


       return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(!$product){

            $response = response()->json(['error'=>'This product cannot be found'],404);
             return $response;
        }
        $product->delete();

        $response = response()->json(['message'=>'This product is deteted.'],200);

        return $response;
    }
}
