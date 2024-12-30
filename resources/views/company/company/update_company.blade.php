@extends('layouts.company-app')

@section('content')
    <div class="content">

        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ url('admin/home') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/view_company') }}">Company Management</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Company</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Company</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('admin/edit_company') }}" id="edit_company" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $users->id }}">
                                <div class="form-group">
                                    <label>Coampany Name</label>
                                    <input type="text" name="company_name" id="company_name" class="form-control" value="{{$users->company_name}}">
                                    <span class="text-danger" id="company_err">
                                        @error('company_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="mt-4 btn btn-success" id="submit">Update</button>
                                    <a href="{{ url('admin/view_company') }}" class="mt-4 btn btn-danger">Cancel</a>
                                    <div>
                            </form>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $("#edit_company").validate({
                                    rules: {

                                        company_name: "required",
                                    },
                                    messages: {
                                        company_name: "*Update  company name",
                                    }

                                });
                            });

    $("#company_name").blur(function(){
   // alert('aaaa');
    var company_name = $(this).val();
    $.ajax({
      type: "GET",
      url: "/admin/checkCompany?company_name="+company_name,
      
      success: function(response) 
      { 
        console.log(response);
        if(response == 1){
          $('#company_err').text('This company is already exist');
          $('#submit').attr('disabled','disabled');
        }
        else{
          $('#company_err').text('');
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
