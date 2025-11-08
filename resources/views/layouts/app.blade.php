<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manajemen Karyawan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    html, body {
      height: 100%;
      margin: 0;
      font-family: "Poppins", sans-serif;
      background-color: #f4f6f9;
      display: flex;
      flex-direction: column;
    }

    .navbar {
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    .nav-link {
      transition: all 0.2s ease;
    }

    .nav-link:hover {
      color: #ffc107 !important;
      transform: translateY(-1px);
    }

    main {
      flex: 1; /* Dorong footer ke bawah */
      display: flex;
      flex-direction: column;
    }

    .content-wrapper {
      background: #fff;
      border-radius: 12px;
      padding: 2rem;
      box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
      margin-top: 2rem;
      margin-bottom: 2rem;
    }

    footer {
      background: #fff;
      padding: 1rem 0;
      text-align: center;
      color: #777;
      font-size: 0.9rem;
      border-top: 1px solid #e0e0e0;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">M-Karyawan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-lg-center">
          @auth
            <li class="nav-item"><a class="nav-link" href="{{ route('departemen.index') }}">Departemen</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('karyawan.index') }}">Karyawan</a></li>
            <li class="nav-item ms-lg-2">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-warning btn-sm px-3 fw-semibold">Logout</button>
              </form>
            </li>
          @endauth
          @guest
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="container flex-grow-1">
    @if(session('success'))
      <div class="alert alert-success mt-4 shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="content-wrapper">
      @yield('content')
    </div>
  </main>

  <!-- Footer -->
  <footer>
    <p>© {{ date('Y') }} M-Karyawan | Sistem Manajemen Karyawan</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
