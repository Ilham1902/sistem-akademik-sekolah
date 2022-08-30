<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>SMK EPJ || {{ $title }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <script src="/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center bg-secondary">

<div class="card m-auto mt-5 mb-2 rounded-4 col-11 col-lg-4">
    <form class="p-4" action="{{ route('login') }}" method="POST">
      @csrf
      <img class="mb-4" src="/gambar/ekuin.png" alt="logo ekuin" width="100" height="100">
      <h3 class="mb-3 fw-normal">Please Login</h3>

      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show text-start" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <div class="form-floating mb-3">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}">
        <label for="email">Email address</label>
        @error('email')
            <div class="invalid-feedback text-start">
              {{ $message }}
            </div>
        @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
        <label for="password">Password</label>
        @error('password')
            <div class="invalid-feedback  text-start">
              {{ $message }}
            </div>
        @enderror
      </div>

      <button type="submit" class="w-100 btn btn-lg btn-primary mb-3">Login</button>
      <a href="{{ route('register') }}" class="w-100 btn btn-lg btn-success mb-3">Register</a>
      <p class="text-muted">&copy; 2022–2023</p>
    </form>
</div>

  </body>
</html>
