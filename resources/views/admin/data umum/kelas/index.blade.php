@extends('layouts.main')

@section('body')
    <h3>Data Umum > Data Kelas</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card-header">
            <a href="/data_umum/kelas/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Kelas</a>
        </div>
        <div class="card-body">
            <table class="table table-responsive">
                <?php $i = 1 ?>
                <tr class="table-dark border-dark text-center">
                    <th rowspan="2">NO</th>
                    <th rowspan="2">kode Kelas</th>
                    <th rowspan="2">Nama Kelas</th>
                    <th colspan="3" class="text-center">Aksi</th>
                </tr>
                <tr class="table-dark text-center border-dark">
                    <th>Lihat</th>
                    <th>Ubah</th>
                    <th>Hapus</th>
                </tr>
            @foreach ($kelas as $kl)
                <tr class="text-center">
                    <td>{{ $i }}</td>
                    <td>{{ $kl->kode_kelas }}</td>
                    <td>{{ $kl->nama_kelas }}</td>
                    <td><a href="/data_umum/kelas/{{ $kl->id_kelas }}" class="btn btn-info"><i class="bi bi-eye"></i></a></td>
                    <td><a href="/data_umum/kelas/{{ $kl->id_kelas }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a></td>
                    <td><form action="/data_umum/kelas/{{ $kl->id_kelas }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin ingin menghapus Kelas?')"><i class="bi bi-trash3"></i></button>
                    </form></td>

                </tr>
                <?php $i++ ?>
            @endforeach
            </table>

            Halaman : {{ $kelas->currentPage() }} <br>
            Jumlah Data : {{ $kelas->total() }} <br>
            Data Per Halaman : {{ $kelas->perPage() }}<br><br>


            {{ $kelas->links() }}

        </div>
@endsection
