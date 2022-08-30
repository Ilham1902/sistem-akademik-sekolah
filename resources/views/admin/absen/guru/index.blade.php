@extends('layouts.main')

@section('body')

    <h3>Data Presensi Guru</h3>
    <hr>

    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

    <div class="card-header">
        <a href="/cetak_absen_guru/cetak" class="btn btn-danger float-end me-3" target="_blank"><i class="bi bi-file-pdf"></i> Download PDF</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
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

            Halaman : {{ $presensi->currentPage() }} <br>
            Jumlah Data : {{ $presensi->total() }} <br>
            Data Per Halaman : {{ $presensi->perPage() }}<br><br>


            {{ $presensi->links() }}

            </div>
    </div>

    </div>
@endsection
