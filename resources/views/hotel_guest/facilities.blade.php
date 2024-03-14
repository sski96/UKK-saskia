@extends('layout.hotel_guest')

@section('container')

<div class="mb-5 mt-5">
    <h2 class="mt-3 mb-3 text-center">Fasilitas</h2>
    <p class="text-justify" style="text-align: center; font-size: 1.2em; font-weight: ;">Kami menyediakan berbagai fasilitas untuk meningkatkan kenyamanan dan kepuasan Anda selama tinggal di sini. 
    Dengan layanan unggulan dan perhatian khusus, kami berkomitmen untuk memberikan pengalaman yang tak terlupakan.</p>
    <div class="mb-5 mt-5">
    <div class="row">
        @foreach ($facilities as $facility)
        <div class="col-md-4 mb-5">
            <div class="card bg-dark" style="max-height: 250px; overflow:hidden">
                <img src="{{ asset('storage/' . $facility->image) }}" alt="" class="img-fluid"> 
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>

@endsection