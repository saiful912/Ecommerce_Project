<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title> @yield('title','Village Bazaar Project')</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/style.css') }}" rel="stylesheet">
    <link href="{{asset('css/alertify.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/alertify_bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
@include('frontend.partials._navbar')

<main role="main">
    @yield('main')

</main>
@include('frontend.partials._footer')

{{--js--}}
<script src="{{mix('js/app.js')}}"></script>
<script src="{{asset('js/alertify.min.js')}}"></script>
@yield('scripts')
{{--jquery addtocart--}}
<script>
    $.ajaxSetup({
        headers:
            {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    function addToCart(product_id) {
        $.post("http://final_project.test/carts/store",
            {
                product_id: product_id
            })
            .done(function (data) {
                data = JSON.parse(data);
                if (data.status == 'success') {
                    //toast
                    alertify.set('notifier', 'position', 'left-center');
                    alertify.success('Item Added To Cart Successfully !! Total Items: ' + data.totalItems
                        + '<br> To Checkout <a href="{{route('carts')}}">go to Checkout page</a>');
                    $("#totalItems").html(data.totalItems);
                }
            });
    }
</script>
</body>
</html>