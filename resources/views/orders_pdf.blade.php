<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Pesanan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Daftar Pesanan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Layanan</th>
                <th>Tanggal</th>
                <th>Alamat</th>
                <th>Telpon</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $index => $order)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $order->user->username ?? '-' }}</td>
                    <td>{{ $order->layanan->nama_layanan ?? '-' }}</td>
                    <td>{{ $order->tanggal }}</td>
                    <td>{{ $order->alamat }}</td>
                    <td>{{ $order->telpon }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
