@extends('backend.layouts.master')
@section('main')
    <div class="mt-4">
        @include('backend.partials._message')
    </div>

    <div class="card mt-3 pl-5">
        <div class="card-header">
            My Profile
        </div>
        <div class="card-body">
            <form action="{{route('admin.profile')}}" method="post" class="form form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" id="name" type="text" class="form-control" placeholder="Enter name"
                           value="{{$admin->name}}">
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input name="phone_number" id="phone_number" type="text" class="form-control"
                           placeholder="Enter phone number" value="{{$admin->phone_number}}">
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="Enter email"
                           value="{{$admin->email}}">
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Update Account
                </button>
            </form>
        </div>
    </div>
    <div class="card mt-3 pl-5">
        <div class="card-header">
            Change Password
        </div>

        <div class="card-body">
            <form action="{{route('admin.password.update')}}" method="post">
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

    <div class="card mt-3 pl-5">
        <div class="card-header">
            Update Image
        </div>

        <div class="card-body">
            <form action="{{route('admin.image.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="old_image">Old Image</label><br>
                    <img src="{!! asset('uploads/images/'.$admin->image) !!}" width="100">
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