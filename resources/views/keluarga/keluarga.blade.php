@extends('pert3prak2.layout.template')

@section('content')
    <h2>Data Anggota Keluarga</h2>
    <a href="{{url('keluarga/create')}}"class="btn btn-sm btn-success my-2">Tambah Data</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Agama</th>
                <th>Peran Dalam Keluarga</th>
                <th>Opsi</th>
            </tr>
            </thead>
            <tbody>
            @if ($keluarga->count() > 0)
                @foreach ($keluarga as $no => $k)
                    <tr>
                        <td>{{++$no}}</td>
                        <td>{{$k -> nik}}</td>
                        <td>{{$k -> nama}}</td>
                        <td>{{$k -> agama}}</td>
                        <td>{{$k -> peran}}</td>
                        <td>
                            <a href="{{ url('/keluarga/'.$k->nik.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>

                            <form method="POST" action="{{ url('/keluarga/'.$k->nik ) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr><td colspan="6" class="text-center">Data tidak ada</td></tr>
            @endif
            </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        alert('Selamat Datang');
    </script>
@endpush