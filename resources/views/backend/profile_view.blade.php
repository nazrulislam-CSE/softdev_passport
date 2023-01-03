@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Profile</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">User Profile</li>
            </ol>
         </div>
      </div>
   </div>
</section>
<section class="content">
   <div class="container-fluid">
      <div class="row offset-2">
        <div class="col-md-10">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <form class="row g-3" method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="col-sm-6">
                          <label for="inputFirstName" class="form-label">First Name:</label>
                          <input type="text" name="fname" class="form-control" id="inputFirstName" placeholder="Write First Name" value="{{ $adminData->fname }}">
                          @error('fname')
                            <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="col-sm-6">
                          <label for="inputFirstName" class="form-label">Last Name:</label>
                          <input type="text" name="lname" class="form-control" id="inputFirstName" placeholder="Write Last Name" value="{{ $adminData->lname }}">
                          @error('lname')
                            <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="col-sm-6">
                        <label for="inputEmailAddress" class="form-label">Email Address:</label>
                        <input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="Write Email" value="{{ $adminData->email }}">
                        @error('email')
                          <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-sm-6">
                        <label for="phone" class="form-label">Phone:</label>
                        <input type="number" name="phone" class="form-control" id="phone" placeholder="Write Number" value="{{ $adminData->phone }}">
                        @error('phone')
                          <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-sm-6">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Write Address" value="{{ $adminData->address }}">
                        @error('address')
                          <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-sm-6">
                          <label for="inputFirstName" class="form-label">Registration Date:</label>
                          <input type="text" name="date" class="form-control" id="inputFirstName" placeholder="Enter date" value="{{ \Carbon\Carbon::parse($adminData->created_at)->isoFormat('MMM Do YYYY')}}">
                          @error('date')
                            <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="col-sm-12">
                        <label for="photo" class="form-label">Photo:</label>
                         <input type="file" name="photo" class="form-control image"  id="showImage"   />
                      </div>
                      <div class="row mt-3">
                          <div class="col-sm-12 text-secondary">
                            <img id="showImage" name="photo" src="{{ (!empty($adminData->profile_photo_path)) ? url('upload/user_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg') }}" alt="User" style="width:80px; height: 80px;"  >
                          </div>
                      </div>
                      <div class="col-sm-12 text-secondary">
                        <input type="submit" class="btn btn-success" style="float: right;" value="Save Changes" />
                      </div>
                  </form>
              </div>
            </div>
        </div>
      </div>
   </div>
</section>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
      $('#showImage').change(function(e){
          var reader = new FileReader();
          reader.onload = function(e){
              $('#showImage').attr('src',e.target.result);
          }
          reader.readAsDataURL(e.target.files['0']);
      });
  });
</script>
@endsection