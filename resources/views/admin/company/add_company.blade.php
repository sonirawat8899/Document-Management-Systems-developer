@extends('layouts.admin-app')
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
                        <a href="#">Add Company</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Company</div>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/admin/add_company')}}" id="validate" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name" id="company_name" class="form-control">
                                    <span class="text-danger" id="company_err">
                                        @error('company_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Owner Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                    <span class="text-danger" id="company_err">
                                        @error('owner_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                               
                                </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" name="email" id="company_email" class="form-control">
                                    <span class="text-danger" id="email_err">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Mobile No</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control">
                                    <span class="text-danger" id="mobile_err">
                                        @error('mobile')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                                  <label for="name">Logo</label>
                                                  <div class="upload-img-box mb-25">
                                                       <input type="file" class="form-control" name="logo" id="file"
                                                            accept="image/*">
                                                  </div>
                                                  <div class="clear"></div>
                                                  <div id="previewimage"></div>
                                                  <p>{{ __('Accepted Image Files') }}: JPEG, JPG, PNG <br>
                                                       {{ __('Accepted Size') }}: 300 x
                                                       300 (1MB)</p>
                                             </div>
                                             <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter your password" name="password">
                                    <span class="text-danger  ">
                                        @error('password')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                 </div>
                                <div class="text-right">
                                    <button type="submit" class="mt-4 btn btn-success" id="submit">Submit</button>
                                    <a href="{{ url('admin/view_company') }}" class="mt-4 btn btn-danger">Cancel</a>
                                    <div>
                            </form>
                        </div>
                  <script>
                          
 // validate  form using jquey
    $(document).ready(function() {
      $("#validate").validate({
        rules: {
            name: {
                required: true,
                minlength: 4,
                maxlength: 20,
            },
            company_name: {
                required: true,
            },

            email: {
                required: true,
                email: true
            },

            mobile: {
                required:true,
                number:true,
                minlength: 10,
                maxlength: 12,
            },
            // designation: {

            //     required: true,
            // },
            password: {

                required: true,
                minlength: 8
            },

        },
        messages: {
            name: {
                required: "Please enter your Name",
                minlength: "Enter your name at least 4 letters",
                maxlength: "Your name length should not be greater than 20 letters",
            },
            company_name: {
                required: "Please enter your company Name",
            },
            email: {
                required: "Enter a e-mail address",
                email: "Email should be in @gmail.com",
            },
            mobile: {
                required: "Please enter your valid Mobile No.",
                number: "Please enter Mobile No. in numeric",
                minlength: "At least length should be 10",
                maxlength: "Length should not be greater than 12",
            },
            // designation: {
            //     required: "Enter a valid designation",
            // },
            password: {
                required: "Enter a valid password",
                minlength: "Password must be at least 8 characters",
            },

        }

    });
});


function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#company_name + img').remove();
            $('#previewimage').after('<img src="'+e.target.result+'" width="100" height="100"/>');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
// $('#uploadForm + embed').remove();
// $('#uploadForm').after('<embed src="'.target.result+'" width="450" height="300">');

$("#file").change(function () {
	
  filePreview(this);
    
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



  $("#mobile").blur(function(){
    var mobile = $(this).val();
    $.ajax({
      type: "GET",
      url: "/admin/checkMobile?mobile="+mobile,
      
      success: function(response) 
      { 
        console.log(response);
        if(response == 1){
          $('#mobile_err').text('This mobile is already exist');
          $('#submit').attr('disabled','disabled');
        }
        else{
          $('#mobile_err').text('');
          $('#submit').removeAttr('disabled');
        }
      },
      error: function(response) 
      {
        
      }
    });
  });


  $("#company_email").blur(function(){
    var email = $(this).val();
    $.ajax({
      type: "GET",
      url: "/admin/checkEmail?email="+email,
      
      success: function(response) 
      { 
        console.log(response);
        if(response == 1){
          $('#email_err').text('This email is already exist');
          $('#submit').attr('disabled','disabled');
        }
        else{
          $('#email_err').text('');
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
