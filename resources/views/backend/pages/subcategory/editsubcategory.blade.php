@extends('backend.mastertemplate.template')

@section('content')

<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Dashboard</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
      </div>

      <div class="br-pagebody">
        <div class="row row-sm">
          <div class="col-sm-12">
              <div class="card p-3 shadow-base">
                <form action=" {{Route('subcategory.update',$subcat->id)}} " method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="catId">Select Category</label>
                                <select class="form-control" type="text" placeholder="Enter Sub Category Name" name="catId">
                                    @foreach($cat as $cats)
                                        <option value="{{ $cats->id }}" @if($cats->id == $subcat->catId)selected @endif>{{ $cats->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="subCatName">Sub Category Name</label>
                                <input class="form-control" type="text" placeholder="Enter Sub-Category Name" name="subCatName" id="subCatName" value="{{ $subcat->subCatName }}">
                                <span class="text-danger">
                                @error('subCatName')
                                    {{$message}}
                                @enderror
                                </span>
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea placeholder="Enter sub-category Description" class="form-control" name="description" id="description" cols="30" rows="4">{{ $subcat->description }}</textarea>
                                <span class="text-danger">
                                @error('description')
                                    {{$message}}
                                @enderror
                                </span>
                            </div>
                            
                    
                            <div class="col-md-6">
                                <img height="120" src="{{ asset('backend/subcategoryimages/'.$subcat->image) }}" alt="">
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
                                    <option value="1" @if($subcat->status==1)selected @endif>Active</option>
                                    <option value="2" @if($subcat->status==2)selected @endif>Inactive</option>
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