@extends('layout.hotel_guest')

@section('container')

    <h1 class="">Data Reservasi Saya</h1>
    
    <div class="container-fluid mb-4"> <!-- Add margin-bottom to create space -->
        <div class="text-center">
            <img src="assets/img/hotel4.jpg" width="1280" class="img-fluid" alt="Hotel Image 01">
        </div>
    </div>

    <div class="container-fluid">
        @foreach($reservations as $reservation)
            <div class="card mb-3 col-md-5">
                <div class="card-header">
                    <a href="{{ route('detail-reservation', $reservation->id) }}">{{ 'ID Registrasi : ' . $reservation->id }}</a>
                    <p class="card-text">
                        Waktu Registrasi : {{ \Carbon\Carbon::parse($reservation->created_at)->setTimezone('Asia/Jakarta')->formatLocalized('%A, %d %B %Y Pukul : %H.%M'); }}
                    </p>
                </div>
            </div>
            <!-- Lakukan sesuatu dengan $reservation -->
        @endforeach
    </div>

@endsection
