@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>



<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Profile Page</h4>

                        <form action="{{ route('store.profile')}}" method="post" enctype="multipart/form-data"> 
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" id="name"  value="{{$editData->name}}" id="example-text-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="email" id="email"  value="{{$editData->email}}" id="example-text-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="profile_image"  id="image" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> </label>

                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" alt="200x200" src="{{ asset('backend/assets/images/small/img-5.jpg') }}" data-holder-rendered="true">
                                </div>
                            </div>
                           

                            <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Update Profile">
                        </form>
                       
                       
                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>
<script >
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader  = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection