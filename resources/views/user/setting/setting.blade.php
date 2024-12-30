@extends('layouts.user-app')

@section('content')
     <div class="content">
          <div class="page-inner">
               <div class="page-header">

                    <ul class="breadcrumbs">
                         <li class="nav-home">
                              <a href="#">
                                   <i class="flaticon-home"></i>
                              </a>
                         </li>
                         <li class="separator">
                              <i class="flaticon-right-arrow"></i>
                         </li>
                         <li class="nav-item">
                              <a href="#">Setting Management</a>
                         </li>
                         <li class="separator">
                              <i class="flaticon-right-arrow"></i>
                         </li>
                         <li class="nav-item">
                              <a href="#">Logo & Profile</a>
                         </li>
                    </ul>
               </div>
               <div class="row">
                    <div class="col-md-12">

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
                         <div class="card">
                              <div class="card-header">
                                   <div class="card-title">Account Images</div>
                              </div>
                              <div class="card-body">
                                   <form action="{{url('/user/update_logo')}}" method="post" id="setting-logo"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                             <div class="form-group col-md-6">
                                                  <label for="name">Logo</label>
                                                  <div class="upload-img-box mb-25">
                                                       <input type="file" class="form-control" name="logo" id="file"
                                                            accept="image/*">
                                                  </div>
                                                  <div class="clear"></div>
                                                  <div id="previewimage">
                                                       <?php


                                            if(@$logos->logo){?>
                                                       <img src="{{asset('images/logo/'.@$logos->logo)}}"
                                                            width="100px" />
                                                       <?php }?>
                                                  </div>
                                                  <p>{{ __('Accepted Image Files') }}: JPEG, JPG, PNG <br>
                                                       {{ __('Accepted Size') }}: 300 x
                                                       300 (1MB)</p>

                                             </div>
                                             <div class="form-group col-md-6">
                                                  <label for="name">Profile Image</label>
                                                  <div class="upload-img-box mb-25">
                                                       <input type="file" class="form-control" name="profile"
                                                            id="profile" accept="image/*">
                                                  </div>
                                                  <div class="clear"></div>
                                                  <div id="previewprofile">
                                                       <?php
                                           	 if(@$logos->profile){?>
                                                       <img src="{{asset('images/profile/'.@$logos->profile)}}"
                                                            width="100px" />
                                                       <?php }?>
                                                  </div>
                                                  <p>{{ __('Accepted Image Files') }}: JPEG, JPG, PNG <br>
                                                       {{ __('Accepted Size') }}: 300 x
                                                       300 (1MB)</p>

                                             </div>

                                        </div>
									<input type="hidden" name="id" value="{{@$logos->id}}">

                                        <div class="text-right">
                                             <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                             <a href="{{url('user/home')}}" class="mt-4 btn btn-danger">Cancel</a>
                                             <div>

                                   </form>
                              </div>
                         </div>
                    </div>
               </div>



<script>

 function filePreview(input) {
 if (input.files && input.files[0]) {
	var reader = new FileReader();
	reader.onload = function (e) {
	    $('#add_portfolio + img').remove();
	    $('#previewimage').html('<img src="'+e.target.result+'" width="100" height="100"/>');
	};
	reader.readAsDataURL(input.files[0]);
 }
}
// $('#uploadForm + embed').remove();
// $('#uploadForm').after('<embed src="'.target.result+'" width="450" height="300">');

$("#file").change(function () {
filePreview(this);

});


 function filePreviewProfile(input) {
 if (input.files && input.files[0]) {
	var reader = new FileReader();
	reader.onload = function (e) {
	    $('#add_portfolio + img').remove();
	    $('#previewprofile').html('<img src="'+e.target.result+'" width="100" height="100"/>');
	};
	reader.readAsDataURL(input.files[0]);
 }
}


$("#profile").change(function () {
filePreviewProfile(this);
});

</script>

          @endsection
