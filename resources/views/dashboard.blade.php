<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyApp Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger ms-3">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold">Selamat Datang di Dashboard</h1>
            <p class="text-muted">Halo, {{ Auth::user()->name ?? 'User' }} 👋</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Pengguna</h5>
                        <p class="display-6 text-primary">120</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Produk</h5>
                        <p class="display-6 text-success">58</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pesanan Hari Ini</h5>
                        <p class="display-6 text-danger">9</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5 py-3 text-muted">
        © {{ date('Y') }} MyApp. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
