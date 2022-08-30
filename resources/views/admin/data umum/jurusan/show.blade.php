@extends('layouts.main')

@section('body')
    <h3>Data Siswa Per-Jurusan</h3>
    <hr>

    <table class="table table-responsive">
        <tr>
            <td><strong>Jurusan</strong></td>
            <td><strong>:</strong></td>
                @foreach ($jurusan as $jr)
                    <td><strong>{{ $jr->nama_jurusan }}</strong></td>
                @endforeach
            </tr>
            <tr>
                <td><strong>Jumlah Siswa</strong></td>
                <td><strong>:</strong></td>
                <td><strong>{{ $siswa->total() }}</strong></td>
            </tr>
        </table>

    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

    <div class="card-header">
        <a href="/data_umum/jurusan" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
    </div>

        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-responsive">
                <?php $i = 1 ?>
                <tr class="table-dark border-dark text-center">
                    <th>NO</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Jurusan</th>
                    <th>Tahun Masuk</th>
                    <th>Kelas</th>
                </tr>
            @foreach ($siswa as $s)
                <tr class="text-center">
                    <td>{{ $i }}</td>
                    <td>{{ $s->NISN }}</td>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->tempat_lahir }}</td>
                    <td>{{ $s->tanggal_lahir }}</td>
                    <td>{{ $s->email }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td>{{ $s->nama_jurusan }}</td>
                    <td>{{ $s->tahun_masuk }}</td>
                    <td>{{ $s->nama_kelas }}</td>
                </tr>
                <?php $i++ ?>
            @endforeach
            </table>
            </div>
        </div>
    </div>
@endsection
