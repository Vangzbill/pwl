@extends('pert3prak2.layout.template')

@section('content')
    <h2>Data Mahasiswa</h2>
    <a href="{{url('mahasiswa/create')}}"class="btn btn-sm btn-success my-2">Tambah Data</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if ($mhs->count() > 0) 
                @foreach ($mhs as $i => $m)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$m->nim}}</td>
                        <td>{{$m->nama}}</td>
                        <td>{{$m->kelas->nama_kelas}}</td>
                        <td>{{$m->jk}}</td>
                        <td>{{$m->hp}}</td>
                        <td>
                            <div class="inline">
                                <a href="{{ url('/mahasiswa/'.$m->id) }}" class="btn btn-sm btn-info">Show</a>
                                <a href="{{ url('/mahasiswa/'.$m->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
    
                                <form method="POST" action="{{ url('/mahasiswa/'.$m->id ) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>
                            </div>
                            
                        </td>
                    </tr>
                @endforeach

            @else
                <tr><td colspan="6" class="text-center">Data tidak ada</td></tr>
            @endif
            </tbody>
    </table>
@endsection

{{-- @push('scripts')
    <script>
        alert('Selamat Datang');
    </script>
@endpush --}}