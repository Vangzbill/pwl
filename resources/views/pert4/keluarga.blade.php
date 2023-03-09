@extends('pert3prak2.layout.template')

@section('content')
    <h2>Data Anggota Keluarga</h2>
    <table class="table">
        <thead>
            <tr>
                <th>NO</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Agama</th>
                <th>Peran Dalam Keluarga</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($keluarga as $no => $k)
                <tr>
                    <td>{{$no+1}}</td>
                    <td>{{$k -> nik}}</td>
                    <td>{{$k -> nama}}</td>
                    <td>{{$k -> agama}}</td>
                    <td>{{$k -> peran}}</td>
                </tr>
            @endforeach
            </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        alert('Selamat Datang');
    </script>
@endpush