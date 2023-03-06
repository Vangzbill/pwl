@extends('pert3prak2.layout.template')

@section('content')
    <h2>Data Hobby</h2>
    <table class="table">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Alasan</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($hobby as $no => $h)
                <tr>
                    <td>{{$no+1}}</td>
                    <td>{{$h -> nama}}</td>
                    <td>{{$h -> alasan}}</td>
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