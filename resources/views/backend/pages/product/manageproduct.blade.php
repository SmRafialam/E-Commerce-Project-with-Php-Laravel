@extends('backend.mastertemplate.template')

@section('content')

<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Products</h4>
          <p class="mg-b-0">Manage your all Products</p>
        </div>
      </div>
      <div class="br-pagebody">
        <div class="row row-sm">
          <div class="col-sm-12">
              <div class="card p-3 shadow-base">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#Sl</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Size</th>
                            <th>Cost Price</th>
                            <th>Sale Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl=1; @endphp
                        @foreach($products as $data)
                        
                        <tr>
                            <td> {{ $sl }} </td>
                            <td> {{ $data->name }} </td>
                            <td> {{ $data->description }} </td>
                            <td> {{ $data->category }} </td>
                            <td> {{ $data->size }} </td>
                            <td> {{ $data->costPrice }} </td>
                            <td> {{ $data->salePrice }} </td>
                            <td> {{ $data->quantity }} </td>
                            <td>
                                @if($data->status==1)
                                <span class="badge badge-info">Active</span>
                                @else
                                <span class="badge badge-danger">Inctive</span>
                                @endif
                            </td>
                            <td> <a href="{{ Route('edit',$data->id) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a> 
                                 <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id }}"> <i class="fa fa-trash"></i> </button> 
                            </td>
                        </tr>
                        <div class="modal fade" id="delete{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Confirmation Message</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Are you sure want to delete this product?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <a href="{{ Route('delete',$data->id) }}" class="btn btn-danger">Confirm</a>
                            </div>
                          </div>
                        </div>
                      </div>
                        @php $sl++; @endphp
                        @endforeach
                    </tbody>
                </table>
              </div>
                  
          </div>
        </div>
      </div>
      @endsection