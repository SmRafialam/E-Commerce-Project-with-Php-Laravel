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
                <form action="{{Route('subcategorystore')}}" method="post" enctype="multipart/form-data">
                @csrf  
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="catId">Select Category</label>
                                <select class="form-control" type="text" placeholder="Enter Sub Category Name" name="catId">
                                        <option value="">------Select Category------</option>
                                    @foreach($category as $cat)
                                        <option value="{{ $cat->id }}"> {{ $cat->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="subCatName">Sub Category Name</label>
                                <input class="form-control" type="text" placeholder="Enter Sub-Category Name" name="subCatName" id="subCatName" value="{{ old('subCatName') }}">
                                <span class="text-danger">
                                @error('subCatName')
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
                                <label for="image">Sub-Category image</label>
                                <input class="form-control" type="file"  name="image" id="image">
                                <span class="text-danger">
                                @error('catId')
                                    {{$message}}
                                @enderror
                                </span>
                            </div>
                
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="">-----Select Status-----</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="form-control btn btn-info">Add Product</button>
                            </div>
                        </div>
                    </div>
                </form>
              </div>
                  
          </div>
        </div>
      </div>
      @endsection