@extends('adminlayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Brands</a> <a href="#" class="current">Edit Brand</a> </div>
    <h1>Brands</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Brand</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url ('/admin/edit-brand/'.$brandDetails->id) }}" name="edit_brand" id="edit_brand" novalidate="novalidate" enctype="multipart/form-data">
            	@csrf
              <div class="control-group">
                <label class="control-label">Brand Name</label>
                <div class="controls">
                  <input type="text" name="brand_name" id="brand_name" value="{{ $brandDetails->name }}">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Brand Description</label>
                <div class="controls">
                  <textarea name="brand_description" id="brand_description">{{ $brandDetails->description }}</textarea> 
                </div>
              </div>

               <div class="control-group">
                <label class="control-label">Logo</label>
                <div class="controls">
                  <img src="{{asset('data_file/'.$brandDetails->logo)}}" width="100px" height="100px">
                  <input type="file" name="logo_brand" id="logo_brand"/>
                </div>
              </div>

               <div class="control-group">
                <label class="control-label">URL</label>
                <div class="controls">
                  <input type="text" name="url" id="url" value="{{ $brandDetails->url }}">
                </div>
              </div>
           
              <div class="form-actions">
                <input type="submit" value="Edit Brand" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


@endsection