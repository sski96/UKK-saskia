<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Reservasi Kamar</title>
    <style>
        /* Gaya yang sudah Anda miliki tetap tidak berubah */

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem; /* Sesuaikan jika diperlukan */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Added style for spacing */
        .info-item {
            margin-bottom: 10px; /* Adjust the margin as needed */
        }

        header {
            border-bottom: 2px solid #ddd; /* Add an underline below the header */
            padding-bottom: 10px; /* Adjust padding as needed */
            margin-bottom: 20px; /* Adjust margin as needed */
            text-align: center;
        }
    </style>
</head>
<body>

    <header>
        <h3>Laporan Reservasi Kamar</h3>
    </header>

    <div class="mt-3 card">
        <!-- Konten yang sudah Anda miliki tetap tidak berubah -->
        <div class="card-body">
            {{-- <h4 class="card-title"></h4> --}}
            
            <!-- Nama -->
            <div class="info-item">
                <strong>Nama:</strong> {{ $order_name }}
            </div>
            
            <!-- Email -->
            <div class="info-item">
                <strong>Email:</strong> {{ $email }}
            </div>
            
            <!-- No Telp -->
            <div class="info-item">
                <strong>No Telp:</strong> {{ $telephone }}
            </div>

            <table>
                <tr>
                    <th>Kamar</th>
                    <td>{{ $room_type }}</td>
                </tr>
                <tr>
                    <th>Tanggal Check In</th>
                    <td>{{ $check_in }}</td>
                </tr>
                <tr>
                    <th>Tanggal Check Out</th>
                    <td>{{ $check_out }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td class="status">
                        @switch($status)
                            @case('check_in')
                                Check In
                                @break
                            @case('check_out')
                                Check Out
                                @break
                            @default
                                Booking
                        @endswitch
                    </td>
                </tr>
            </table>
        </div>
    </div>      
</body>
</html>
