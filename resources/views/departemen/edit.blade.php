@extends('layouts.app')

@section('content')
<div class="card shadow-sm border-0">
  <div class="card-body">
    <h4 class="mb-4">Edit Departemen</h4>

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    <form action="{{ route('departemen.update', $departemen->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="nama" class="form-label fw-semibold">Nama Departemen</label>
        <input 
          type="text" 
          name="nama" 
          id="nama" 
          class="form-control @error('nama') is-invalid @enderror"
          value="{{ old('nama', $departemen->nama) }}" 
          required
        >
        @error('nama')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
        <textarea 
          name="deskripsi" 
          id="deskripsi" 
          class="form-control" 
          rows="3"
          placeholder="Tuliskan deskripsi departemen (opsional)"
        >{{ old('deskripsi', $departemen->deskripsi) }}</textarea>
      </div>

      <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('departemen.index') }}" class="btn btn-secondary px-4">
          Kembali
        </a>
        <button type="submit" class="btn btn-primary px-4">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
