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
                    <a href="#">Add Document</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add Document</div>
                    </div>
                    <div class="card-body">
                <form action="{{url('admin/createdocument')}}" method="POST" id="files"
                    enctype="multipart/form-data">
                    @csrf
                
                  
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Project Name</label>
                        <select name="project_id" class="form-control">
                        <option value=""> Please Select</option>
                        @foreach($project_documents as $project_documents)
                            <option value="{{$project_documents->id}}"> <?php echo $project_documents->project_name;?></option>
                            @endforeach
                        </select>
                        <span class="text-danger error ">
                                @error('project_id')
                                {{$message}}
                                @enderror
                            </span>
                    </div>
                   
                    <div class="form-group col-md-6">
                        <label>Category Name</label>
                        <select name="category_id" class="form-control">
                        <option value=""> Please Select</option>
                        @foreach($category_documents as $category_documents)
                            <option value="{{$category_documents->id}}"><?php echo $category_documents->name;?></option>
                            @endforeach
                        </select>
                        <span class="text-danger error ">
                                @error('category_id')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group col-md-6">
                        <label>Document Type </label>
                        <select name="document_type_id" class="form-control">

                        <option value=""> Please Select</option>
                        @foreach($document_type as $document_type)
                            <option value="{{$document_type->id}}"><?php echo $document_type->name?></option>
                          @endforeach
                        </select>
                        <span class="text-danger error ">
                                @error('document_type_id')
                                {{$message}}
                                @enderror
                            </span>
                    </div>

                    <div class="form-group col-md-6">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" name="title" id="" placeholder="title">
                            <span class="text-danger error ">
                                @error('title')
                                {{$message}}
                                @enderror
                            </span>
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

                        <div class="form-group col-md-6">
                            <label for="exampleFormControlFile1"> Upload document</label>
                            <input type="file" class="form-control-file" name="document"
                                id="exampleFormControlFile1">
                                <span class="text-danger error ">
                                @error('document')
                                {{$message}}
                                @enderror
                            </span>
                     </div>

                    
                    </div>
                     <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                <a href="{{url('admin/document')}}" class="mt-4 btn btn-danger">Cancel</a>
                    <div>
                </form>
            </div>
        </div>
    </div>
    
</div>
<script>
$(document).ready(function() {



    $("#files").validate({
        rules: {
            project_id :"required",
            category_id:"required",
            document_type_id: "required",
            title: "required",
            document: "required",
            status: "required",
        },
        messages: {
            project_id: "Please select project ",
            category_id: "Please select category ",
            document_type_id: "Please select document type",
            title:  "Please enter title",
            document: "Choose any documemnt",
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