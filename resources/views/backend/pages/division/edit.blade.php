@extends('backend.layouts.master')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Edit District
                </div>
                <div class="card-body">
                    @include('backend.partials._message')
                    <form action="{{route('admin.division.update',$division->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @include('backend.partials._message')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$division->name}}">
                        </div>

                        <div class="form-group">
                            <label for="priority">Priority</label>
                            <input type="text" class="form-control" name="priority" id="priority" value="{{$division->priority}}">
                        </div>

                        <button type="submit" class="btn btn-success">Update </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop