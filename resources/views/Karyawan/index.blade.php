@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Karyawan</h2>
    <a href="{{ route('karyawan.create') }}" class="btn btn-success mb-3">Tambah Karyawan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Jabatan</th>
                <th>Departemen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $karyawan)
            <tr>
                <td>{{ $karyawan->nama }}</td>
                <td>{{ $karyawan->email }}</td>
                <td>{{ $karyawan->jabatan }}</td>
                <td>{{ $karyawan->departemen->nama ?? '-' }}</td>
                <td>
                    <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
