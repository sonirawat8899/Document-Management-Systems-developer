@extends('layouts.user-app')

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ url('user/home') }}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ url('user/view_content') }}">Content Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Content</a>
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
                        <div class="card-title">Edit Content</div>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('user/edit_content') }}" method="post" id="content"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $cms->id }}">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="title"
                                        value="{{ $cms->title }}">
                                    <span class="text-danger error">
                                        @error('title')
                                        {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                                <div class="form-group col-md-6"></div>
                                <div class="form-group col-md-12">

                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="editor"
                                        placeholder="write text" rows="2">{{ $cms->description }}
                                            </textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlFile1">Image</label>
                                    <input type="file" class="form-control-file" name="image"
                                        value="{{ $cms->image }}" id="image">
                                    <img src="{{ asset('cms/' . $cms->image) }}" style="height: 50px;width:100px;">
                                    <span class="text-danger error ">
                                        @error('image')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>


                                <div class="text-right">
                                    <button type="submit" class="mt-4 btn btn-success">Update</button>
                                    <a href="{{ url('user/view_content') }}" class="mt-4 btn btn-danger">Cancel</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $("#content").validate({
        rules: {

            title: "required",
            // status: "required",
            // description: "required",
            //     image: {
            //    extension: "png|jpeg|jpg|gif"                      
            //   },
        },
        messages: {


            title: "*Please enter your title",
            //status: "Please select Status",
            // description: "Please enter  description",
            // image:{ extension: "Only PNG , JPEG , JPG, GIF File Allowed",},

        }

    });
});
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
</script>
@endsection