@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-5">
    <h3>Login</h3>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="mb-3">
        <label>Email</label>
        <input name="email" class="form-control" value="{{ old('email') }}">
        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
        @error('password') <div class="text-danger">{{ $message }}</div> @enderror
      </div>
      <button class="btn btn-primary">Login</button>
    </form>
  </div>
</div>
@endsection
