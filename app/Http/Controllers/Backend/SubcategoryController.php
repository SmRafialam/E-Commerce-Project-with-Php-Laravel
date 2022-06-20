<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\str;
use App\Models\Backend\category;
use App\Models\Backend\Subcategory;
use Image;
use File;


class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcat=Subcategory::all();
        return view("backend.pages.subcategory.managesubcategory",compact('subcat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=category::all();
        return view("backend.pages.subcategory.addsubcategory",compact("category"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'catId' => 'required',
        'subCatName' => 'required',
        'description' => 'required',
        'image' => 'required',
        'status' => 'required'
        ]);

        $subcategory = new Subcategory();
        $subcategory->catId = $request->catId;
        $subcategory->slug  = Str::slug($request->subCatName);
        $subcategory->subCatName = $request->subCatName;
        $subcategory->description = $request->description;
        $subcategory->status = $request->status;

        $image = $request->file('image');
        $imgCustomName = rand().'.'.$image->getClientOriginalExtension();
        $location = public_path('backend/subcategoryimages/'.$imgCustomName);
        Image::make($image)->save($location);
        $subcategory->image = $imgCustomName;
        $subcategory->save();
        return redirect()->route('subcategorymanage');
    
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
        $subcat=subcategory::find($id);
        $cat=Category::all();
        return view("backend.pages.subcategory.editsubcategory",compact("subcat","cat"));

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
        $subcategory = Subcategory::find($id);
        $subcategory->catId = $request->catId;
        $subcategory->slug  = Str::slug($request->subCatName);
        $subcategory->subCatName = $request->subCatName;
        $subcategory->description = $request->description;
        $subcategory->status = $request->status;
        if(empty($request->image)){
            $subcategory->update();
            return redirect()->route('subcategorymanage');
        }
        else{

        if(FILE::exists('backend/subcategoryimages/'.$subcategory->image)){
            FILE::delete('backend/subcategoryimages/'.$subcategory->image);
        }
            $image1 = $request->file('image');
            $imgCustomName = rand().'.'.$image1->getClientOriginalExtension();
            $location = public_path('backend/subcategoryimages/'.$imgCustomName);
            Image::make($image1)->save($location);
            $subcategory->image = $imgCustomName;
            $subcategory->update();
            return redirect()->route('subcategorymanage');
        
    }
}
    
        


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcat=subcategory::find($id);
        if(FILE::exists('backend/subcategoryimages/'.$subcat->image)){
            FILE::delete('backend/subcategoryimages/'.$subcat->image);
        }
        $subcat->delete();
        return redirect()->route('subcategorymanage');

    }
}
