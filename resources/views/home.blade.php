<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Manajemen Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Manajemen Karyawan</a>
    <div class="d-flex">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
        </form>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body text-center">
            <h3>Selamat Datang, {{ $users->name ?? auth()->user()->name }} 🎉</h3>
            <p class="text-muted mb-4">Anda berhasil login ke sistem manajemen karyawan.</p>

            <a href="{{ route('karyawan.index') }}" class="btn btn-outline-primary">Lihat Data Karyawan</a>
            <a href="{{ route('departemen.index') }}" class="btn btn-outline-secondary">Lihat Departemen</a>

        </div>
    </div>
</div>

</body>
</html>
