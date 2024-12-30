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
                <a href="{{url('user/view_image')}}">Settings Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit user</a>
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

                        <div class="card-title">Add Logo</div>
                    </div>
                    <div class="card-body">

                    <form action="{{url('/user/update_image')}}" method="post" id="category"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $setting->id }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="user_name">user Name</label>
                                    <select name="user_name" class="form-control">
                                    <option value=""> Please Select</option>
                                    <?php foreach($user_name as $user_name){?>
                                        <option <?php if($user_name->user_name == $user_name->user_name){?>selected <?php } ?> value="{{$user_name->user_name}}">{{$user_name->user_name}}</option>
                                        <?php }?>


                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Image Type</label>
                                    <select name="image_type" class="form-control">
                                    <option value=""> Please Select</option>
                                    <option value="2"@if($setting->image_type=="1") {{'selected'}} @endif >Profile</option>
                                    <option value="1"@if($setting->image_type=="2") {{'selected'}} @endif >Logo</option>
                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                        <label for="exampleFormControlFile1"> Update Image</label>
                        <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" value="{{ $setting->image }}">
                        <span>{{$setting->image}}</span>
                                <span class="text-danger">
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </span>
                        </div>
                        <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                <a href="{{url('user/view_image')}}" class="mt-4 btn btn-danger">Cancel</a>
                        <div>

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
            image: {
                  required: true,
                   extension: "png|jpeg|jpg|gif"
                  },

        },
        messages: {
            image: {
             required: "Select Image",
             extension: "Only PNG , JPEG , JPG, GIF File Allowed",},

        }
    });
    function filePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#user_name + img').remove();
                $('#previewimage').after('<img src="'+e.target.result+'" width="100" height="100"/>');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#user_name").blur(function(){
        var user_name = $(this).val();
        id = <?php echo $user_data->id ?>;
        console.log(id);
        $.ajax({
            type: "GET",
            url: "/user/checkuser",
            data: {'user_name':user_name,'id':id},
            success: function(response)
            {
                console.log(response);
                if(response == 1){
                $('#user_err').text('This user is already exist');
                $('#submit').attr('disabled','disabled');
                }
                else{
                $('#user_err').text('');
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
        id = <?php echo $user_data->id ?>;
        console.log(id);
        $.ajax({
            type: "GET",
            url: "/user/checkMobile",
            data: {'mobile':mobile,'id':id},
            success: function(response)
            {
                console.log(response);
                if(response == 1){
                $('#mobile_err').text('This mobile number is already exist');
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



  $("#user_email").blur(function(){
        var email = $(this).val();
        id = <?php echo $user_data->id ?>;
        console.log(id);
        $.ajax({
            type: "GET",
            url: "/user/checkEmail",
            data: {'email':email,'id':id},
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
