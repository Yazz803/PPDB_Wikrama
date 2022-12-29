@extends('dashboard.layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 border border-dark px-4 py-3 rounded" style="background-color: #FFF">
        <h1 class="h3 mb-0 px-3 py-2 rounded font-weight-bold">List Students ({{ $biodatas->total() }})</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Dashboard / List Students</a>
    </div>
    
    {{ $biodatas->links() }}

    <div class="table-siswa container border border-dark rounded">
        <table class="table table-striped mt-2">
            <thead>
              <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Nomor Seleksi</th>
                <th scope="col">NISN</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Nomor HP</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($biodatas as $biodata)
              <tr class="text-center">
                <th scope="row">{{ $loop->iteration + $biodatas->firstItem() - 1 }}</th>
                <td>{{ $biodata->no_seleksi }}</td>
                <td>{{ $biodata->nisn }}</td>
                <td>{{ $biodata->nama }}</td>
                <td>{{ $biodata->email }}</td>
                <td>{{ $biodata->nomor_hp }}</td>
                <td class="d-flex justify-content-around align-items-center">
                  <a href="{{ route('dashboard.dataSiswa', $biodata->id) }}" class="btn btn-primary">Detail</a>
                  <form action="{{ route('dashboard.dataSiswa.delete', $biodata->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Apakah kamu ingin menghapus user ini?')" class="btn btn-sm btn-danger">Hapus</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>

    <br>
    {{ $biodatas->links() }}

@endsection