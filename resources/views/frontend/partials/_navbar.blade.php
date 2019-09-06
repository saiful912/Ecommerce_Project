<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-4  col-md-4 py-4">
                    <h4 class="text-white">Categories</h4>
                    <div class="list-group">
                        @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
                            <div class="parent">
                                <a href="#main-{{$parent->id}}" class="" data-toggle="collapse">
                                    {{$parent->name}}
                                </a>
                            </div>


                    <div class="collapse" id="main-{{$parent->id}}">
                        <div class="child-rows">
                            @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
                            <a href="{{route('categories.show',$child->id)}}" class="d-block" >
                                {{$child->name}}
                            </a>
                                @endforeach
                        </div>
                    </div>
                            @endforeach
                    </div>

                </div>
                <div class="col-sm-4 col-md-4 py-4">
                    <h4 class="text-white">Menu</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{route('products')}}">Products</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href="{{route('home')}}">Home</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-4 py-4 ">
                    <h4 class="text-white">Customer</h4>
                    <ul class="list-unstyled pl-5">
                        @auth()
                            <li><a href="{{route('profile')}}" class="text-white">
                                    Profile ({{optional(auth()->user())->name}})
                                    <img src="{{url('uploads/images',optional(auth()->user())->image)}}" class="img rounded-circle pt-2" width="60px">
                                </a>

                            </li>

                            <li>
                                <a href="{{route('logout')}}" class="text-white">
                                    Logout
                                </a>
                            </li>
                        @endauth
                            @guest()
                                <li><a href="{{route('login')}}" class="text-white">Login</a></li>
                                <li><a href="{{route('register')}}" class="text-white">Register</a></li>
                            @endguest
                        <li>
                           <button class="btn btn-danger mt-2">
                               <a href="{{route('carts')}}" class="font-weight-bold">
                                   <span>Your Cart</span>
                                   <span class="badge badge-danger" id="totalItems">
                                    {{--{{App\Models\Cart::totalItems()}}--}}
                                       {{(new App\Models\Cart)->totalItems()}}
                                   </span>
                               </a>

                           </button>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm fixed-top">
        <div class="container d-flex justify-content-between">
            <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                <strong>{{config('app.name')}}</strong>
            </a>
                <form class="form-inline my-2 my-lg-0 ml-lg-5" action="{{route('search')}}" method="get">
                    <input class="form-control mr-sm-2 w-auto" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>