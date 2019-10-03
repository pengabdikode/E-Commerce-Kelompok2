@extends('adminlayout.admin_design')
@section('content')
<?php
$a=1;
?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Monetary</a> <a href="#" title="Go to Home" class="current"> View Bank</a></div>
    <h1>Banks</h1>
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
     <a href="{{url ('/admin/monetary-addBank') }}" class="btn btn-primary btn-mini">Add Bank</a>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Banks</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Bank</th>
                  <th>Code</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($bank as $banks)
                <tr class="gradeX">
                  <td>{{ $a++ }}</td>
                  <td>{{ $banks->name }}</td>
                  <td>{{ $banks->code }}</td>
                  <td class="center"><a href="{{url ('/admin/monetary-editBank/'.$banks->id) }}" class="btn btn-primary btn-mini">Edit</a><a href="{{url ('/admin/monetary-deleteBank/'.$banks->id) }}" class="deletebtn btn btn-danger btn-mini">Delete</a></td>
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