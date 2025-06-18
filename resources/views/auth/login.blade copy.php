<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login Google Sederhana</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Gunakan Bootstrap via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center" style="height: 100vh">
    <div class="container text-center">
        <h2 class="mb-4">Login Google Laravel</h2>

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ route('google.login') }}" class="btn btn-danger btn-lg">
            <i class="bi bi-google"></i> Login dengan Google
        </a>
    </div>
</body>

</html>