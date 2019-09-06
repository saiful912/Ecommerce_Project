@extends('frontend.layouts.frontend_master')
@section('title')
    {{$product->title}} | Village Bazaar Project
@endsection
@section('main')
    <main role="main">
        <div class="container">

            <br>
            <p class="text-center mb-5">Product Title</p>
            <hr>
            @include('frontend.partials._message')
            <div class="card">
                <div class="row">
                    <aside class="col-sm-5 border-right">
                        <article class="gallery-wrap">
                            @foreach($product->images as $image)
                            <div>
                                <img class="card-img-top" src="{!! asset('images/products/'.$image['image']) !!}" alt="{{$product->title}}">
                            </div><!-- slider-product.// -->
                                @endforeach
                        </article> <!-- gallery-wrap .end// -->
                    </aside>

                    <aside class="col-sm-7">
                        <article class="card-body p-5">
                            <div class="brand d-flex">
                            <h3 class="title mb-3">{{$product->title}}</h3>
                                <p class="pl-5 pt-1">Category <span class="badge badge-info">{{$product->category->name}}</span> </p>
                                <p class="pl-5 pt-1">Brand <span class="badge badge-info">{{$product->brand->name}}</span> </p>
                            </div>

                            <p class="price-detail-wrap">
                            <span class="price h3 text-warning">
                                <span class="currency">Price : </span>
                                <span class="num">
                                    BDT : {{$product->price}}Tk
                                </span>
                            </span>
                            </p> <!-- price-detail-wrap .// -->
                            <h4> Stock :
                                <span class="badge badge-primary">
                                    {{$product->quantity < 1 ? 'No item is available' : $product->quantity.' item in stock'}}
                                </span>
                            </h4>

                            <dl class="item-property">
                                <dt>Description</dt>
                                <dd><p>{{$product->description}}</p></dd>
                            </dl>
                            <hr>
                                @include('frontend.pages.products.partials.cart_button')
                        </article> <!-- card-body.// -->
                    </aside> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- card.// -->

        </div>
        <!--container.//-->
    </main>
@endsection