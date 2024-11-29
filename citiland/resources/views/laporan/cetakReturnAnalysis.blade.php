<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <title>Analisis Retur Komprehensif</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; 
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='4' height='4' viewBox='0 0 4 4'%3E%3Cpath fill='%23ced4da' fill-opacity='0.4' d='M1 3h1v1H1V3zm2-2h1v1H3V1z'%3E%3C/path%3E%3C/svg%3E"); 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
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
            border-bottom: 2px solid #0056b3;
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

        .warning {
            color: #dc3545; 
            font-weight: bold;
        }

        .summary { 
            background: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .summary h3 {
            color: #007bff; 
        }
    </style>
</head>
<body>
    <h2>Analisis Komprehensif Retur Bahan Baku</h2>
    
    <div class="chart">
        <h3>Tren Retur Bulanan (12 Bulan Terakhir)</h3>
        <table>
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Total Retur</th>
                    <th>Total Pembelian</th>
                    <th>Nilai Retur</th>
                    <th>Rate Retur</th>
                </tr>
            </thead>
            <tbody>
                @foreach($monthlyTrends as $trend)
                <tr>
                    <td>{{ $trend['month'] }}</td>
                    <td>{{ number_format($trend['total_returns']) }}</td>
                    <td>{{ number_format($trend['total_purchases']) }}</td>
                    <td>Rp {{ number_format($trend['total_return_value']) }}</td>
                    <td>{{ number_format($trend['return_rate'], 2) }}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="summary">
        <h3>Ringkasan Eksekutif:</h3>
        <p>Total Retur: {{ number_format($monthlyTrends->sum('total_returns')) }}</p>
        <p>Total Nilai Retur: Rp {{ number_format($monthlyTrends->sum('total_value')) }}</p>
        <p>Total Pembelian: {{ number_format($monthlyTrends->sum('total_purchases')) }}</p>
        <p>Rata-rata Rate Retur: {{ number_format($monthlyTrends->avg('return_rate'), 2) }}%</p>
        <p>Bulan dengan Retur Tertinggi: {{ $monthlyTrends->sortByDesc('total_returns')->first()['month'] }} ({{ number_format($monthlyTrends->sortByDesc('total_returns')->first()['total_returns']) }} retur)</p>
    </div>

    <footer>
        <p>Generated by {{ config('app.name') }} on {{ now()->format('d-m-Y H:i:s') }}</p>
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </footer>
</body>
</html>