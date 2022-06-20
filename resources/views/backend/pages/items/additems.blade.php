@extends('backend.mastertemplate.template')

@section('content')

<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Dashboard</h4>
          <p class="mg-b-0">Add your Products here</p>
        </div>
      </div>

      <div class="br-pagebody">
        <div class="row row-sm">
          <div class="col-sm-12">
              <div class="card p-3 shadow-base">
                <form action="{{Route('items.store')}}" method="POST" enctype="multipart/form-data">
                @csrf  
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="item_code">Items Code</label>
                                <input class="form-control" type="text" placeholder="Enter Item Code Name" name="item_code" id="item_code" value="{{ old('item_code') }}">
                                <span class="text-danger">
                                @error('item_code')
                                    {{$message}}
                                @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="name">Items Name</label>
                                <textarea placeholder="Enter Items Name" class="form-control" name="name" id="name" cols="30" rows="4">{{ old('name') }}</textarea>
                                <span class="text-danger">
                                @error('name')
                                    {{$message}}
                                @enderror
                                </span>
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea placeholder="Enter sub-category Description" class="form-control" name="description" id="description" cols="30" rows="4">{{ old('description') }}</textarea>
                                <span class="text-danger">
                                @error('description')
                                    {{$message}}
                                @enderror
                                </span>
                            </div>
                            
                    
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Items Pic</label>
                                <input class="form-control" type="file"  name="image" id="image">
                                <span class="text-danger">
                                @error('image')
                                    {{$message}}
                                @enderror
                                </span>
                            </div>
                
                            <div class="form-group">
                                <label for="gallery">Items Gallery Pics</label>
                                <input class="form-control" type="file"  name="gallery[]" id="gallery" multiple>
                                <span class="text-danger">
                                @error('gallery')
                                    {{$message}}
                                @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <button class="form-control btn btn-info">Add Items</button>
                            </div>
                        </div>
                    </div>
                </form>
              </div>
                  
          </div>
        </div>
      </div>
      @endsection