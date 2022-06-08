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
                <form action=" {{Route('update',$product->id)}} " method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pname">Product Name</label>
                                <input class="form-control" type="text" placeholder="Enter Product Name" name="pname" id="pname" value="{{ $product->name }}">
                                <span class="text-danger">
                                
                                </span>
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea placeholder="Enter Product Description" class="form-control" name="description" id="description" cols="30" rows="4">{{ $product->description }}</textarea>
                                <span class="text-danger">
                                
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" name="category">
                                    <option value="">-----Select Category-----</option>
                                    <option value="Men" @if($product->category == 'Men') selected @endif >Men</option>
                                    <option value="Women" @if($product->category == 'Women') selected @endif>Women</option>
                                    <option value="Children" @if($product->category == 'Children') selected @endif>Children</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="size">Size</label>
                                <select class="form-control" name="size" id="size">
                                    <option value="">-----Select Size-----</option>
                                    <option value="XL" @if($product->size == 'XL') selected @endif>XL</option>
                                    <option value="M"  @if($product->size == 'M') selected @endif>M</option>
                                    <option value="SM" @if($product->size == 'SM') selected @endif>SM</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="costPrice">Cost Price</label>
                                <input class="form-control" type="text" placeholder="Enter Product Cost Price" name="costPrice" id="costPrice" value="{{ $product->costPrice }}">
                            </div>
                            <div class="form-group">
                                <label for="salePrice">Sale Price</label>
                                <input class="form-control" type="text" placeholder="Enter Product Sale Price" name="salePrice" id="salePrice" value="{{ $product->salePrice }}">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input class="form-control" type="text" placeholder="Enter Product Quantity" name="quantity" id="quantity" value="{{ $product->quantity }}">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="">-----Select Status-----</option>
                                    <option value="1" @if($product->status == '1') selected @endif>Active</option>
                                    <option value="2" @if($product->status == '2') selected @endif>Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="form-control btn btn-info">Update Product</button>
                            </div>
                        </div>
                    </div>
                </form>
              </div>
                  
          </div>
        </div>
      </div>
      @endsection