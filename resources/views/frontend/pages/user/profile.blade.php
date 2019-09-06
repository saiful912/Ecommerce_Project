@extends('frontend.pages.user._master')
@section('main')
        @include('frontend.pages.user.partials._message')
    <div class="card pt-4">
        <div class="card-header">
            My Profile
        </div>
        <div class="card-body">
            <form action="{{route('profile')}}" method="post" class="form form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" id="name" type="text" class="form-control" placeholder="Enter name"
                           value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="phone_no">Phone Number</label>
                    <input name="phone_no" id="phone_no" type="text" class="form-control"
                           placeholder="Enter phone number" value="{{ $user->phone_no}}">
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="Enter email"
                           value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input name="address" id="address" type="text" class="form-control" placeholder="Enter Address"
                           value="{{ $user->address }}">
                </div>
                <div class="form-group row">
                    <label for="division_id" class="pl-3 pt-2">Division</label>
                    <div class="col-md-4">
                        <select class="form-control" name="division_id" id="division_id">
                            <option value="">Select division</option>
                            @foreach($divisions as $division)
                                <option value="{{$division->id}}"{{$user->division_id==$division->id?'selected':''}}>{{$division->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="district_id" class="pl-5 pt-2">District</label>
                    <div class="col-md-4">
                        <select class="form-control" name="district_id" id="district-area">
                            <option value="">Select District</option>
                            @foreach($districts as $district)
                                <option value="{{$district->id}}"{{$user->district_id==$district->id? 'selected':''}}>{{$district->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Update Account
                </button>
            </form>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            Change Password
        </div>

        <div class="card-body">
            <form action="{{route('password.update')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input name="old_password" type="password" class="form-control" id="old_password" required>
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Change Password
                </button>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Update Image
        </div>

        <div class="card-body">
            <form action="{{route('image.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="old_image">Old Image</label><br>
                    <img src="{!! asset('uploads/images/'.$user->image) !!}" width="100">
                </div>

                <div class="form-group">
                    <label for="new_image">New Image</label>
                    <input type="file" class="form-control" name="image" id="new_image">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Change Image
                </button>
            </form>
        </div>
    </div>
@stop