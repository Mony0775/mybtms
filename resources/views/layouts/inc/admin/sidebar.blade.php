<ul class="sidebar-nav" id="sidebar-nav" >

  <li class="nav-item">
    <a class="nav-link" href="/admin/dashboard">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('customers.index') }}">
      <i class="bi bi-person-down"></i>
      <span>Customer</span>
    </a>
  </li><!-- End Customer Nav -->
  <!-- <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#customer-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person-down"></i><span>Customer</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="customer-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('customers.index') }}">
          <i class="bi bi-circle"></i><span>Manage Customer</span>
        </a>
      </li>
    </ul>
  </li>End customer Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#employee-nav" data-bs-toggle="collapse" href="#">
      <i class="bx bx-id-card"></i><span>Employee</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="employee-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('employees.index') }}">
          <i class="bi bi-circle"></i><span>Manage Employee</span>
        </a>
      </li>
      <li>
        <a href="/admin/employee/order">
          <i class="bi bi-circle"></i><span>Employee Order</span>
        </a>
      </li>
      <li>
        <a href="/admin/employee/purchase">
          <i class="bi bi-circle"></i><span>Employee Purchase</span>
        </a>
      </li>
    </ul>
  </li><!-- End employee Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#order-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-coin"></i><span>Order</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="order-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{  route('orders.create') }}">
          <i class="bi bi-circle"></i><span>Add New Order</span>
        </a>
      </li>
      <li>
        <a href="{{  route('orders.index') }}">
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
        <a href="{{  route('purchases.create') }}">
          <i class="bi bi-circle"></i><span>Add New Purchase</span>
        </a>
      </li>
      <li>
        <a href="{{  route('purchases.index') }}">
          <i class="bi bi-circle"></i><span>Purchase List</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="bi bi-circle"></i><span>Approval Purchase</span>
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
        <a href="/admin/inventories">
          <i class="bi bi-circle"></i><span>Inventory List</span>
        </a>
      </li>
      <li>
        <a href="/admin/stockOut">
          <i class="bi bi-circle"></i><span>Stock Out History</span>
        </a>
      </li>
      <li>
        <a href="/admin/stockIn">
          <i class="bi bi-circle"></i><span>Stock In History</span>
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
        <a href="{{ route ('suppliers.index') }}">
          <i class="bi bi-circle"></i><span>Manage Supplier</span>
        </a>
      </li>
      <li>
        <a href="{{ route('products.index') }}">
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
        <a href="{{ route ('products.index') }}">
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
        <a href="{{ route('shippers.index') }}">
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
        <a href="/admin/transactions">
          <i class="bi bi-circle"></i><span>All Transactions</span>
        </a>
      </li>
      <li>
        <a href="/admin/transactions/order">
          <i class="bi bi-circle"></i><span>Order Transaction</span>
        </a>
      </li>
      <li>
        <a href="/admin/transactions/purchasing">
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
        <a href="/admin/sale_report">
          <i class="bi bi-circle"></i><span>Sale Report</span>
        </a>
      </li>
      <li>
        <a href="/admin/address/customers">
          <i class="bi bi-circle"></i><span>Customer Address Book</span>
        </a>
      </li>
      <li>
        <a href="/admin/address/employees">
          <i class="bi bi-circle"></i><span>Employee Address Book</span>
        </a>
      </li>
      <li>
        <a href="/admin/address/suppliers">
          <i class="bi bi-circle"></i><span>Suppliers Address Book</span>
        </a>
      </li>
      <li>
        <a href="/admin/address/shippers">
          <i class="bi bi-circle"></i><span>Shippers Address Book</span>
        </a>
      </li>
    </ul>
  </li><!-- End Supplier Nav -->
  <li class="nav-heading">Setting</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('settings.index') }}">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('settings.edit',auth()->user()->id) }}">
      <i class="bi bi-card-list"></i>
      <span>Update Profile</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('passwords.edit',auth()->user()->id) }}">
      <i class="bi bi-card-list"></i>
      <span>Update Password</span>
    </a>
  </li>


</ul>