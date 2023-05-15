<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>KHS Mahasiswa</title>
</head>
<body>
    <div class="container mt-2">
            <div class="row justify-content-center align-items-center">
            <div class="card">
            <div class="card-header text text-md-center">Kartu Hasil Studi(KHS)</div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Nim: </b>{{$mhs->nim}}</li>
                    <li class="list-group-item"><b>Nama: </b>{{$mhs->nama}}</li>
                    <li class="list-group-item"><b>Kelas: </b>{{$mhs->kelas->nama_kelas}}</li>
                </ul>
                <table class="table table-bordered table-striped mt-2 text-center">
                    <thead>
                    <tr>
                        <th>MataKuliah</th>
                        <th>SKS</th>
                        <th>Dosen Pengampu</th>
                        <th>Nilai</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($khs->count() > 0)
                        @foreach($khs as $hm)
                            <tr>
                                <td>{{ $hm->matakuliah->nama_matkul }}</td>
                                <td>{{ $hm->matakuliah->sks }}</td>
                                <td>{{ $hm->matakuliah->dosen }}</td>
                                <td>{{ $hm->nilai}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">Data tidak ada</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>