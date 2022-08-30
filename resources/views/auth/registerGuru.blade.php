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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center bg-secondary">

<div class="card m-auto mt-5 mb-2 rounded-4 col-11 col-lg-4">
    <form class="p-4" action="/register/guru" method="POST">
      @csrf
      <img class="mb-4" src="/gambar/ekuin.png" alt="logo ekuin" width="100" height="100">
      <h3 class="mb-3 fw-normal">Register Account</h3>

      <div class="form-floating mb-3">
        <input type="text" name="username" id="username" placeholder="Username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
        <label for="username">Username</label>
        @error('username')
            <div class="invalid-feedback text-start">
              {{ $message }}
            </div>
        @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="nip" id="nip" placeholder="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}">
        <label for="nip">NIP</label>
        @error('nip')
            <div class="invalid-feedback text-start">
              {{ $message }}
            </div>
        @enderror
      </div>

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
        @error('password text-start')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>

      <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Register</button>
      <a href="/register" class="w-100 btn btn-lg btn-secondary mb-3">Back</a>
    </form>
</div>

  </body>
</html>
