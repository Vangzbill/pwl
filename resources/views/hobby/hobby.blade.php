@extends('pert3prak2.layout.template')

@section('content')
    <h2>Data Hobby</h2>
    <a href="{{url('hobby/create')}}"class="btn btn-sm btn-success my-2">Tambah Data</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Alasan</th>
                <th>Opsi</th>
            </tr>
            </thead>
            <tbody>
            @if ($hobby->count() > 0)
                @foreach ($hobby as $no => $h)
                    <tr>
                        <td>{{++$no}}</td>
                        <td>{{$h -> nama}}</td>
                        <td>{{$h -> alasan}}</td>
                        <td>
                            <a href="{{ url('/hobby/'.$h->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>

                            <form method="POST" action="{{ url('/hobby/'.$h->id ) }}">
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