@extends('frontend.layouts.frontend_master')
@section('main')
    <div class="widget mt-5">
        <h3 class="text-center pt-5">Product in <span class="badge badge-info">{{$category->name}} Category</span></h3>
        @php
            $products=$category->products()->get();
        @endphp

        @if($products->count() > 0)
            @include('frontend.pages.category.partials.master_products')
        @else
            <div class="alert alert-warning">
                No Products has added yet in this category |
            </div>
        @endif
    </div>
@stop