@extends('layouts.company-app')

@section('content')
    <div class="content">

        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ url('company/notification') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('company/show_notification') }}">Notification Management</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add Notification</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Notification</div>
                        </div>
                        <div class="card-body">

                            <form action="add_notification" id="form" method="POST">
                                @csrf

                                <div class="form-group col-md-6">
                                    <label>Title</label>
                                    <input type="text" name="title" id="title" class="form-control">
                                </div>
                                <div>
                                    <span class="text-danger error ">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                        <span>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="editor" placeholder="write text" rows="2">
                                            </textarea>
                                    <span class="text-danger error ">
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>


                                <div class="text-right">
                                    <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                    <a href="{{ url('company/show_notification') }}" class="mt-4 btn btn-danger">Cancel</a>
                                    <div>
                            </form>


                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $("#form").validate({
                                rules: {
                                    title: "required",
                                    // description: "required",
                                },
                                messages: {
                                    title: "Please enter  title.",
                                    // description: "*Please Enter Description.",
                                }
                            });
                        });
                    </script>
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#editor'))
                            .catch(error => {
                                console.error(error);
                            });
                    </script>
                @endsection
