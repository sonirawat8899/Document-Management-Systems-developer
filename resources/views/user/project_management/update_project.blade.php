@extends('layouts.user-app')

@section('content')

<div class="content">

    <div class="page-inner">
        <div class="page-header">
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{url('user/home')}}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                <a href="{{url('user/view_project')}}">Project Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Project</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
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
                        <div class="card-title">Edit Project</div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('user/edit_project')}}" method="post" enctype="multipart/form-data">

                            @csrf
                            <input type="hidden" name="id" value="{{$projects->id}}">


                            <div class="form-group">
                                <label for="name">Project Name</label>
                                <input type="text" class="form-control" name="project_name" id="project_name"
                                    value="{{ $projects->project_name }}" placeholder="name">

                                    <span class="text-danger error " id="project_err">
                                            @error('project_name')
                                            {{$message}}
                                            @enderror
                                        </span>
                            </div>
                            <div class="form-group">
                                <label for="name">Project Manager</label>
                                <select name="manager_d" class="form-control">
                                        <option value=""> Please Select</option>
                                        <?php foreach($managers as $manager){?>
                                        <option <?php if($manager->id == $projects->manager_d){?>selected <?php } ?> value="{{$manager->id}}">{{$manager->name}}</option>
                                        <?php }?>
                                    </select>


                                
                            </div>
                            <div class="form-group col-md-12">
                                        <label for="description"> Project Description</label>
                                        <textarea class="form-control" name="description" id="editor" placeholder="write text" rows="2">
                                        {{$projects->description}}
                                            </textarea>
                                        <span class="text-danger error ">
                                            @error('description')
                                                {{ $message }}
                                            @enderror
                                        </span>
                              </div>
                               
                            <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Update</button>
                                <a href="{{url('user/view_project')}}" class="mt-4 btn btn-danger">Cancel</a>
                                <div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });



        $("#project_name").blur(function(){
        // alert('aaaa');
        var project_name = $(this).val();
        id = <?php echo $projects->id ?>;
        console.log(id);
        $.ajax({
            type: "GET",
            url: "/user/checkProject",
            data: {'project_name':project_name,'id':id},
            success: function(response) 
            { 
                console.log(response);
                if(response == 1){
                $('#project_err').text('This project is already exist');
                $('#submit').attr('disabled','disabled');
                }
                else{
                $('#project_err').text('');
                $('#submit').removeAttr('disabled');
                }
            },
            error: function(response) 
            {
                
            }
        });
  });
    </script>
@endsection