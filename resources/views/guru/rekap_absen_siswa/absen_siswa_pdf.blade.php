<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>

    <div class="alert alert-info text-center" role="alert">
        <strong>SMK EKUIN PANGERAN JAYAKARTA</strong>
    </div>

    <table class="table">
        <tr>
            <td><strong>Tanggal</strong></td>
            <td><strong>:</strong></td>
            @foreach ($siswa as $s)
            <td><strong>{{ $s->tanggal }}</strong></td>
            @endforeach
        </tr>
        <tr>
            <td><strong>Kelas</strong></td>
            <td><strong>:</strong></td>
            @foreach ($siswa as $s)
                <td><strong>{{ $s->nama_kelas }}</strong></td>
            @endforeach
            </tr>
            <tr>
                <td><strong>Jumlah Siswa</strong></td>
                <td><strong>:</strong></td>
                <td><strong>{{ $siswa->total() }}</strong></td>
            </tr>
        </table>

        <table class="table table-bordered">
            <?php $i = 1 ?>
            <tr class="table-dark border-dark text-center">
                <th>NO</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Guru</th>
                <th>Kehadiran</th>
            </tr>
        @foreach ($siswa as $s)
            <tr class="text-center">
                <td>{{ $i }}</td>
                <td>{{ $s->nisn }}</td>
                <td>{{ $s->nama_siswa }}</td>
                <td>{{ $s->nama_kelas }}</td>
                <td>{{ $s->nama_mata_pelajaran }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->nama_kehadiran }}</td>

            </tr>
            <?php $i++ ?>
        @endforeach
        </table>

</body>

</html>
