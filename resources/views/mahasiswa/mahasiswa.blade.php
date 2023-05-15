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
                <th>Foto</th>
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
                        <td>
                            <img src="{{asset('storage/'.$m->foto)}}" alt="" width="50px" height="70px">
                        </td>
                        <td>{{$m->kelas->nama_kelas}}</td>
                        <td>{{$m->jk}}</td>
                        <td>{{$m->hp}}</td>
                        <td>
                            <div class="">
                                <a href="{{ url('/mahasiswa/'.$m->id) }}" class="btn btn-sm btn-info fas fa-eye"></a>
                                <a href="{{ url('/mahasiswa/'.$m->id.'/edit') }}" class="btn btn-sm btn-warning fas fa-edit"></a>
    
                                <form method="POST" action="{{ url('/mahasiswa/'.$m->id ) }}" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger fas fa-trash-alt" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"></button>
                                </form> 
                                <a href="{{ url('/mhs/khs/'.$m->id) }}" class="btn btn-sm btn-primary">Nilai</a>
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