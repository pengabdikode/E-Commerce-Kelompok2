@extends('adminlayout.admin_design')
@section('content')
<?php
$a=1;
?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Monetary</a> <a href="#" title="Go to Home" class="current"> View Income</a></div>
    <h1>Income</h1>
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
            <h5>View Income</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>User</th>
                  <th>Payment Method</th>
                  <th>Bank</th>
                  <th>Amount Money</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($income as $incomes)
                <tr class="gradeX">
                  <td>{{ $a++ }}</td>
                  <td>{{ $incomes->id_user }}</td>
                  <td>{{ $incomes->payment_method }}</td>
                  <td>{{ $incomes->id_bank }}</td>
                  <td>{{ $incomes->amount }}</td>
                  <td>{{ $incomes->status }}</td>
                  <td class="center"><a href="{{url ('/admin/edit-transaction/'.$transc->id) }}" class="btn btn-primary btn-mini">Edit</a></td>
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