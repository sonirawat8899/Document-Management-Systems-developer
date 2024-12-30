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
                    <a href="{{url('company/view_project')}}">Project Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{url('company/project_management')}}">Add Project</a>
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
                            <div class="card-title">Add Project</div>
                        </div>

                        <div class="card-body">
                            <form action="{{url('company/add_project')}}" method="post" id="category"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Project</label>
                                        <input type="text" class="form-control" name="project_name" id="project_name"
                                            placeholder="Name">
                                        <span class="text-danger error " id="project_err">
                                            @error('project_name')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Assign User</label>
                                        <select name="manager_d" class="form-control">
                                            <option value=""> Please Select</option>
                                            @foreach($project_manager as $project_manager)
                                            <option value="{{$project_manager->id}}">
                                                <?php echo $project_manager->name;?></option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error ">
                                            @error('manager_d')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="editor"
                                            placeholder="Write text" rows="2">
                                            </textarea>
                                        <span class="text-danger error ">
                                            @error('description')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                        <a href="{{url('company/view_project')}}" class="mt-4 btn btn-danger">Cancel</a>
                                        <div>
                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
        $(document).ready(function() {
            $("#category").validate({
                rules: {
                    project_name: "required",
                    manager_d: "required",


                },
                messages: {
                    project_name: "Please enter your project",
                    manager_d: "Please select manager",

                }
            });
        });


        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });




 $("#project_name").blur(function(){

    var project_name = $(this).val();
    $.ajax({
      type: "GET",
      url: "/company/checkProject?project_name="+project_name,

      success: function(response)
      {
        console.log(response);
        if(response == 1){
          $('#project_err').text('This project name is already exist');
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
