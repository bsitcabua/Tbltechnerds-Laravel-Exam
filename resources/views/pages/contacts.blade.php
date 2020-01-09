@extends('layouts.master')

@section('content')
@include('layouts.navbar')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    @if(session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif
                    
                    <a href="{{ url('/new-contact') }}"><button type="button" class="btn btn-primary" style="margin-bottom: 10px">Add new</button></a>
                    
                    <div class="card" style="padding: 1%">
                        <div class="table-responsive" style="min-height: 250px">

                            <form method="get">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="query" id="query" placeholder="Search (Firstname, lastname, email, contact)" value="{{ (isset($_GET['query'])) ? trim($_GET['query']) : '' }}" class="form-control border-input" autofocus>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Conatct Number</th>
                                    <th scope="col" class="text-center">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @if(count($contacts) > 0)
                                        @foreach ($contacts as $contact)
                                            @if($contact->user_id == auth()->user()->id)
                                                <tr>
                                                    <th scope="row">{{ $contact->id }}</th>
                                                    <td>{{ $contact->first_name }}</td>
                                                    <td>{{ $contact->last_name }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>{{ $contact->contact_no }}</td>
                                                    <td class="text-center">
                                                        <a href="edit-contact/{{ $contact->id }}">Edit</a>
                                                        |
                                                        <a onclick="return confirm('Delete contact?')" class="text-danger" href="{{ url('/delete-contact?id=') .$contact->id }}">Delete</a>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <th scope="row" colspan="10" class="text-center">No data found</th>
                                                </tr> 
                                            @endif
                                        @endforeach
                                    @else
                                        <tr>
                                            <th scope="row" colspan="10" class="text-center">No data found</th>
                                        </tr> 
                                    @endif
                                </tbody>
                            </table>
                            
                            {{ $contacts->links() }}
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection