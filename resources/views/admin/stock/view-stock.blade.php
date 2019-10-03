@extends('adminlayout.admin_design')
@section('content')
<?php
$a=1;
?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Stock</a> <a href="#" title="Go to Home" class="current"> View Stock</a></div>
    <h1>Stock</h1>
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
            <h5>View Stock</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Product Name</th>
                  <th>Size</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($stock as $sto)
                <tr class="gradeX">
                  <td>{{ $a++ }}</td>
                  <td>{{ $sto->product->name }}</td>
                  <td>{{ $sto->size }}</td>
                  <td>{{ $sto->amount }}</td>
                  <td class="center"><a href="{{url ('/admin/edit-stock/'.$sto->id) }}" class="btn btn-primary btn-mini">Edit</a>  <a href="{{url ('/admin/delete-stock/'.$sto->id) }}" class="deletebtn btn btn-danger btn-mini">Delete</a></td>
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