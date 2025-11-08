@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Data Departemen</h3>
    <a href="{{ route('departemen.create') }}" class="btn btn-success">+ Tambah Departemen</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nama Departemen</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($departemens as $departemen)
            <tr>
                <td>{{ $departemen->nama }}</td>
                <td>
                    <a href="{{ route('departemen.edit', $departemen->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('departemen.destroy', $departemen->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
