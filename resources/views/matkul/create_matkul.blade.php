@extends('pert3prak2.layout.template')

@section('content')
    <h2>Data Mata Kuliah</h2>
    <form method="POST" action="{{ $url_form }}">
        @csrf
        {!!(isset($matkul))? method_field('PUT') : '' !!}
        <div class="form-group">
            <label>Nama</label>
            <input class="form-control" name="nama_matkul" type="text" value="{{ isset($matkul)? $matkul->nama_matkul : old('nama_matkul') }}">
            @error('nama_matkul')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        

        <div class="form-group">
            <label>Jumlah SKS</label>
            <input class="form-control" name="sks" type="text" value="{{ isset($matkul) ? $matkul->sks : old('sks') }}">
            @error('sks')
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