@extends('pert3prak2.layout.template')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
    <div class="card" style="width: 24rem;">
    <div class="card-header">Detail Mahasiswa</div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item text text-center"><img width="100px" height="130px" src="{{asset('storage/'.$mhs->foto)}}"></li>
            <li class="list-group-item"><b>Nim: </b>{{$mhs->nim}}</li>
            <li class="list-group-item"><b>Nama: </b>{{$mhs->nama}}</li>
            <li class="list-group-item"><b>Kelas: </b>{{$mhs->kelas->nama_kelas}}</li>
            <li class="list-group-item"><b>Jenis Kelamin: </b>{{$mhs->jk}}</li>
            <li class="list-group-item"><b>No HP: </b>{{$mhs->hp}}</li> 
            <li class="list-group-item"><b>Alamat: </b>{{$mhs->alamat}}</li> 
        </ul>
    </div>
    <a class="btn btn-success mt-3" href="{{ url('/mahasiswa') }}">Kembali</a>
    </div>
    </div>
    </div>

@endsection