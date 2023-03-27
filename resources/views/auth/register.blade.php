@extends('layouts.index')

@section('content')

<div class="mt-5">
    <form action="{{ route('store') }}" method="post">
        @csrf
        <div class="mb-3 fw-bolder bg-custom p-2">
            Register For This Site
        </div>
        <div class="mb-3">
            <label for="username" class="form-label fw-bolder">Username</label>
            <div>
                <input type="text" class="form-control bg-white @error('username') is-invalid @enderror" id="username" name="username" value="{{old('username')}}">
                @if ($errors->has('username'))
                <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label fw-bolder">Email Address</label>
            <div>
                <input type="email" class="form-control bg-white @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label fw-bolder">Password</label>
            <div>
                <input type="password" class="form-control bg-white @error('password') is-invalid @enderror" id="password" name="password" value="{{old('password')}}">
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label fw-bolder">Password</label>
            <div>
                <input type="password" class="form-control bg-white" id="password_confirmation" name="password_confirmation">
            </div>
        </div>
        <input type="submit" class="btn btn-custom" value="Register">
    </form>
</div>




@endsection