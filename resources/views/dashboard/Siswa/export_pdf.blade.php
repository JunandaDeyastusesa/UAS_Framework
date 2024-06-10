<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee List</title>
    <style>
        html {
            font-size: 12px;
        }

        .table {
            border-collapse: collapse !important;
            width: 100%;
        }

        .table-bordered th,
        .table-bordered td {
            padding: 0.5rem;
            border: 1px solid black !important;
        }
    </style>
</head>

<body>
    <h1>List Data Siswa</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Tanggal Lahir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $index => $s)
                <tr>
                    <td align="center">{{ $index + 1 }}</td>
                    <td class="text-left">{{ $s->NISN }}</td>
                    <td class="text-left">{{ $s->nama_siswa }}</td>
                    <td class="text-left">{{ $s->tanggal_lahir }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
