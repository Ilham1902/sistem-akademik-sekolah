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

    <h3>{{ $data }}</h3>
    <hr>

    <table class="table">
        <?php $i = 1 ?>
        <tr class="table-dark border-dark text-center">
            <th>NO</th>
            <th>Tanggal</th>
            <th>NIP/NUPTK</th>
            <th>Nama Guru</th>
            <th>Mata Pelajaran</th>
            <th>Kelas</th>
            <th>Kehadiran</th>
        </tr>
    @foreach ($presensi as $ps)
        <tr class="text-center">
            <td>{{ $i }}</td>
            <td>{{ $ps->tanggal }}</td>
            <td>{{ $ps->nip }}</td>
            <td>{{ $ps->nama_guru }}</td>
            <td>{{ $ps->nama_kelas }}</td>
            <td>{{ $ps->nama_mata_pelajaran }}</td>
            <td>{{ $ps->nama_kehadiran }}</td>

        </tr>
        <?php $i++ ?>
    @endforeach
    </table>

</body>

</html>
