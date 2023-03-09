@extends('pert3prak2.layout.template')

@section('content')
    <h2>Data Mata Kuliah</h2>
    <table class="table">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Mata Kuliah</th>
                <th>Jumlah SKS</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($matkul as $no => $m)
                <tr>
                    <td>{{$no+1}}</td>
                    <td>{{$m -> nama_matkul}}</td>
                    <td>{{$m -> sks}}</td>
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