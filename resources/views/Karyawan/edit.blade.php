@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Karyawan</h2>

    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control"
                   value="{{ old('nama', $karyawan->nama) }}" required>
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control"
                   value="{{ old('email', $karyawan->email) }}" required>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control"
                   value="{{ old('jabatan', $karyawan->jabatan) }}">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ old('alamat', $karyawan->alamat) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gaji" class="form-label">Gaji</label>
            <input type="number" name="gaji" id="gaji" class="form-control"
                   value="{{ old('gaji', $karyawan->gaji) }}" required>
        </div>

        <div class="mb-3">
            <label for="departemen_id" class="form-label">Departemen</label>
            <select name="departemen_id" id="departemen_id" class="form-select">
                <option value="">-- Pilih Departemen --</option>
                @foreach ($departemens as $departemen)
                    <option value="{{ $departemen->id }}"
                        {{ old('departemen_id', $karyawan->departemen_id) == $departemen->id ? 'selected' : '' }}>
                        {{ $departemen->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
