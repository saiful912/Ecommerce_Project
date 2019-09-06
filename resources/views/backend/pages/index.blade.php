@extends('backend.layouts.master')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Users Orders
                </div>
                <div class="card-body">
                    @include('backend.partials._message')
                    <table class="table table-bordered table-hover" id="dataTable">

                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>Ordered Name</th>
                            <th>Ordered Email</th>
                            <th>Ordered Phone No</th>
                            <th>Ordered Shipping Address</th>
                        </tr>


                        @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>#LE{{ $order->id }}</td>
                                <td>{{ $order->name}}</td>
                                <td>{{ $order->email}}</td>
                                <td>{{ $order->phone_no}}</td>
                                <td>{{ $order->shipping_address}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="container-fluid clearfix">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018 <a
                            href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                            class="mdi mdi-heart text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@stop