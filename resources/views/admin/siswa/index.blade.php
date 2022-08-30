@extends('layouts.main')

@section('body')
    <h3>Data Siswa</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card-header">
            <a href="/data_siswa/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Siswa</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table">
                <?php $i = 1 ?>
                <tr class="table-dark border-dark text-center">
                    <th rowspan="2">NO</th>
                    <th rowspan="2">NISN</th>
                    <th rowspan="2">Nama Siswa</th>
                    <th rowspan="2">Tempat Lahir</th>
                    <th rowspan="2">Tanggal Lahir</th>
                    <th rowspan="2">Email</th>
                    <th rowspan="2">Alamat</th>
                    <th rowspan="2">Jurusan</th>
                    <th rowspan="2">Tahun Masuk</th>
                    <th rowspan="2">Kelas</th>
                    <th colspan="2" class="text-center">Aksi</th>
                </tr>
                <tr class="table-dark text-center border-dark">
                    <th>Ubah</th>
                    <th>Hapus</th>
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
                    <td><a href="/data_siswa/{{ $s->id_siswa }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a></td>
                    <td><form action="/data_siswa/{{ $s->id_siswa }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin ingin menghapus Siswa?')"><i class="bi bi-trash3"></i></button>
                    </form></td>

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
