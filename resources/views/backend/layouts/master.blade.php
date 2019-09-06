<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Star Admin Page</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/admin_style.css')}}">
        <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
        <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
@include('backend.partials._nav')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
    @include('backend.partials._leftbar')
    <!-- partial -->
        <!-- main-panel ends -->
        @yield('main')
    </div>
    <!-- page-body-wrapper ends -->
</div>

<!-- plugins:js -->
<script src="{{mix('js/app.js')}}"></script>
<script src="{{ asset('js/data-table.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
</body>

</html>