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
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="text-right" style="font-weight: bold;">Profile Settings</h3>
                    </div>
                    <form action="{{route('user.update.password')}}" method="POST">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Current Password</label><input type="password" id="current_password" class="form-control" name="current_password" ></div>
                            <div class="col-md-12"><label class="labels">New Password</label><input type="password" id="password" class="form-control" name="password" ></div>
                            <div class="col-md-12"><label class="labels">Confirm New Password</label><input type="password" id="password_confirmation" class="form-control" name="password_confirmation"></div>
                        </div>
                        <br>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="sumbit">Update</button></div>
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