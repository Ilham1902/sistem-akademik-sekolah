@extends('layouts.main')

@section('body')

<div class="mt-5 mb-5">
    <table class="table table-responsive">
        <h3 class="mb-3">Kehadiran</h3>
        <tr>
            <td><strong>NIP/NUPTK</strong></td>
            <td>:</td>
            <td><strong>{{ Auth::user()->nip }}</strong></td>
        </tr>
        <tr>
            <td><strong>Nama</strong></td>
            <td>:</td>
            <td><strong>{{ Auth::user()->username }}</strong></td>
        </tr>
    </table>
</div>

    <h3>Jadwal Mengajar</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">


        <div class="card-body">

            @if (date("H:i:s") < "10:00")

            <div class="alert alert-primary text-center" role="alert">
                <strong>Tidak ada kegiatan belajar mengajar</strong>
            </div>

            @else

            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <table class="table table-responsive">
                <?php $i = 1 ?>
                <tr class="table-dark border-dark text-center">
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Kelas</th>
                    <th>Mata Pelajaran</th>
                    <th>Isi Presensi</th>
                </tr>

                    @foreach ($history as $hs)
                        @if ($hs->tanggal == $tanggal)

                        <tr class="text-center">
                            <td>{{ $i }}</td>
                            <td>{{ $hs->nama_guru }}</td>
                            <td>{{ $hs->tanggal }}</td>
                            <td>{{ $hs->jam_absen }}</td>
                            <td>{{ $hs->nama_kelas }}</td>
                            <td>{{ $hs->nama_mata_pelajaran }}</td>

                            <td>
                                <a href="/mengajar/{{ $hs->id_absen }}/edit" class="btn btn-info border-0">Isi Presensi</a>
                            </td>
                        </tr>

                            <?php $i++ ?>
                        @endif
                    @endforeach
            </table>

            <div class="alert alert-danger text-center" role="alert">
                <strong> DILARANG MENEKAN TOMBOL HADIR 2X PADA 1 MATA PELAJARAN !!! </strong>
            </div>

            @endif

        </div>
    </div>

    <h3>History Presensi</h3>
    <hr>
        <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">
            <div class="card-body">

                <table class="table table-responsive">

                    <tr class="table-dark border-dark text-center">
                        <th>NO</th>
                        <th>Kelas</th>
                        <th>Mata Pelajaran</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Keterangan</th>
                    </tr>

                    <?php $i = 1 ?>

                    @foreach ($history as $hs)

                    @if ($hs->tanggal === $tanggal)
                    <tr class="text-center">
                        <td>{{ $i }}</td>
                        <td>{{ $hs->nama_kelas }}</td>
                        <td>{{ $hs->nama_mata_pelajaran }}</td>
                        <td>{{ $hs->tanggal }}</td>
                        <td>{{ $hs->jam_absen }}</td>
                        <td>{{ $hs->nama_kehadiran }}</td>
                    </tr>
                    @endif
                        <?php $i++ ?>
                        @endforeach


                </table>
            </div>
        </div>
@endsection
