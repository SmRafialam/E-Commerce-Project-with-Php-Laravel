<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\validator;
use App\Models\Backend\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.category.managecategory');
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

    public function catshow()
    {
        $alldata = Category::all();
        return response()->json([
            'data'=>$alldata

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
        $validator = validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
            'tag' => 'required',
            

        ]);
        if($validator ->fails()){
            return response()->json([
                'status'=>'failed',
                'errors'=>$validator->messages()
            ]);
        }
            else{
                $category=new Category;
                $category->name = $request->name;
                $category->description = $request->description;
                $category->tag = $request->tag;
                $category->status = $request->status;
                $category->save();
                return response()->json([
                    'message' => 'Category added successfully',
                ]);

            }
        }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
    public function edit($id)
    {
        $alldata = Category::find($id);
        if($alldata){
        return response()->json([
            'data'=>$alldata

        ]);
    }
    else{
        return response()->json([
            'status' => '400',
            'error'=>'Data Not Found'

        ]);

    }
        
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
