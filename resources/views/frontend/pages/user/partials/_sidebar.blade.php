

<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li><a href="{{route('profile')}}" class="text-white pl-3">
                    <img src="{{url('uploads/images',optional(auth()->user())->image)}}" class="img rounded-circle pt-2" width="100px">
                </a>
            </li>
            <li class="pt-2 pl-2 font-weight-bold">{{optional(auth()->user())->email}}</li>
        </ul>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">
                    <span data-feather="home"></span>
                    Home
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="">
                    <span data-feather="user"></span>
                    My Profile
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="">
                    <span data-feather="file"></span>
                    Orders
                </a>
            </li>
        </ul>
    </div>
</nav>