@extends('pert3prak2.layout.template')

@section('content')
    <section class="content">
        <div class="card-header">
            <h2>Profile</h2>
        </div>
        <div class="card-section">
            Nama : {{ $data['nama'] }}<br>
            Kelas : {{ $data['kelas'] }}<br>
            Absen : {{ $data['absen'] }}<br>
        </div>
    </section>
@endsection