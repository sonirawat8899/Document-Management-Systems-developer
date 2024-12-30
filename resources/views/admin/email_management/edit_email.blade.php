@extends('layouts.admin-app')

@section('content')
    <div class="content">

        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ url('admin/home') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Email Management</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Email Type</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="flash-message">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="card-title">Edit Email Type</div>
                        </div>
                        <div class="card-body">

                            <form action="{{ url('admin/emailupdate') }}" id="form" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $emailTypes->id }}">
                                <div class="form-group">
                                    <label>Email type</label>
                                    <input type="text" name="email_type" id="email_type" value="{{ $emailTypes->email_type }}"
                                        class="form-control">
                                    <span class="text-danger  ">
                                        @error('email_type')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="mt-4 btn btn-success">Update</button>
                                    <a href="{{ url('admin/show_email') }}" class="mt-4 btn btn-danger">Cancel</a>
                                    <div>
                            </form>

                        </div>
                        <script>
                            $(document).ready(function() {
                                $("#form").validate({
                                    rules: {

                                        email_type: "required",


                                    },
                                    messages: {

                                        email_type: "Please enter  email type",

                                    }

                                });
                            });
                        </script>
                    @endsection
