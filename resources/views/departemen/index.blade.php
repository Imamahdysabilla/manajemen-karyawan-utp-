@extends('layouts.app')

@section('content')
<div class="card shadow-sm border-0">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="mb-0">Data Departemen</h4>
      <a href="{{ route('departemen.create') }}" class="btn btn-success">
        + Tambah Departemen
      </a>
    </div>

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th>Nama Departemen</th>
            <th class="text-center" width="180">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($departemens as $departemen)
            <tr>
              <td>{{ $departemen->nama }}</td>
              <td class="text-center">
                <a href="{{ route('departemen.edit', $departemen->id) }}" class="btn btn-warning btn-sm me-1">
                  Edit
                </a>
                <form action="{{ route('departemen.destroy', $departemen->id) }}" method="POST" class="d-inline">
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
              <td colspan="2" class="text-center text-muted py-3">
                Belum ada data departemen.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
