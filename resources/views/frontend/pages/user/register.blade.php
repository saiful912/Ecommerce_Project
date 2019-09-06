@extends('frontend.layouts.frontend_master')
@section('main')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="well">
                    <h3 class="text-center mt-4">Register Your Account</h3>

                    @include('frontend.partials._message')

                    <form action="{{ route('register') }}" method="post" class="form form-horizontal"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" id="name" type="text" class="form-control" placeholder="Enter name"
                                   value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="phone_no">Phone Number</label>
                            <input name="phone_no" id="phone_no" type="text" class="form-control"
                                   placeholder="Enter phone number" value="{{ old('phone_no') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input name="email" id="email" type="email" class="form-control" placeholder="Enter email"
                                   value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" id="password" type="password" class="form-control"
                                   placeholder="Enter password">
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input name="password_confirmation" id="confirm_password" type="password"
                                   class="form-control" placeholder="Enter password again">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input name="address" id="address" type="text" class="form-control"
                                   placeholder="Enter Address" value="{{ old('address') }}">
                        </div>
                        <div class="form-group row">
                            <label for="division_id" class="pl-3 pt-2">Division</label>
                            <div class="col-md-4">
                                <select class="form-control" name="division_id" id="division_id">
                                    <option value="">Select division</option>
                                    @foreach($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="division_id" class="pl-3 pt-2">District</label>
                            <div class="col-md-4">
                                    <select class="form-control" name="district_id" id="district-area">
                                    </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="image">Profile Image</label>
                            <input name="image" id="image" type="file" class="form-control" placeholder="Enter Image"
                                   value="{{ old('image') }}">
                        </div>


                        <button type="submit" class="btn btn-primary btn-block">
                            Register
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $("#division_id").change(function () {
            var division = $("#division_id").val();
            //send an ajax request to server with this division
            $("#district-area").html("");
            var option="";
            $.get("http://final_project.test/get-districts/"+division,
                function (data) {
                    data = JSON.parse(data);
                   data.forEach(function (element) {
                       option += "<option value='"+ element.id +"'>"+ element.name +"</option>";
                   });
                    $("#district-area").html(option);
                });
        })
    </script>
@stop
