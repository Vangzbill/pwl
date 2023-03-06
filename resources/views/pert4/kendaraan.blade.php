@extends('pert3prak2.layout.template')

@section('content')
    <h2>Data Kendaraan</h2>
    <table class="table">
        <thead>
            <tr>
                <th>NO</th>
                <th>No Polisi</th>
                <th>Merk</th>
                <th>Jenis</th>
                <th>Tahun Buat</th>
                <th>Warna</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($kendaraan as $no => $k)
                <tr>
                    <td>{{$no}}</td>
                    <td>{{$k -> nopol}}</td>
                    <td>{{$k -> merk}}</td>
                    <td>{{$k -> jenis}}</td>
                    <td>{{$k -> tahun_buat}}</td>
                    <td>{{$k -> warna}}</td>
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