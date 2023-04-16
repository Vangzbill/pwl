@extends('pert3prak2.layout.template')

@section('content')
    <h2>Data Mata Kuliah</h2>
    <a href="{{url('matkul/create')}}"class="btn btn-sm btn-success my-2">Tambah Data</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Mata Kuliah</th>
                <th>Jumlah SKS</th>
                <th>Opsi</th>
            </tr>
            </thead>
            <tbody>
            @if ($matkul->count() > 0)
                @foreach ($matkul as $no => $m)
                    <tr>
                        <td>{{$no+1}}</td>
                        <td>{{$m -> nama_matkul}}</td>
                        <td>{{$m -> sks}}</td>
                        <td>
                            <a href="{{ url('/matkul/'.$m->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>

                            <form method="POST" action="{{ url('/matkul/'.$m->id ) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')>Delete</button>
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