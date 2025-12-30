@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Breadcrumb --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        @include('components.layout.breadcrumb', [
            'items' => [
                'Home' => route('home'),
                'Dashboard' => '#'
            ]
        ])
    </div>

    <div class="row">
        <!-- Welcome Card -->
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat datang {{ Auth::user()->name }}!</h5>
                            <p class="mb-4">
                                Ini adalah dashboard user. Kamu bisa melihat data pribadi dan aktivitas di sini.
                            </p>
                            <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-outline-primary">Edit Profil</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('assets/img/illustrations/girl-doing-yoga-light.png') }}"
                                 height="140"
                                 alt="User Illustration"
                                 data-app-dark-img="illustrations/girl-doing-yoga-dark.png"
                                 data-app-light-img="illustrations/girl-doing-yoga-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Mini -->
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                <!-- Orders -->
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">Pesanan Saya</span>
                            <h3 class="card-title mb-2">5</h3>
                            <small class="text-success fw-semibold">Aktif</small>
                        </div>
                    </div>
                </div>
                <!-- Wishlist -->
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">Wishlist</span>
                            <h3 class="card-title mb-2">12</h3>
                            <small class="text-info fw-semibold">Produk favorit</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection