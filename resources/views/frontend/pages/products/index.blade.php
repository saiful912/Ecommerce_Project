@extends('frontend.layouts.frontend_master')
@section('main')
    @include('frontend.pages.products.partials.master_products')
    <div class="pagination justify-content-center">
        {!! $products->links() !!}
    </div>
@stop
