@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
  <div class="col-md-6">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h4 class="text-center mb-4">Daftar Akun Baru</h4>

        {{-- Notifikasi error --}}
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        {{-- Form Register --}}
        <form action="{{ route('register.post') }}" method="POST">
          @csrf

          <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required autofocus>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi</label>
            <input type="password" name="password" id="password" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
          </div>

          <button type="submit" class="btn btn-primary w-100">Daftar</button>
        </form>

        <div class="text-center mt-3">
          <small>Sudah punya akun?
            <a href="{{ route('login') }}">Login di sini</a>
          </small>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
