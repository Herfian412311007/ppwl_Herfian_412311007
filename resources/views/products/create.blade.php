@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Breadcrumb dinamis --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        @include('components.layout.breadcrumb', [
            'items' => [
                'Produk' => route('products.index'),
                'Tambah Produk' => ''
            ]
        ])
    </div>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <div class="mb-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                <i class="bx bx-arrow-back"></i> Kembali
            </a>
        </div>

        <!-- Form Tambah Produk -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Upload Foto -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Foto Produk</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input
                                        type="file"
                                        class="form-control @error('foto') is-invalid @enderror"
                                        id="foto"
                                        name="foto"
                                        aria-label="Upload"
                                    >
                                    @error('foto')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Nama Produk -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-package"></i></span>
                                    <input
                                        type="text"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        id="nama"
                                        name="nama"
                                        placeholder="Silahkan isi nama produk"
                                    >
                                    @error('nama')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-comment-detail"></i></span>
                                    <textarea
                                        id="deskripsi"
                                        name="deskripsi"
                                        class="form-control @error('deskripsi') is-invalid @enderror"
                                        placeholder="Silahkan isi deskripsi produk"
                                    ></textarea>
                                    @error('deskripsi')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Harga -->
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label">Harga</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-dollar-circle"></i></span>
                                    <input
                                        type="number"
                                        id="harga"
                                        name="harga"
                                        class="form-control @error('harga') is-invalid @enderror"
                                        placeholder="100000"
                                    >
                                    @error('harga')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Stok -->
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label">Stok</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-package"></i></span>
                                    <input
                                        type="number"
                                        id="stok"
                                        name="stok"
                                        class="form-control @error('stok') is-invalid @enderror"
                                        placeholder="10"
                                    >
                                    @error('stok')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection