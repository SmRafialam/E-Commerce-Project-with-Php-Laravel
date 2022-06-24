<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;

class MyApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response()->json([[
        //     'name' => 'S M Rafi Alam',
        //     'email' => 'smrafialam007@gmail.com',
        //     'phone' => '01792207880'
        // ],
        // [
        //     'name' => 'hasib tanim',
        //     'email' => 'hasibtanim@gmail.com',
        //     'phone' => '019xxxxxxx'

        // ]]);

        $product = Product::all();
        return $product;
    }

    public function add(Request $res)
    {
        $token=$res->rafi;
        if($res->token=="abc12345"){
            $productData = new Product();
            $productData->name = $res->name;
            $productData->description = $res->description;
            $productData->category = $res->category;
            $productData->size = $res->size;
            $productData->costPrice = $res->costPrice;
            $productData->salePrice = $res->salePrice;
            $productData->quantity = $res->quantity; 
            $productData->status = $res->status;
            $productData->save();
        if($productData){
            return[
                'status'=>'200',
                'success' => 'Data Succesfully Saved'
            ];
        }
        else{
            return[
                'status'=>'400',
                'success' => 'Operation failed'
            ];
        }
    }
        else{
            return['status'=>'404'];
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
