@extends('pert3prak2.layout.template')

@section('content')
    <h2>Data Hobby</h2>
    <form method="POST" action="{{ $url_form }}">
        @csrf
        {!!(isset($keluarga))? method_field('PUT') : '' !!}
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input class="form-control" name="nama" type="text" value="{{ isset($keluarga) ? $keluarga->nama : old('nama') }}">
            @error('nama')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Agama</label>
            <input class="form-control" name="agama" type="text" value="{{ isset($keluarga)? $keluarga->agama : old('agama') }}">
            @error('agama')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Peran dalam Keluarga</label>
            <input class="form-control" name="peran" type="text" value="{{ isset($keluarga)? $keluarga->peran : old('peran') }}">
            @error('peran')
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