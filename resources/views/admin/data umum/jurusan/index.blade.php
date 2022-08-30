@extends('layouts.main')

@section('body')
    <h3>Data Umum > Data Jurusan</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card-header">
            <a href="/data_umum/jurusan/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Jurusan</a>
        </div>
        <div class="card-body">
            <table class="table table-responsive">
                <?php $i = 1 ?>
                <tr class="table-dark border-dark text-center">
                    <th rowspan="2">NO</th>
                    <th rowspan="2">kode jurusan</th>
                    <th rowspan="2">Nama jurusan</th>
                    <th colspan="3" class="text-center">Aksi</th>
                </tr>
                <tr class="table-dark text-center border-dark">
                    <th>Lihat</th>
                    <th>Ubah</th>
                    <th>Hapus</th>
                </tr>
            @foreach ($jurusan as $jr)
                <tr class="text-center">
                    <td>{{ $i }}</td>
                    <td>{{ $jr->kode_jurusan }}</td>
                    <td>{{ $jr->nama_jurusan }}</td>
                    <td><a href="/data_umum/jurusan/{{ $jr->id_jurusan }}" class="btn btn-info"><i class="bi bi-eye"></i></a></td>
                    <td><a href="/data_umum/jurusan/{{ $jr->id_jurusan }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a></td>
                    <td><form action="/data_umum/jurusan/{{ $jr->id_jurusan }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin ingin menghapus Jurusan?')"><i class="bi bi-trash3"></i></button>
                    </form></td>

                </tr>
                <?php $i++ ?>
            @endforeach
            </table>

            Halaman : {{ $jurusan->currentPage() }} <br>
            Jumlah Data : {{ $jurusan->total() }} <br>
            Data Per Halaman : {{ $jurusan->perPage() }}<br><br>


            {{ $jurusan->links() }}

        </div>
@endsection
