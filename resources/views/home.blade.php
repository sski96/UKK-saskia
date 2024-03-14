@extends('layout.home')
@section('container')

<div class="py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="assets/img/hotel.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h2 class="display-5 fw-bold lh-1 mb-3">Tentang Kami</h2>
            <p class="lead">Destinasi penginapan mewah yang menggabungkan kenyamanan modern dengan sentuhan elegan. Terletak strategis di pusat kota Karawang,
                Fasilitas rekreasi di IS Hotel mencakup kolam renang, pusat kebugaran modern, dan spa yang menawarkan berbagai treatment relaksasi.
            </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="/register" class="btn btn-primary btn-lg px-4 me-md-2">Daftar</a>
                <a href="/login" class="btn btn-outline-secondary btn-lg px-4">Login</a>
            </div>            
      </div>
    </div>

<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Ulasan Tamu</h2>

        <div class="container">
            <div class="swiper swiper-testimonials">
                <div class="swiper-wrapper mb-5">
                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-items-center mb-3">
                            <img src="assets\img\pp.jpg" width="30px">
                            <h6 class="m-0 ms-2">Kila</h6>
                        </div>
                        <p>
                            Fasilitas kamar yang sangat nyaman
                        </p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                    </div>
                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-items-center mb-3">
                            <img src="assets\img\pp.jpg" width="30px">
                            <h6 class="m-0 ms-2">Ara</h6>
                        </div>
                        <p>
                            Wah!! hotel dengan fasilitas yang sangat bagus
                        </p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                    </div>
                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-items-center mb-3">
                            <img src="assets\img\pp.jpg" width="30px">
                            <h6 class="m-0 ms-2">Nayla</h6>
                        </div>
                        <p>
                            Sangat cocok untuk bersantai bersama keluarga
                        </p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    
@endsection