<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li><a href="{{ url('/admin/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
     <li class="submenu"> <a href="#"><i class="icon icon-tag"></i> <span>Categories</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('admin/add-category') }}">Add Categories</a></li>
        <li><a href="{{ url('admin/view-category') }}">View Categories</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-star"></i> <span>Brand</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('admin/add-brand') }}">Add Brand</a></li>
        <li><a href="{{ url('admin/view-brand') }}">View Brand</a></li>
      </ul>
    </li>
     <li class="submenu"> <a href="#"><i class="icon icon-barcode"></i> <span>Product</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('admin/add-product') }}">Add Product</a></li>
        <li><a href="{{ url('admin/view-product') }}">View Product</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-list-alt"></i> <span>Stock</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('admin/add-stock') }}">Add Stock</a></li>
        <li><a href="{{ url('admin/view-stock') }}">View Stock</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-signal"></i> <span>Monetary</span> <span class="label label-important">3</span></a>
      <ul>
        <li><a href="{{ url('/admin/monetary-viewTransaction') }}">Transaction</a></li>
        <li><a href="{{ url('admin/view-stock') }}">Income</a></li>
        <li><a href="{{ url('/admin/monetary-viewBank') }}">Bank</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--sidebar-menu-->
