@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
  <div class="col-md-8">
    <div class="card shadow-sm border-0">
      <div class="card-body text-center py-5">
        <h3 class="fw-semibold mb-3">
          Selamat Datang, {{ $users->name ?? auth()->user()->name }}!
        </h3>
        <p class="text-muted mb-4">
          Anda berhasil login ke sistem manajemen karyawan.
        </p>

        <div class="d-flex justify-content-center gap-3">
          <a href="{{ route('karyawan.index') }}" class="btn btn-primary px-4">Lihat Data Karyawan</a>
          <a href="{{ route('departemen.index') }}" class="btn btn-outline-secondary px-4">Lihat Departemen</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
