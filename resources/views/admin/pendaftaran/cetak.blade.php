<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pendaftaran Eskul</title>
    <style>
        table { width: 100%; border-collapse: collapse; font-size: 12px; }
        th, td { border: 1px solid black; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Laporan Eskul</h2><img src="{{ asset('images/logo SMA 19.jpeg') }}" alt="Logo" class="block h-9 w-auto">
    @if($nama_eskul)
        <p><strong>Nama Eskul:</strong> {{ $nama_eskul }}</p>
        <p><strong>Nama Pembina:</strong> {{ $pembina }}</p>
        <p><strong>Jadwal:</strong> {{ $jadwal }}</p>
    @endif
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Kelas</th>
                <th>Telepon</th>
                <th>Jenis Kelamin</th>
                <th>Tgl Lahir</th>
                <th>Eskul</th>
                <th>Pembina</th>
                <th>Jadwal</th>
                <th>Tempat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftarans as $index => $p)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->nisn }}</td>
                <td>{{ $p->kelas }}</td>
                <td>{{ $p->no_telepon }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>{{ $p->tgl_lahir }}</td>
                <td>{{ $p->eskul->nama_eskul }}</td>
                <td>{{ $p->eskul->pembina }}</td>
                <td>{{ $p->eskul->jadwal }}</td>
                <td>{{ $p->eskul->tempat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
