@extends('adminlayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Product</a> <a href="#" class="current">Add Products</a> </div>
    <h1>Product</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/add-product') }}" name="add_product" id="add_product" novalidate="novalidate" enctype="multipart/form-data">
            	@csrf
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                  <input type="text" name="product_price" id="product_price">
                </div>
              </div>

            <div class="control-group">
              <label class="control-label">Category</label>
              <div class="controls">
                  <select style="width: 200px;" name="product_category" id="product_category">
                  <option>Choose The Category</option>
                  @foreach($levels as $lev)
                  <option value="{{ $lev->id }}">{{ $lev->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">Brand</label>
              <div class="controls">
                  <select style="width: 200px;" name="product_brand" id="product_brand">
                  <option>Choose The Brand</option>
                  @foreach($brands as $br)
                  <option value="{{ $br->id }}">{{ $br->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

              <div class="control-group">
                <label class="control-label">Photo</label>
                <div class="controls">
                  <input type="file" name="photo_product" id="photo_product"/>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Product Description</label>
                <div class="controls">
                  <textarea name="product_description" id="product_description"> </textarea>
                </div>
              </div>
           
              <div class="form-actions">
                <input type="submit" value="Add Product" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection