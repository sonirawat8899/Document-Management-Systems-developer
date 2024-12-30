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
                    <a href="{{url('user/userManagement')}}">User Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add User</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add User</div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('user/register_user')}}" method="post" id="validate">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Company Name*</label>
                                    <select name="company_name" class="form-control">
                                        <option value=""> Please Select</option>
                                        @foreach($company_name as $company_name)
                                        <option value="{{$company_name->id}}"> <?php echo $company_name->company_name;?>
                                        </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger  ">
                                        @error('company_name')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Name*</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                        name="name" onkeypress="return /[A-Za-z/ _-]/i.test(event.key)">
                                    <span class="text-danger  ">
                                        @error('name')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email Address*</label>
                                    <input type="email" class="form-control" id="user_email" placeholder="Enter Email"
                                        name="email">
                                    <span class="text-danger error" id="email_err">
                                        @error('email')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password*</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter your password" name="password">
                                    <span class="text-danger error">
                                        @error('password')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="mobile">Mobile*</label>
                                    <input type="text" class="form-control" id="user_mobile" placeholder="Enter Mobile"
                                        name="mobile">
                                    <span class="text-danger error" id="mobile_err">
                                        @error('mobile')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="user_type">User Type</label>
                                    <select name="user_type" class="form-control">
                                        <option value=""> Please Select</option>
                                        @foreach($project_manager as $project_manager)
                                        <option value="{{$project_manager->id}}"> <?php echo $project_manager->name;?>
                                        </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger  ">
                                        @error('user_type')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                <a href="{{url('user/userManagement')}}" class="mt-4 btn btn-danger">Cancel</a>
                                <div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    $.validator.addMethod("indianMobile", function(value, element) {
        return this.optional(element) || /^[6789]\d{9}$/.test(value);
    }, "Please enter a valid  mobile number");

    $.validator.addMethod("customEmail", function(value, element) {
        return /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(value);
    }, "Please enter a valid email address");

    // validate  form using jquey
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
                customEmail: true,
            },

            mobile: {
                required:true,
                number:true,
                minlength: 10,
                maxlength: 12,
                indianMobile: true,
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
                required: "Please enter your company  name",
            },
            email: {
                required: "Enter a e-mail address",
            },
            mobile: {
                required: "Please enter your valid mobile no.",
                number: "Please enter mobile no. in numeric",
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

//check email

  $("#user_email").blur(function(){
//    alert('aaaa');
    var email = $(this).val();
    $.ajax({
      type: "GET",
      url: "/user/checkUserEmail?email="+email,

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


//Check mobile

  $("#user_mobile").blur(function(){
//    alert('aaaa');
    var mobile = $(this).val();
    $.ajax({
      type: "GET",
      url: "/user/checkUserMobile?mobile="+mobile,

      success: function(response)
      {
        console.log(response);
        if(response == 1){
        //   $('#mobile_err').text('This mobile is already exist');
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
</script>

@endsection