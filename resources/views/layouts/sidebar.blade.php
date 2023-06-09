<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{url('/home')}}">
            <span class="align-middle">AdminKit</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
            <li class="sidebar-item {{Route::is('home') ? 'active': ''}}">
                <a class="sidebar-link" href="{{url('/home')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item {{Route::is('category.create') ? 'active': ''}}">
                <a class="sidebar-link" href="{{url('/category')}}">
                    <i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Category</span>
                </a>
            </li>
        </ul>
    </div>
</nav>