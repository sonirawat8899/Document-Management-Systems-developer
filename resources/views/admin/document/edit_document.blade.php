@extends('layouts.admin-app')

@section('content')

<div class="content">

    <div class="page-inner">
        <div class="page-header">
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{url('admin/home')}}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                <a href="{{url('admin/document')}}">Document Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Document</a>
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
                            
                        <div class="card-title">Edit Document </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/update_document') }}" method="post" id="update" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $users->id }}">
                            <div class="form-row">
                               <div class="form-group col-md-6">
                                <label><b>Project Name</b></label>
                                <select name="project_id" class="form-control">
                                        <option value=""> Please Select</option>
                                        <?php foreach($project_documents as $project_documents){?>
                                        <option <?php if($users->project_id == $project_documents->id){?>selected 
                                            <?php } ?> value="{{$project_documents->id}}">{{$project_documents->project_name}}
                                        </option>
                                        <?php }?>
                                    </select>

                                <span class="text-danger  ">
                                    @error('project_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>



                            <div class="form-group col-md-6">
                                <label><b>Category Name</b></label>
                                <select name="category_id" class="form-control">
                                        <option value=""> Please Select</option>
                                        <?php foreach($category_documents as $category_documents){?>
                                        <option <?php if($users->category_id == $category_documents->id){?>selected <?php } ?> value="{{$category_documents->id}}">{{$category_documents->name}}</option>
                                        <?php }?>
                                    </select>
                                <span class="text-danger">
                                    @error('category_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>



                            <div class="form-group col-md-6">
                                <label><b>Document Type </b></label>

                                <select name="document_type_id" class="form-control">
                                        <option value=""> Please Select</option>
                                        <?php foreach($document_type as $document_type){?>
                                        <option <?php if($users->document_type_id == $document_type->id){?>selected <?php } ?> value="{{$document_type->id}}">{{$document_type->name}}</option>
                                        <?php }?>
                                    </select>
                                
                                    @error('document_type_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group col-md-12">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="editor" placeholder="write text" rows="2">
                                        {{ $users->description }}  </textarea>
                                        <span class="text-danger error ">
                                            @error('description')
                                                {{ $message }}
                                            @enderror
                                        </span>
                             </div>
                          

                            <div class="form-group col-md-6">
                                <label><b>Title</b></label>
                                <input type="text" name="title" id="title" value="{{ $users->title }}"
                                    class="form-control">
                                <span class="text-danger  ">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="form-group  col-md-6">
                                <label for="exampleFormControlFile1"> Upload document</label>
                                <input type="file" class="form-control-file" name="documents" id="documents"
                                    value="{{ $users->documents }}">
                                    <span>{{$users->documents}}</span>
                                <span class="text-danger  ">
                                    @error('documents')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                           
                         </div>
                            <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Update</button>
                                <a href="{{url('admin/document')}}" class="mt-4 btn btn-danger">Cancel</a>

                        </form>
</div>
                    </div>

    <script>
        $(document).ready(function() {
            // validate  form using jquey
            $("#update").validate({
                rules: {
                    project_id: {
                        required: true,

                    },
                    category_id: {
                        required: true,

                    },
                    document_type_id: {

                        required: true,
                    },
                    title: {
                        required: true,

                    },
                   
                },
                messages: {
                    project_id: {
                        required: "Update your project",

                    },
                    category_id: {
                        required: "Update your valid category",

                    },
                    document_type_id: {
                        required: "Update your document type",
                    },
                    title: {
                        required: "Update your title",

                    },


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
