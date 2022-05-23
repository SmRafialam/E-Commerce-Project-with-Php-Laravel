<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderby('id','asc')->get();
        // select *from tbl_users orderby (id) ASC
        return view('backend.pages.product.manageproduct',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.product.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $all)
    {
        $all->validate([
            'pname' => 'required',
            'description' => 'required|min:10',

        ]);
        $data = $all->all();
        print_r($data);




        $product = new Product();
        $product->name = $all->pname;
        $product->description = $all->description;
        $product->category = $all->category;
        $product->size = $all->size;
        $product->costPrice = $all->costPrice;
        $product->salePrice = $all->salePrice;
        $product->quantity = $all->quantity;
        $product->status = $all->status;
        $product->save();
        return redirect()->route('manage');
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
        $product = Product::find($id);
        return view('backend.pages.product.editproduct',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $all, $id)
    {
        $product = Product::find($id);
        $product->name = $all->pname;
        $product->description = $all->description;
        $product->category = $all->category;
        $product->size = $all->size;
        $product->costPrice = $all->costPrice;
        $product->salePrice = $all->salePrice;
        $product->quantity = $all->quantity;
        $product->status = $all->status;
        $product->update();
        return redirect()->route('manage');
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
        $product->delete();
        return redirect()->route('manage');

    }
}
