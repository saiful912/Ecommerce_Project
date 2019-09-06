@extends('frontend.layouts.frontend_master')
@section('main')
    {{--start sidebar+content--}}
    <div class="container">
        <h3 class="text-center mt-5 pt-3">Search Products For- <span class="badge badge-primary">{{$search}}</span></h3>
        @include('frontend.partials._message')
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        @php $i = 1; @endphp
                        @foreach($product->images as $image)
                            @if($i>0)
                                <a href="{{route('products.show',$product->slug)}}">
                                    <img class="card-image-top h-100 w-100" src="{{asset('images/products/'.$image->image)}}"
                                         alt="{{$product->title}}">
                                </a>
                            @endif
                            @php $i--; @endphp
                        @endforeach

                        <div class="card-body">
                            <h3 class="card-text">
                                <a href="{{route('products.show',$product->slug)}}">{{$product->title}}</a>
                            </h3>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    @include('frontend.pages.products.partials.cart_button')
                                </div>
                                <span class="text-black-50">
                                        BDT- <strong> {{$product->price}}</strong>
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{--<div class="pagination justify-content-center">--}}
        {{--{!! $products->links() !!}--}}
        {{--</div>--}}
    </div>
@stop