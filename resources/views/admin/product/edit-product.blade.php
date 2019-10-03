@extends('adminlayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Product</a> <a href="#" class="current">Edit Product</a> </div>
    <h1>Product</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url ('/admin/edit-product/'.$productDetails->id) }}" name="edit_product" id="edit_product" novalidate="novalidate" enctype="multipart/form-data">
            	@csrf
               <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name" value="{{ $productDetails->name }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                  <input type="text" name="product_price" id="product_price" value="{{ $productDetails->harga}}">
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Category</label>
              <div class="controls">
                  <select style="width: 200px;" name="product_category" id="product_category">
      
                  @foreach($levels as $lev)
                  <option value="{{ $lev->id }}"
                  <?php if($productDetails->id_category ==$lev->id ){echo "selected";} ?> >{{ $lev->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Status</label>
              <div class="controls">
                  <select style="width: 200px;" name="status_product" id="product_category">
      
                  @if($productDetails->status == 1)
                  <option value="1" selected>Available</option>
                  <option value="0">Unavailable</option>
                  @else
                  <option value="0" selected>Unavailable</option>
                  <option value="1">Available</option>
                  @endif
                </select>
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">Brand</label>
              <div class="controls">
                  <select style="width: 200px;" name="product_brand" id="product_brand">
                  @foreach($brands as $br)
                  <option value="{{ $br->id }}" <?php if($productDetails->id_brand ==  $br->id ){ echo "selected"; }?>>{{ $br->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

              <div class="control-group">
                <label class="control-label">Photo</label>
                <div class="controls">
                  <img src="{{asset('data_file/'.$productDetails->foto)}}" width="100px" height="100px">
                  <input type="file" name="photo_product" id="photo_product"/>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Product Description</label>
                <div class="controls">
                  <textarea name="product_description" id="product_description"> {{ $productDetails->description }}</textarea>
                </div>
              </div>
           
              <div class="form-actions">
                <input type="submit" value="Edit Category" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


@endsection