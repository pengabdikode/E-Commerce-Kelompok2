@extends('adminlayout.admin_design')
@section('content')
<?php
$a=1;
?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Products</a> <a href="#" title="Go to Home" class="current"> View Products</a></div>
    <h1>Products</h1>
     @if(Session::has('flash_message_error'))
            <div class="alert alert-danger" role="alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
           <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif    
         @if(Session::has('flash_message_success'))
            <div class="alert alert-success" role="alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
           <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif      
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Products</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Brand</th>
                  <th>Category</th>
                  <th>Product Image</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($product as $products)
                <tr class="gradeX">
                  <td>{{ $a++ }}</td>
                  <td>{{ $products->name }}</td>
                  <td>{{ $products->harga }}</td>
                  <td>{{ $products->brand->name }}</td>
                  <td>{{ $products->category->name }}</td>
                  <td><img src="{{asset('data_file/'.$products->foto)}}" width="100px" height="100px"></td>
                  <td>{{ $products->description }}</td>
                  <td><?php if($products->status==1){
                    echo"Available";
                  }else{
                    echo"Unavailable";
                  } 
                  ?></td>
                  <td class="center"><a href="{{url ('/admin/edit-product/'.$products->id) }}" class="btn btn-primary btn-mini">Edit</a>  <a href="{{url ('/admin/delete-product/'.$products->id) }}" class="deletebtn btn btn-danger btn-mini">Delete</a></td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection