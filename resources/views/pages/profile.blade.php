@extends('layouts.master')

@section('content')
@include('layouts.navbar')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Update Profile</strong></h3>
                        </div>

                        <div class="panel-body">

                            @if($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif

                            @if(session('msg'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('msg') }}
                                </div>
                            @endif

                            <form method="post" action="{{ route('profile.update') }}">
                                @csrf

                                <input type="hidden" name="id" id="id" placeholder="First Name" value="{{ $profile->id }}" class="form-control border-input">
                            
                                <div class="form-group">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" name="first_name" id="first_name" placeholder="First Name" value="{{ $profile->first_name }}" class="form-control border-input" autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" name="last_name" id="last_name" placeholder="Last Name" value="{{ $profile->last_name }}" class="form-control border-input">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" id="email" placeholder="Email" value="{{ $profile->email }}" class="form-control border-input">
                                </div>

                                <div class="form-group">
                                    <label for="contact_no">Contact No.:</label>
                                    <input type="text" name="contact_no" id="contact_no" placeholder="Contact No."  value="{{ $profile->contact_no }}" class="form-control border-input">
                                </div>

                                <caption>Leave it blank if you don't want to change the password.</caption>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" id="password" placeholder="Password" class="form-control border-input">
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password:</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation" class="form-control border-input">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Update Profile</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection