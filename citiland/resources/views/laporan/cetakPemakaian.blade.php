<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pemakaian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Very light gray background */
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='4' height='4' viewBox='0 0 4 4'%3E%3Cpath fill='%23ced4da' fill-opacity='0.4' d='M1 3h1v1H1V3zm2-2h1v1H3V1z'%3E%3C/path%3E%3C/svg%3E"); /* Subtle pattern */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 12px; /* Rounded corners (increased for visibility) */
            overflow: hidden; /* To ensure rounded corners are visible */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border-bottom: 2px solid #0056b3; /* Darker blue border */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0f7fa;
        }

        h2 {
            color: #007bff;
            text-align: center;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Pemakaian</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Pemakaian</th>
                <th>Kode Jenis Bahan Baku</th>
                <th>Jumlah Pemakaian</th>
                <th>Unit Bahan Baku</th>
                <th>Tanggal Pemakaian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $pemakaian)
                <tr>
                    <td>{{ $pemakaian->KodePemakaian }}</td>
                    <td>{{ $pemakaian->KodeJenisBahanBaku }}</td>
                    <td>{{ $pemakaian->JumlahPemakaian }}</td>
                    <td>{{ $pemakaian->UnitBahanBaku }}</td>
                    <td>{{ $pemakaian->TanggalPemakaian }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <footer>
        <p>Generated by {{ config('app.name') }} on {{ now()->format('d-m-Y H:i:s') }}</p>
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        <p>Total Transaksi Pemakaian: {{ $data->count() }}</p>
        <p>Total Jumlah Pemakaian: {{ $data->sum('JumlahPemakaian') }}</p>
        <p>Rata-rata Pemakaian: {{ number_format($data->avg('JumlahPemakaian'), 2, ',', '.') }}</p>
    </footer>
</body>
</html>