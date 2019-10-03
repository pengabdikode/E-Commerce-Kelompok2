@extends('adminlayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Monetary</a> <a href="#" class="current">Edit Bank</a> </div>
    <h1>Banks</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Bank</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/monetary-editBank/'.$bank->id) }}" name="bank" id="bank" novalidate="novalidate">
            	@csrf
              <div class="control-group">
                <label class="control-label">Bank Name</label>
                <div class="controls">
                  <input type="text" name="bank_name" id="bank_name" value="{{ $bank->name }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Code</label>
                <div class="controls">
                  <input type="text" name="bank_code" id="bank_code" value="{{ $bank->code }}"> 
                </div>
              </div>
           
              <div class="form-actions">
                <input type="submit" value="Edit Bank" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection