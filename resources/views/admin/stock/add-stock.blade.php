@extends('adminlayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Stock</a> <a href="#" class="current">Add Stock</a> </div>
    <h1>Stock</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Stock</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/add-stock') }}" name="add_stock" id="add_stock" novalidate="novalidate" enctype="multipart/form-data">
            	@csrf
              <div class="control-group">
                <label class="control-label">Product Name</label>
                 <div class="controls">
                  <select style="width: 200px;" name="product_id" id="product_id">
                  <option>Choose The Product</option>
                  @foreach($product as $pro)
                  <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                  @endforeach
                  </select>
                 </div>
              </div>

              <div class="control-group">
                <label class="control-label">Size</label>
                <div class="controls">
                  <input type="text" name="size" id="size">
                </div>
              </div>

            <div class="control-group">
              <label class="control-label">Amount</label>
               <div class="controls">
                  <input type="text" name="amount" id="amount">
                </div>
              </div>
            </div>
           
              <div class="form-actions">
                <input type="submit" value="Add Stock" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection