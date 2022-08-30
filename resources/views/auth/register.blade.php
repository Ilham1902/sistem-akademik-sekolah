<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMK EPJ || {{ $title }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center bg-secondary">

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card-body col-12 col-lg-4 m-auto mt-5">
        <div class="card shadow rounded-4">
            <div class="card-header">
                Register Akun
            </div>
            {{-- <div class="card rounded-1"> --}}
                <div class="row">
                    <div class="col-8 col-md-8 mt-4 mb-4 m-auto">
                        <div class="card-body bg-primary rounded-4">
                            <a href="/register/siswa" class="btn text-white" style="width: 100%; height:100%">Siswa</a>
                        </div>
                    </div>
                    <div class="col-8 col-md-8 mb-4 m-auto">
                        <div class="card-body bg-info rounded-4">
                            <a href="/register/guru" class="btn text-white" style="width: 100%; height:100%">Guru</a>
                        </div>
                    </div>
                </div>
                <hr>
                <p>Already Account? <a href="/login">Login</a></p>
                <p class="text-muted">&copy; 2022–2023</p>
            {{-- </div> --}}
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
</div>

  </body>
</html>
