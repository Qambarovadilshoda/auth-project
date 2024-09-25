@extends('layouts.app')

@include('partials.style')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Edit Profile</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard', auth()->user()->id)}}">Back to Dashboard</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-5">
    <h2 class="text-center">Edit Your Profile</h2>
    <div class="row justify-content-center mt-4">
        <div class="col-md-6 profile-card">
            <form action="{{route('update', auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @error('name')
                    {{$message}}
                @enderror
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                </div>
                @error('email')
                    {{$message}}
                @enderror
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{auth()->user()->email}}">
                </div>
                @error('avatar')
                    {{$message}}
                @enderror
                <div class="form-group">
                    <label for="avatar">Upload New Avatar</label>
                    <input type="file" class="form-control-file" name="avatar">
                </div>
                <button type="submit" class="btn btn-success btn-block">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection