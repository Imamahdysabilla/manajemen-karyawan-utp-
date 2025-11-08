@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
  <div class="col-md-5">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h4 class="mb-4 text-center">Login</h4>

        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="Masukkan email">
            @error('email')
              <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password">
            @error('password')
              <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <div class="text-center mt-3">
          <small>Belum punya akun? 
            <a href="{{ route('register') }}">Daftar</a>
          </small>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
