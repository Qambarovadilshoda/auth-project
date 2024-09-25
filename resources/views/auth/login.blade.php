@extends('layouts.app')

@section('content')

<div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center">Login</h2>
                <form action="{{route('handleLogin')}}" method="POST">
                @csrf
                @error('email')
                    {{$message}}
                @enderror
                    <div class="form-group">
                        <label for="loginEmail">Email address</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                @error('password')
                    {{$message}}
                @enderror
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" class="form-control"  name="password" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Login</button>
                </form>
                <p class="text-center mt-2">Don't have an account? <a href="{{route('registerForm')}}">Register</a></p>
            </div>
        </div>
    </div>

@endsection
