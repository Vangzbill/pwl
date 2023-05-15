<!DOCTYPE html>
<html>
    <head>
        <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    </head>
    <body>
        <style type="text/css">
            table tr td,table tr th{
            font-size: 9pt;
        }
        </style>
    <h5 class="text justify-content-center text-center">Laporan Artikel</h4>

    <table table class='table table-bordered'>
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Gambar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($articles as $a)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$a->title}}</td>
            <td>{{$a->content}}</td>
            <td>{{$a->featured_image}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    </body>
</html>