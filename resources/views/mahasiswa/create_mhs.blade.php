@extends('pert3prak2.layout.template')

@section('content')
    <h2>Data Mahasiswa</h2>
    <form method="POST" action="{{ $url_form }}">
        @csrf
        {!!(isset($mhs))? method_field('PUT') : '' !!}
        <div class="form-group">
            <label>NIM</label>
            <input class="form-control" name="nim" type="text" value="{{ isset($mhs)? $mhs->nim : old('nim') }}">
            @error('nim')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        

        <div class="form-group">
            <label>Nama</label>
            <input class="form-control" name="nama" type="text" value="{{ isset($mhs) ? $mhs->nama : old('nama') }}">
            @error('nama')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <select class="form-control @error('kelas_id') 'is-invalid' @enderror" name="kelas_id">
                @foreach($kelas as $kls)
                    <option value="{{$kls->kelas_id}}" @isset($mhs) @selected($mhs->kelas->kelas_id == $kls->kelas_id) @endisset>{{$kls->nama_kelas}}</option>
                @endforeach
            </select>
            @error('kelas_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control @error('jk') 'is-invalid' @enderror" id="jk" name="jk" >
                <option value="L" @isset($mhs) @selected($mhs->jk == 'L') @endisset>Laki-laki</option>
                <option value="P" @isset($mhs) @selected($mhs->jk == 'P') @endisset>Perempuan</option>
            </select>
        </div>
        
        @error('jk')
            <small class="text-danger">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label>Tempat Lahir</label>
            <input class="form-control @error('tempat_lahir') 'is-invalid' @enderror" name="tempat_lahir" type="text" value="{{ isset($mhs)? $mhs->tempat_lahir : old('tempat_lahir') }}">
            @error('tempat_lahir')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input class="form-control @error('tanggal_lahir') 'is-invalid' @enderror" name="tanggal_lahir" type="date" value="{{ isset($mhs)? $mhs->tanggal_lahir : old('tanggal_lahir') }}">
            @error('tanggal_lahir')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        

        <div class="form-group">
            <label>No HP</label>
            <input class="form-control @error('hp') 'is-invalid' @enderror" name="hp" type="text" value="{{ isset($mhs)? $mhs->hp : old('hp') }}">
            @error('hp')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        

        <div class="form-group">
            <label>Alamat</label>
            <input class="form-control @error('alamat') 'is-invalid' @enderror" name="alamat" type="text" value="{{ isset($mhs)? $mhs->alamat : old('alamat') }}">
            @error('alamat')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        

        <div class="form-group text-right">
            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
        </div>
    </form>
@endsection

{{-- @push('scripts')
    <script>
        alert('Selamat Datang');
    </script>
@endpush --}}