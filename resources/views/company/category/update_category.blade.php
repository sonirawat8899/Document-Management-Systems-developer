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
                    <a href="#">Category Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Category</a>
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
                        <div class="card-title">Edit Category</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('company/edit_category') }}" id="category_edit" method="post"
                            enctype="multipart/form-data">

                            @csrf
                            <input type="hidden" name="id" value="{{ $users->id }}">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Parent Name</label>

                                    <select name="parent_id" class="form-control">
                                        <option value=""> Please Select</option>
                                        <?php foreach($parent_categories as $parent_categories){?>
                                        <option <?php if($users->parent_id == $parent_categories->id){?>selected
                                            <?php } ?> value="{{$parent_categories->id}}">{{$parent_categories->name}}
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $users->name }}"
                                        id="name" placeholder="name">
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
                                        {{ $users->description }} 
                                    </textarea>
                                    <span class="text-danger error ">
                                        @error('description')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>


                            </div>
                            <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Update</button>
                                <a href="{{ url('company/view_category') }}" class="mt-4 btn btn-danger">Cancel</a>
                                <div>


                                </div>
                                <form>


                            </div>
                            <script>
                            $(document).ready(function() {

                                $("#category_edit").validate({
                                    rules: {
                                        parent_id: "required",
                                        name: "required",
                                        // description: "required",
                                        image: "required",
                                        status: "required",
                                    },
                                    messages: {
                                        parent_id: "Update your parent_id",
                                        name: "Update your your Name",
                                        // description: "Update your  description",
                                        image: "Choose image",
                                        status: "Update your Status",

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


                            $("#name").blur(function() {
                                //  alert("aa");
                                var name = $(this).val();
                                id = <?php echo $users->id ?>;
                                console.log(id);
                                $.ajax({
                                    type: "GET",
                                    // url: "/company/checkCompany",
                                    url: "/company/checkName",
                                    data: {
                                        'name': name,
                                        'id': id
                                    },
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
                            @endsection