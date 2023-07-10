<ul class="sidebar-nav" id="sidebar-nav" >

  <li class="nav-item active">
    <a class="nav-link" href="/employee/dashboard">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('customer.index') }}">
      <i class="bi bi-person-down"></i>
      <span>Customer</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#order-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-coin"></i><span>Order</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="order-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{  route('order.create') }}">
          <i class="bi bi-circle"></i><span>Add New Order</span>
        </a>
      </li>
      <li>
        <a href="{{  route('order.index') }}">
          <i class="bi bi-circle"></i><span>Order List</span>
        </a>
      </li>
    </ul>
  </li><!-- End order Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#purchase-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-cart-plus"></i><span>Purchase</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="purchase-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{  route('purchase.create') }}">
          <i class="bi bi-circle"></i><span>Add New Purchase</span>
        </a>
      </li>
      <li>
        <a href="{{  route('purchase.index') }}">
          <i class="bi bi-circle"></i><span>Purchase List</span>
        </a>
      </li>
    </ul>
  </li><!-- End purchasing Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#inventory-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-bar-chart"></i><span>Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="inventory-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/employee/inventory">
          <i class="bi bi-circle"></i><span>Inventory List</span>
        </a>
      </li>
      <li>
        <a href="/employee/stockIn">
          <i class="bi bi-circle"></i><span>Stock In History</span>
        </a>
      </li>
      <li>
        <a href="/employee/stockOut">
          <i class="bi bi-circle"></i><span>Stock Out History</span>
        </a>
      </li>
    </ul>
  </li><!-- End inventory Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#supplier-nav" data-bs-toggle="collapse" href="#">
      <i class="bx bxs-business"></i><span>Suppliers</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="supplier-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route ('supplier.index') }}">
          <i class="bi bi-circle"></i><span>Manage Supplier</span>
        </a>
      </li>
      <li>
        <a href="{{ route('product.index') }}">
          <i class="bi bi-circle"></i><span>Manage Product</span>
        </a>
      </li>
    </ul>
  </li><!-- End Supplier Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
      <i class="bx bxs-business"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route ('product.index') }}">
          <i class="bi bi-circle"></i><span>Manage Product</span>
        </a>
      </li>
    </ul>
  </li><!-- End Products Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#shipper-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-truck"></i><span>Shippers</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="shipper-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('shipper.index') }}">
          <i class="bi bi-circle"></i><span>Manage Shipper</span>
        </a>
      </li>
    </ul>
  </li><!-- End shipper Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#transaction-nav" data-bs-toggle="collapse" href="#">
      <i class="bx bx-transfer"></i><span>Transactions</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="transaction-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/employee/transaction">
          <i class="bi bi-circle"></i><span>All Transactions</span>
        </a>
      </li>
      <li>
        <a href="/employee/transaction/order">
          <i class="bi bi-circle"></i><span>Order Transaction</span>
        </a>
      </li>
      <li>
        <a href="/employee/transaction/purchasing">
          <i class="bi bi-circle"></i><span>Purchasing Transaction</span>
        </a>
      </li>
    </ul>
  </li><!-- End transaction Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-list-stars"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="report-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/employee/sale_report">
          <i class="bi bi-circle"></i><span>Sale Report</span>
        </a>
      </li>
      <li>
        <a href="/employee/address/customer">
          <i class="bi bi-circle"></i><span>Customer Address Book</span>
        </a>
      </li>
      <li>
        <a href="/employee/address/employee">
          <i class="bi bi-circle"></i><span>Employee Address Book</span>
        </a>
      </li>
      <li>
        <a href="/employee/address/supplier">
          <i class="bi bi-circle"></i><span>Suppliers Address Book</span>
        </a>
      </li>
      <li>
        <a href="/employee/address/shipper">
          <i class="bi bi-circle"></i><span>Shippers Address Book</span>
        </a>
      </li>
    </ul>
  </li><!-- End Supplier Nav -->
  <li class="nav-heading">Setting</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('setting.index') }}">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('setting.edit',auth()->user()->id) }}">
      <i class="bi bi-card-list"></i>
      <span>Update Profile</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('em_password.edit',auth()->user()->id) }}">
      <i class="bi bi-card-list"></i>
      <span>Update Password</span>
    </a>
  </li>
</ul>

<script>
$(document).ready(function() {
    $( ".nav-item" ).bind( "click", function(event) {
        event.preventDefault();
        var clickedItem = $( this );
        $( ".nav-item" ).each( function() {
            $( this ).removeClass( "active" );
        });
        clickedItem.addClass( "active" );
    });
});
</script>