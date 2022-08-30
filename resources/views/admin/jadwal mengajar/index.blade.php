@extends('layouts.main')

@section('body')
    <h3>Jadwal Mengajar</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card-header">
            <a href="/jadwal_mengajar/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Jadwal Mengajar</a>
        </div>
        <div class="card-body">
            <table class="table table-responsive">
                <?php $i = 1 ?>
                <tr class="table-dark border-dark text-center">
                    <th rowspan="2">NO</th>
                    <th rowspan="2">Tanggal</th>
                    <th rowspan="2">Jam</th>
                    <th rowspan="2">Kelas</th>
                    <th rowspan="2">Mata Pelajaran</th>
                    <th rowspan="2">Guru</th>
                    <th colspan="2" class="text-center">Aksi</th>
                </tr>
                <tr class="table-dark text-center border-dark">
                    <th>Ubah</th>
                    <th>Hapus</th>
                </tr>
            @foreach ($jadwal_mengajar as $jm)
                <tr class="text-center">
                    <td>{{ $i }}</td>
                    <td>{{ $jm->tanggal }}</td>
                    <td>{{ $jm->jam }}</td>
                    <td>{{ $jm->nama_kelas }}</td>
                    <td>{{ $jm->nama_mata_pelajaran }}</td>
                    <td>{{ $jm->nama }}</td>

                    <td><a href="/jadwal_mengajar/{{ $jm->id_mengajar }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a></td>
                    <td><form action="/jadwal_mengajar/{{ $jm->id_mengajar }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin ingin menghapus Jadwal Mengajar?')"><i class="bi bi-trash3"></i></button>
                    </form></td>

                </tr>
                <?php $i++ ?>
            @endforeach
            </table>

            Halaman : {{ $jadwal_mengajar->currentPage() }} <br>
            Jumlah Data : {{ $jadwal_mengajar->total() }} <br>
            Data Per Halaman : {{ $jadwal_mengajar->perPage() }}<br><br>


            {{ $jadwal_mengajar->links() }}

        </div>
@endsection
