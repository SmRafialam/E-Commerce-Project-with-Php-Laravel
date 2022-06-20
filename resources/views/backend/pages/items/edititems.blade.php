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
                <form action=" {{Route('items.update',$items->id)}} " method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            
                            <div class="form-group">
                                <label for="item_code">Items Code</label>
                                <input class="form-control" type="text" placeholder="Enter Item Code Name" name="item_code" id="item_code" value="{{ $items->item_code }}">
                                <span class="text-danger">
                                @error('item_code')
                                    {{$message}}
                                @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="name">Items Name</label>
                                <textarea placeholder="Enter Items Name" class="form-control" name="name" id="name" cols="30" rows="4">{{ $items->name }}</textarea>
                                <span class="text-danger">
                                @error('name')
                                    {{$message}}
                                @enderror
                                </span>
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea placeholder="Enter sub-category Description" class="form-control" name="description" id="description" cols="30" rows="4">{{ $items->description }}</textarea>
                                <span class="text-danger">
                                @error('description')
                                    {{$message}}
                                @enderror
                                </span>
                            </div>
                            
                    
                            <!-- <div class="col-md-8"> -->
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
                                <img height="80" src="{{ asset('backend/items/'.$items->pic) }}" alt="">
                                <label for="gallery">Items Gallery Pics</label>
                                <input class="form-control" type="file"  name="gallery[]" id="gallery" multiple>
                                <span class="text-danger">
                                @error('gallery')
                                    {{$message}}
                                @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <button class="form-control btn btn-info">Update Items</button>
                            </div>
                        <!-- </div> -->
                    </div>
                    <div class="col-md-4">
                        @foreach($galleries as $gallery)
                        <div class="row m-1 border">
                            <a href="{{ Route('items.gallerydelete',$gallery->id) }}"><i class="fas fa-times"></i></a>
                        <img height="200" src="{{ asset('backend/items/gallery/'.$gallery->gallery_pic) }}" alt="">
                        <h2>{{$gallery->id}}</h2>
                        </div>
                        @endforeach
                    </div>
                </form>
              </div>
                  
          </div>
        </div>
      </div>
      @endsection