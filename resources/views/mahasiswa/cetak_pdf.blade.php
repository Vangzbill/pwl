<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>KHS Mahasiswa</title>
    <style>
        .container{
            width: 100%;
            margin-top: 30px;
        }
        .card{
            width: 100%;
        }
        .text{
            font-size: 28px;
            font-weight: bold;
            text-align: center;
        }
        .list-group-flush{
            margin-top: 20px;
        }
        tr:nth-child(even) {background-color: #f2f2f2;}

        .table thead tr th{
            text-align: center;
        }
        .table tbody tr td{
            text-align: left;

        }
        .table{
            margin-left: -20px;
            padding: 15px;
            width: 600px;
        }
        .table thead tr th{
            background: #f2f2f2;
        }
        .tanggal{
            margin-left: 370px;
        }
        .jab{
            margin-left: 370px;
            margin-top: -20px;
        }
        .ketua{
            margin-left: 370px;
        }

    </style>
</head>
<body>
    <div class="container">
            <div class="row justify-content-center align-items-center">
            <div class="card">
                <br>
                <div class="card-header text">Kartu Hasil Studi(KHS)</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Nim&nbsp;&nbsp;&nbsp;&nbsp;: </b>{{$mhs->nim}}</li>
                        <li class="list-group-item"><b>Nama&nbsp;: </b>{{$mhs->nama}}</li>
                        <li class="list-group-item"><b>Kelas&nbsp;&nbsp;: </b>{{$mhs->kelas->nama_kelas}}</li>
                    </ul>
                    <table class="table">
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
                    <p class="tanggal">Malang, 10 Juli 2023</p>
                    <p class="jab">Ketua Jurusan,</p>
                    <br>
                    <br>
                    <p class="ketua">Dr. Syaifuddin Zuhri, S.Kom., M.Kom.</p>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>