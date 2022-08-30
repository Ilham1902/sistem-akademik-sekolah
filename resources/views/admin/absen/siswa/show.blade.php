@extends('layouts.main')

@section('body')

    <h3>Data Presensi Siswa</h3>
    <hr>

    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

    <div class="card-header">
        <a href="/data_absen_siswa" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        @foreach ($kelas as $kl)
        <a href="/cetak_absen_siswa_pdf/{{ $kl->id_kelas }}" class="btn btn-danger float-end me-3" target="_blank"><i class="bi bi-file-pdf"></i> Download PDF</a>
        @endforeach
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <?php $i = 1 ?>
                <tr class="table-dark border-dark text-center">
                    <th>NO</th>
                    <th>Tanggal</th>
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
                    <td>{{ $s->tanggal }}</td>
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

            Halaman : {{ $siswa->currentPage() }} <br>
            Jumlah Data : {{ $siswa->total() }} <br>
            Data Per Halaman : {{ $siswa->perPage() }}<br><br>


            {{ $siswa->links() }}

            </div>
    </div>

    </div>
@endsection
