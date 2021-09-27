@extends('layouts.dashboard')

@section('content')

<div class="card card-custom">
    <div class="card-header">
     <h3 class="card-title">
      Create a driver
     </h3>
    </div>
    <!--begin::Form-->
    <form action="{{  route('drivers.store')  }}" method="POST" class="form">
     <div class="card-body">
        <div class="form-group">
            <div class="image-input image-input-outline" id="kt_image_1">
                <div class="image-input-wrapper"  style="background-image: url(assets/media/users/100_1.jpg)">
                    <img src=""  class=" object-contain w-full" id="blah" alt="">
                </div>
                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                 <i class="fa fa-pen icon-sm text-muted"></i>
                 <input type="file" name="profile_avatar" id="imgInp" accept=".png, .jpg, .jpeg"/>
                 <input type="hidden" name="profile_avatar_remove"/>
                </label>
               
                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                 <i class="ki ki-bold-close icon-xs text-muted"></i>
                </span>
            </div>
        </div>
      <div class="form-group">
       <label>Full Name</label>
       <input type="text" class="form-control" name="name" placeholder="Full Name"/>
      </div>
      <div class="form-group">
        <label>Phone Number</label>
        <input type="number" class="form-control" name="phoneNumber" placeholder="Phone Number"/>
      </div>
      <div class="form-group">
        <label>Email</label>
        <div class="input-group">
         <div class="input-group-prepend"><span class="input-group-text">@</span></div>
         <input type="text" name="email" class="form-control" placeholder="Email" />
        </div>
        <span class="form-text text-muted">Some help content goes here</span>
       </div>
       <div class="form-group">
        <label>CIN</label>
        <input type="text" name="cin"class="form-control" name="phoneNumber" placeholder="Driver's cin"/>
      </div>
     </div>
     <div class="card-footer">
      <button type="reset" type="submit" class="btn btn-primary mr-2">Submit</button>
      <button type="reset" class="btn btn-secondary">Cancel</button>
     </div>
    </form>
    <!--end::Form-->
   </div>
   <script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
   </script>
@endsection