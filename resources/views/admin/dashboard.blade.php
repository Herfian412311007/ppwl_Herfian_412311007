@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <!-- Welcome Message -->
    <div class="col-lg-8 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Selamat datang admin website! 🎉</h5>
          <p class="mb-4">Selamat bekerja, nikmati harimu dengan lebih baik</p>
          <a href="{{ route('products.index') }}" class="btn btn-primary">Lihat Data</a>
        </div>
      </div>
    </div>

    <!-- Data User -->
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card">
        <div class="card-body">
          <span class="fw-semibold d-block mb-1">Data User</span>
          <h3 class="card-title mb-2">12,628</h3>
          <small class="text-success fw-semibold">
            <i class="bx bx-up-arrow-alt"></i> +72.80%
          </small>
        </div>
      </div>
    </div>

    <!-- Sales -->
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card">
        <div class="card-body">
          <span class="fw-semibold d-block mb-1">Sales</span>
          <h3 class="card-title mb-2">4,679</h3>
          <small class="text-success fw-semibold">
            <i class="bx bx-up-arrow-alt"></i> +28.42%
          </small>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection