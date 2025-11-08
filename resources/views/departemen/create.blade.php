@extends('layouts.app')

@section('content')
<h3>Tambah Departemen</h3>

<form action="{{ route('departemen.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Departemen</label>
        <input type="text" name="nama" id="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection
