@extends('layouts.main')

@section('body')

    <h3>Data Presensi Siswa</h3>
    <hr>

    <table class="table table-responsive">
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

    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

    <div class="card-header">
        <a href="/rekap_absen_siswa" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        @foreach ($kelas as $kl)
        <a href="/cetak_pdf/{{ $kl->id_kelas }}" class="btn btn-danger float-end me-3" target="_blank"><i class="bi bi-file-pdf"></i> Download PDF</a>
        @endforeach
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
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

            <div class="card-footer">
                @foreach ($kelas as $kl)
                <a href="/rekap_absen_siswa/{{ $kl->id_kelas }}/edit" class="btn btn-info float-end"><i class="bi bi-list-check"></i> Rekap Absen</a>
                @endforeach
            </div>

            Halaman : {{ $siswa->currentPage() }} <br>
            Jumlah Data : {{ $siswa->total() }} <br>
            Data Per Halaman : {{ $siswa->perPage() }}<br><br>


            {{ $siswa->links() }}

            </div>
    </div>

    </div>
@endsection
