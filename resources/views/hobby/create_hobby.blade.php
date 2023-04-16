@extends('pert3prak2.layout.template')

@section('content')
    <h2>Data Hobby</h2>
    <form method="POST" action="{{ $url_form }}">
        @csrf
        {!!(isset($hobby))? method_field('PUT') : '' !!}
        <div class="form-group">
            <label>Nama Hobby</label>
            <input class="form-control" name="nama" type="text" value="{{ isset($hobby)? $hobby->nama : old('nama') }}">
            @error('nama')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        

        <div class="form-group">
            <label>Alasan</label>
            <input class="form-control" name="alasan" type="text" value="{{ isset($hobby) ? $hobby->alasan : old('alasan') }}">
            @error('alasan')
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