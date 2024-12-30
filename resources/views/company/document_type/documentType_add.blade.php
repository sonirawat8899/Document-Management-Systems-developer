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
                    <a href="{{url('company/documentType_view')}}">Document Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Document Type</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">

                        <div class="card-title">Add Document Type</div>
                    </div>
                    <div class="card-body">
                    <form action="{{url('company/documentType_add')}}" method="post" id="validate">
                        @csrf
                        <div class="form-group">
                            <label for="name">Document Type </label>
                            <input type="text" class="form-control"
                                placeholder="Enter document type" name="name" id="name">
                                <span class="text-danger error" id="name_err">
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </span>
                        </div>
                        <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                <a href="{{url('company/documentType_view')}}" class="mt-4 btn btn-danger">Cancel</a>
                            <div>
                      </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
   $(document).ready(function(){
        $("#validate").validate({
            rules: {
                name: {
                    required:true,
                
                },

            },
            messages: {
                name: {
                    required:"Please enter document type",
                },
            }
        });
    });

    $("#name").blur(function(){
   // alert('aaaa');
    var name = $(this).val();
   
    $.ajax({
      type: "GET",
      url: "/company/checkDocumentType?name="+name,
  
      
      success: function(response) 
      { 
        console.log(response);
        if(response == 1){
          $('#name_err').text('This name is already exist');
          $('#submit').attr('disabled','disabled');
        }
        else{
          $('#name_err').text('');
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
