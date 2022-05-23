@extends('backend.mastertemplate.template')

@section('content')

<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Categories</h4>
          <p class="mg-b-0">Manage your all Category</p>
        </div>
      </div>
    <!--Add Category Modal -->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addCategory">Add Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="">Category Name</label>
                <input type="text" class="name form-control" placeholder="Enter Category Name">
                <span class="text-danger nameError"></span>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="des form-control" cols="30" rows="4"></textarea>
                <span class="text-danger desError"></span>
            </div>
            <div class="form-group">
                <label for="">Tags</label>
                <input type="text" class="tag form-control" placeholder="Enter Tags Name">
                <span class="text-danger tagError"></span>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select class="status form-control">
                    <option value="1">------Select Status------</option>
                    <option value="1">Active</option>
                    <option value="2">Inctive</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Add Category</button>
        </div>
        </div>
    </div>
    </div>

      <div class="br-pagebody">
        <div class="row row-sm">
          <div class="col-sm-12">
              <div class="card p-3 shadow-base">
                  <div class="row p-3 justify-content-between px-2">
                      <h4 class="mx-2">All Category</h4>
                      <button data-toggle="modal" data-target="#addCategory" class="btn btn-sm btn-info mx-2 addCategory "><i class="fa fa-plus"></i> Add Category</button>
                  </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#Sl</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Tags</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td> #01 </td>
                            <td> Man </td>
                            <td> This is Man & Children category </td>
                            <td> #man, #children </td>
                            <td> 1 </td>
                            <td> <a href="" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a> 
                                 <button class="btn btn-sm btn-danger" data-toggle="modal" data-target=""> <i class="fa fa-trash"></i> </button> 
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
              </div>
                  
          </div>
        </div>
      </div>
      @endsection