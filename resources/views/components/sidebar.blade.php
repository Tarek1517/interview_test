<div class="center-item">
    <ul class="menu-list">
        <li
            class="menu-item has-children {{ Route::currentRouteName() == 'add.product' || Route::currentRouteName() == 'product.list' ? 'active' : '' }}"">
            <a href="javascript:void(0);" class="menu-item-button">
                <div class="icon"><i class="icon-shopping-cart"></i></div>
                <div class="text">Products</div>
            </a>
            <ul class="sub-menu">
                <li class="sub-menu-item">
                    <a href="{{ route('add.product') }}"
                        class="{{ Route::currentRouteName() == 'add.product' ? 'active' : '' }}">
                        <div class="text">Add Product</div>
                    </a>
                </li>
                <li class="sub-menu-item">
                    <a href="{{ route('product.list') }}"
                        class="{{ Route::currentRouteName() == 'product.list' ? 'active' : '' }}">
                        <div class="text">Products</div>
                    </a>
                </li>
            </ul>
        </li>

        <li
            class="menu-item has-children {{ Route::currentRouteName() == 'add.category' || Route::currentRouteName() == 'category.list' ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-item-button">
                <div class="icon"><i class="icon-layers"></i></div>
                <div class="text">Category</div>
            </a>
            <ul class="sub-menu">
                <li class="sub-menu-item">
                    <a href="{{ route('add.category') }}"
                        class="{{ Route::currentRouteName() == 'add.category' ? 'active' : '' }}">
                        <div class="text">Add Category</div>
                    </a>
                </li>
                <li class="sub-menu-item">
                    <a href="{{ route('category.list') }}"
                        class="{{ Route::currentRouteName() == 'category.list' ? 'active' : '' }}">
                        <div class="text">Categories</div>
                    </a>
                </li>
            </ul>
        </li>


    </ul>
</div>
