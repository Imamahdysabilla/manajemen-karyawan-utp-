@extends('layouts.app')

@section('content')
<div class="card shadow-sm border-0">
  <div class="card-body">
    <h4 class="mb-4">Tambah Departemen</h4>

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

    <form action="{{ route('departemen.store') }}" method="POST">
      @csrf

      {{-- Nama Departemen --}}
      <div class="mb-3">
        <label for="nama" class="form-label fw-semibold">Nama Departemen</label>
        <input 
          type="text" 
          name="nama" 
          id="nama" 
          class="form-control @error('nama') is-invalid @enderror" 
          value="{{ old('nama') }}" 
          placeholder="Masukkan nama departemen"
          required
        >
        @error('nama')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      {{-- Deskripsi --}}
      <div class="mb-4">
        <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
        <textarea 
          name="deskripsi" 
          id="deskripsi" 
          rows="3" 
          class="form-control @error('deskripsi') is-invalid @enderror" 
          placeholder="Masukkan deskripsi departemen (opsional)"
        >{{ old('deskripsi') }}</textarea>
        @error('deskripsi')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      {{-- Tombol Aksi --}}
      <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('departemen.index') }}" class="btn btn-secondary px-4">Kembali</a>
        <button type="submit" class="btn btn-warning px-4">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection
