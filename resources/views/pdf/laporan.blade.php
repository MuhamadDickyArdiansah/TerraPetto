<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Administrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            background: white;
            margin: 20px;
        }

        .text-center {
            text-align: center;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background: #f2f2f2;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            font-size: 11px;
            border-radius: 4px;
        }

        .badge-primary {
            background-color: #007bff;
            color: white;
        }

        .badge-success {
            background-color: #28a745;
            color: white;
        }

        dl {
            margin: 0;
        }

        dt {
            font-weight: bold;
        }

        dd {
            margin-left: 0;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div>
        <h3 class="text-center">LAPORAN ADMINISTRASI</h3>
        <p class="text-center">
            Tanggal Laporan: {{ request('tanggal_awal') }} - {{ request('tanggal_akhir') }}
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th width="38%">Data Pasien</th>
                    <th>Keluhan</th>
                    <th>Biaya</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($adm as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <dl>
                                <dt>Nama Pasien</dt>
                                <dd>{{ $item->pasien->nama_pasien }}</dd>

                                <dt>Nomor HP</dt>
                                <dd>{{ $item->pasien->nomor_hp }}</dd>

                                <dt>Tujuan Poli</dt>
                                <dd>{{ $item->poli }}</dd>

                                <dt>Dokter</dt>
                                <dd>{{ $item->dokter->nama_dokter }}</dd>
                            </dl>
                        </td>
                        <td>
                            <div><strong>Keluhan:</strong> {{ $item->keluhan }}</div>
                            <div><strong>Diagnosa:</strong> {{ $item->diagnosis }}</div>
                        </td>
                        <td>Rp. {{ number_format($item->biaya, 0, ',', '.') }}</td>
                        <td>
                                {{ ucfirst($item->status) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
