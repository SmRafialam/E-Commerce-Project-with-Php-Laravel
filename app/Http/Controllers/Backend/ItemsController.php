<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Gallery;
use App\Models\Backend\Items; 
use Image;
use File;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Items::all();
        return view('backend.pages.items.manageitems',compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.items.additems');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->image){
            $image = $request->file('image');
            $imgCustomName = rand().'.'.$image->getClientOriginalExtension();
            $location = public_path('backend/items/'.$imgCustomName);
            Image::make($image)->save($location);
            
            $item = new Items();
            $item->item_code = $request->item_code;
            $item->name = $request->name;
            $item->description = $request->description;
            $item->pic = $imgCustomName;
            $item->save();
        //    dd($item);
        }
        if($request->gallery){
            $galleryimages = $request->file('gallery');
            foreach($galleryimages as $image1){
                $galleryimgCustomName = rand().'.'.$image1->getClientOriginalExtension();
                $location1 = public_path('backend/items/gallery/'.$galleryimgCustomName);
                Image::make($image1)->save($location1);

                $gallery = new Gallery();
                $gallery->items_code = $request->item_code;
                $gallery->gallery_pic = $galleryimgCustomName;
                $gallery->save();
        //     dd($gallery);
            }

        }
        return redirect()->route('items.manage');
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
        $items=Items::find($id);
        $galleries=Gallery::where('items_code',$items->item_code)->get(); 
        return view('backend.pages.items.edititems',compact("items","galleries"));
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

    public function gallerydelete($id)
    {
        $gallery=Gallery::find($id);
        if(FILE::exists('backend/items/gallery/'.$gallery->gallery_pic)){
            FILE::delete('backend/items/gallery/'.$gallery->gallery_pic);
        }
        $gallery->delete();
        return back();
    }
}
