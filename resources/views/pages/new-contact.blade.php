@extends('layouts.master')

@section('content')
@include('layouts.navbar')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>New Contact</strong></h3>
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

                            <form method="post" action="{{ route('contact.store') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" name="first_name" id="first_name" placeholder="First Name" value="{{ old('first_name') }}" class="form-control border-input" autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" name="last_name" id="last_name" placeholder="Last Name" value="{{ old('last_name') }}" class="form-control border-input">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}" class="form-control border-input">
                                </div>

                                <div class="form-group">
                                    <label for="contact_no">Contact No.:</label>
                                    <input type="text" name="contact_no" id="contact_no" placeholder="Contact No."  value="{{ old('contact_no') }}" class="form-control border-input">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Add contact</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection