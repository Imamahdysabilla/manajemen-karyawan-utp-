@extends('layouts.app')

@section('content')
<div class="card shadow-sm border-0">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="mb-0">Data Karyawan</h4>
      <a href="{{ route('karyawan.create') }}" class="btn btn-warning">
        + Tambah Karyawan
      </a>
    </div>

    {{-- Notifikasi sukses --}}
    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    {{-- Tabel Data --}}
    <div class="table-responsive mb-4">
      <table class="table table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Jabatan</th>
            <th>Departemen</th>
            <th class="text-center" width="180">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($karyawans as $karyawan)
            <tr>
              <td>{{ $karyawan->nama }}</td>
              <td>{{ $karyawan->email }}</td>
              <td>{{ $karyawan->jabatan }}</td>
              <td>{{ $karyawan->departemen->nama ?? '-' }}</td>
              <td class="text-center">
                <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning btn-sm me-1">
                  Edit
                </a>
                <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('Hapus data ini?')">
                    Hapus
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center text-muted py-3">
                Belum ada data karyawan.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- Tombol Kembali ke Home --}}
    <div class="d-flex justify-content-end">
      <a href="{{ route('home') }}" class="btn btn-secondary">
        ← Kembali ke Home
      </a>
    </div>

  </div>
</div>
@endsection
