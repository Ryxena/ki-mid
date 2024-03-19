@extends('web.layouts.layout')

@section('content')
    <div class="hero d-flex justify-content-evenly pt-5">
        <div class="w-50">
            <div class="text-center">
                <img src="{{ asset('assets/images/medical-doctors-at-the-conference-2021-08-29-16-28-13-utc 1.png') }}"
                    alt="">
            </div>
        </div>
        <div class="hero-text w-50">
            <p class="top">CHECK EARLIER, PREVENT EARLIER</p>
            <h1 class="w-50">Take care of your body and it will take care of you</h1>
            <p>Temukan dokter spesialis sesuai dengan kebutuhan anda kapanpun</p>
            <div class="hero-button mt-5">
                <a href="#" class="mx-2">Do health check right now</a>
                <a href="#">Learn more</a>
            </div>
        </div>
    </div>
    {{-- mouse --}}
    <div class="text-center py-5">
        <img src="{{ asset('assets/images/group 2.png') }}" alt="">
    </div>
    {{-- card --}}
    <div class="card-container d-flex justify-content-evenly">
        <div class="card text-center">
            <img src="{{ asset('assets/images/Group 17.png') }}" alt="">
            <div>
                <h1 class="fs-4">Pelayanan mudah, dengan aplikasi</h1>
                <p class="fs-6">Cari dan temukan kebutuhan medis Anda dengan tepat.</p>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('assets/images/Group.png') }}" alt="">
            <div>
                <h1 class="fs-4">Konsultasi dengan Dokter spesialis</h1>
                <p class="fs-6">Temukan dokter spesialis sesuai dengan kebutuhan anda kapanpun</p>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('assets/images/Group 15.png') }}" alt="">
            <div>
                <h1 class="fs-4">Promo khusus untuk Semua tes Covid-19</h1>
                <p class="fs-6">Dapatkan penawaran menarik untuk Anda yang membutuhkan tes covid-19</p>
            </div>
        </div>
    </div>
@endsection
