<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">AdminKit</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li id="dashboard" class="sidebar-item">
                <a class="sidebar-link" href="{{route('admin.Dashboard')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li id="profile" class="sidebar-item">
                <a class="sidebar-link" href="{{route('admin.profile')}}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
            </li>

            <li id="brands" class="sidebar-item">
                <a class="sidebar-link" href="{{route('brands.index')}}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Brands</span>
                </a>
            </li>

            <li id="sliders" class="sidebar-item">
                <a class="sidebar-link" href="{{route('sliders.index')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Slider</span>
                </a>
            </li>

            <li id="categories" class="sidebar-item">
                <a class="sidebar-link" href="{{route('categories.index')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">categories</span>
                </a>
            </li>

            <li id="products" class="sidebar-item">
                <a class="sidebar-link" href="{{route('products.index')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">products</span>
                </a>
            </li>



        </ul>


    </div>
</nav>
