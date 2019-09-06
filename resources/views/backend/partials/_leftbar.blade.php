<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image"> <img src="{{url('uploads/images',optional(auth('admin')->user())->image)}}" alt="image"/> <span class="online-status online"></span> </div>
                <div class="profile-name">
                    <p class="name">{{optional(auth('admin')->user())->type}}</p>
                    <p class="designation">{{optional(auth('admin')->user())->name}}</p>
                    <p class="designation">{{optional(auth('admin')->user())->email}}</p>
                    <div class="badge badge-teal mx-auto mt-3">
                        <a href="https://mail.google.com/mail/u/0/#inbox" class="text-white text-decoration-none">Email</a>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{route('admin.index')}}"><img class="menu-icon" src="{{asset('images/menu_icons/01.png')}}" alt="menu icon"><span class="menu-title">Dashboard</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('admin.profile')}}"><img class="menu-icon" src="{{asset('images/faces-clipart/pic-1.png')}}" alt="menu icon"><span class="menu-title">Profile Manage</span></a></li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="{{asset('images/menu_icons/08.png')}}" alt="menu icon"> <span class="menu-title">Products</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.products')}}">Manage Products</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.product.create')}}">Add Products</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#orders-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="{{asset('images/menu_icons/08.png')}}" alt="menu icon"> <span class="menu-title">Orders</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="orders-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.orders')}}">Manage Orders</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#categories-pages" aria-expanded="false" aria-controls="categories-pages"> <img class="menu-icon" src="{{asset('images/menu_icons/08.png')}}" alt="menu icon"> <span class="menu-title">Categories</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="categories-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.categories')}}">Manage Categories</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.categories.create')}}">Add Categories</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#brands-pages" aria-expanded="false" aria-controls="brands-pages"> <img class="menu-icon" src="{{asset('images/menu_icons/08.png')}}" alt="menu icon"> <span class="menu-title">Brands</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="brands-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.brands')}}">Manage Brands</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.brands.create')}}">Add Brands</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#division-pages" aria-expanded="false" aria-controls="brands-pages"> <img class="menu-icon" src="{{asset('images/menu_icons/05.png')}}" alt="menu icon"> <span class="menu-title">Divisions</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="division-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.divisions')}}">Manage Division</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.divisions.create')}}">Add Division</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#districts-pages" aria-expanded="false" aria-controls="brands-pages"> <img class="menu-icon" src="{{asset('images/menu_icons/05.png')}}" alt="menu icon"> <span class="menu-title">Districts</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="districts-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.districts')}}">Manage District</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.districts.create')}}">Add District</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#sliders-pages" aria-expanded="false" aria-controls="brands-pages"> <img class="menu-icon" src="{{asset('images/menu_icons/05.png')}}" alt="menu icon"> <span class="menu-title">Sliders</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="sliders-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.sliders')}}">Manage Slider</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#districts-pages">
                <form class="form-inline" action="{{route('admin.logout')}}" method="post">
                    @csrf
                    <input type="submit" value="Logout Now" class="btn btn-danger">
                </form>
            </a>
        </li>
    </ul>
</nav>