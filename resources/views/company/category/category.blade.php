@extends('layouts.company-app')

@section('content')

<div class="content">

    <div class="page-inner">
        <div class="page-header">
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{url('company/home')}}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ url('company/view_category') }}">Category Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Category</a>
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


                        <div class="card-title">Add Category</div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('company/add_category')}}" method="post" id="category"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Parent Name</label>
                                    <select name="parent_id" class="form-control">
                                        <option value=""> Please Select</option>
                                        @foreach($parent_categories as $parent)
                                        <option value="{{$parent->id}}">{{$parent->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">

                                    <span class="text-danger error " id="name_err">
                                        @error('name')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="editor"
                                        placeholder="write text" rows="2">
                                            </textarea>
                                    <span class="text-danger error ">
                                        @error('description')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                    <a href="{{url('company/view_category')}}" class="mt-4 btn btn-danger">Cancel</a>
                                    <div>
                        </form>
                    </div>
                </div>

            </div>

            <script>
            $(document).ready(function() {



                $("#category").validate({
                    rules: {
                        name: "required",
                        // description: "required",
                        image: "required",
                        status: "required",
                    },
                    messages: {

                        name: "Please enter your Name",
                        // description: "Please enter  description",
                        image: "Choose any image",
                        status: "Please enter status",

                    }


                });
            });



            $("#name").blur(function() {
                var name = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "/company/checkName?name=" + name,
                    success: function(response) {
                        console.log(response);
                        if (response == 1) {
                            $('#name_err').text('This Name is already exist');
                            $('#submit').attr('disabled', 'disabled');
                        } else {
                            $('#name_err').text('');
                            $('#submit').removeAttr('disabled');
                        }
                    },
                    error: function(response) {

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
