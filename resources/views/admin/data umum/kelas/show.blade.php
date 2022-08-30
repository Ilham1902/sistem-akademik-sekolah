@extends('layouts.main')

@section('body')

    <h3>Data Siswa Per-Kelas</h3>
    <hr>

    @foreach ($siswa as $sw)
        <table class="table table-responsive">
            <tr>
                <td><strong>Kelas</strong></td>
                <td><strong>:</strong></td>
                <td><strong>{{ $sw->nama_kelas }}</strong></td>
            </tr>
            <tr>
                <td><strong>Jumlah Siswa</strong></td>
                <td><strong>:</strong></td>
                <td><strong>{{ $siswa->total() }}</strong></td>
            </tr>
        </table>
    @endforeach

    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

    <div class="card-header">
        <a href="/data_umum/kelas" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
    </div>

        <div class="card-body">
            <div class="table-responsive">
            <table class="table">
                <?php $i = 1 ?>
                <tr class="table-dark border-dark text-center">
                    <th>NO</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Email</th>
                    <th>Alamat</th>
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
                    <td>{{ $s->tahun_masuk }}</td>
                    <td>{{ $s->nama_kelas }}</td>

                </tr>
                <?php $i++ ?>
            @endforeach
            </table>

            Halaman : {{ $siswa->currentPage() }} <br>
            Jumlah Data : {{ $siswa->total() }} <br>
            Data Per Halaman : {{ $siswa->perPage() }}<br><br>


            {{ $siswa->links() }}

            </div>
        </div>
    </div>
@endsection
