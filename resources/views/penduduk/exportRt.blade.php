<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th h3{
            font-size: 14pt;
        }
    </style>
    <div class="py-3">
        <h3 style="text-align: center">Data Keluarga</h3>
    </div>
    <table style="text-align: center">
        <thead style="border: 1px solid black; text-align:center">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>RW / RT</th>
                <th>Agama</th>
                <th>Tempat & Tanggal Lahir</th>
                <th>Usia</th>
                <th>Status Keluarga</th>
                <th>Pekerjaan</th>
                <th>Status Pernikahan</th>
            </tr>
        </thead>
        <tbody style="border: 1px solid black; text-align:left">
            @foreach ($penduduk as $pd)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pd->nama }}</td>
                    <td>{{ $pd->nik }}</td>
                    <td>{{ $pd->alamat }}</td>
                    <td>{{ $pd->rw->rw }} / {{ $pd->rt->rt }}</td>
                    <td>{{ $pd->agama }}</td>
                    <td>{{ $pd->tmp_lahir }},
                        {{ Carbon\Carbon::parse($pd->tgl_lahir)->format('d-m-Y') }}</td>
                    <td>{{ $pd->usia }}</td>
                    <td>{{ $pd->status_keluarga }}</td>
                    <td>{{ $pd->pekerjaan }}</td>
                    <td>{{ $pd->status_pernikahan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
