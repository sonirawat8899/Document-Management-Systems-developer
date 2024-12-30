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
                <a href="{{url('admin/view_image')}}">Settings Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Update Logo</a>
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

                    <form action="{{url('/admin/update_image')}}" method="post" id="category"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $setting->id }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="company_name">Company Name</label>
                                    <select name="company_name" class="form-control">
                                    <option value=""> Please Select</option>
                                    <?php foreach($company_name as $company_name){?>
                                        <option <?php if($company_name->company_name == $company_name->company_name){?>selected <?php } ?> value="{{$company_name->company_name}}">{{$company_name->company_name}}</option>
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
                                <span class="text-danger  ">
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </span>
                        </div>
                        <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                <a href="{{url('admin/view_image')}}" class="mt-4 btn btn-danger">Cancel</a>
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
});
</script>
@endsection