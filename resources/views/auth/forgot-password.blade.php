@extends('frontend.home_master')

@section('home')
<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Reset Password</h4>
                    <div class="alert alert-success" role="alert">
                        We will send reset link, please check your email after hit send button!
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            <input type="email" name="email" id="email" class="form-control unicase-form-control text-input">
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send</button>
                    </form>
                </div>
                <!-- Sign-in -->


                <!-- create a new account -->
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        @endsection