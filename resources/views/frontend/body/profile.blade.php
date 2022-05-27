@extends('frontend.home_master')

@section('home')
<html>

<head>

    <style>
        body {
            background: rgb(99, 39, 120)
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>

<body>
    <br>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="{{ !empty(Auth::user()->profile_photo_path) ? url(asset(Auth::user()->profile_photo_path)) : url(asset('upload/no_image.jpg')) }}">
                    <h3 class="font-weight-bold">{{Auth::user()->name}}</h3>
                    <h4 class="text-black-50">{{Auth::user()->email}}</h4>
                   <a href="{{route('user.change.password.page')}}"><button class="btn btn-danger">Change Password</button></a> 
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="text-right" style="font-weight: bold;">Profile Settings</h3>
                    </div>
                    <form action="{{route('user.update.profile')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" name="name" placeholder="first name" value="{{Auth::user()->name}}"></div>
                            <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" name="email" placeholder="enter email id" value="{{Auth::user()->email}}"></div>
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" name="phone" placeholder="enter phone number" value="{{Auth::user()->phone}}"></div>
                            <div class="col-md-12"><label class="labels">Upload Profile Image</label><input type="file" class="form-control" name="image" placeholder="upload profile Image"></div>
                            <input type="hidden" name="old_img" value="{{Auth::user()->profile_photo_path}}">
                        </div>
                        <br>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="sumbit">Save Profile</button></div>
                </div>
                </form>
            </div>

        </div>
    </div>
    </div>
    </div>

</body>
</head>

</html>
<br>

@endsection