@extends('layouts.company-app')

@section('content')
    <div class="content">

        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ url('company/home') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('company/show_email') }}">Email Management</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add Email Type</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Email Type</div>
                        </div>
                        <div class="card-body">
                            <form action="add_email" id="form" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>Email Type</label>
                                    <input type="text" name="email_type" id="email_type" class="form-control">
                                    <span class="text-danger  ">
                                        @error('email_type')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                    <a href="{{ url('company/show_email') }}" class="mt-4 btn btn-danger">Cancel</a>
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

                                        email_type: "*Update  email type",
                                    }

                                });
                            });
                        </script>
                    @endsection
