<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">
                <h5>MAIN NAVIGATION</h5>
            </li>
            <li>
                <a class="" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                    <i class="fas fa-th-large text-danger"></i><span class="nav-text">Dashboard</span>
                </a>

            </li>
            <li>
                <a class="" href="{{ route('admin.customer') }}" aria-expanded="false">
                    <i class="fas fa-user text-success"></i><span class="nav-text">Customer List</span>
                </a>
            </li>
            <li>
                <a class="" href="{{ route('admin.cate') }}" aria-expanded="false">
                    <i class="fas fa-bars text-info"></i></i><span class="nav-text">Categories</span>
                </a>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-database text-success"></i><span class="nav-text">Product</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.product') }}">All Products</a></li>
                    <li><a href="{{ route('admin.product-order') }}">Products Order</a></li>
                </ul>
            </li>

            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-shopping-cart text-warning"></i><span class="nav-text">Order</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.all-order') }}">All Orders</a></li>
                    <li><a href="{{ route('admin.pending-order') }}"> Pending Order</a></li>
                    <li><a href="{{ route('admin.success-order') }}">Complete Order</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
