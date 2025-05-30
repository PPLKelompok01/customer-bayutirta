@extends('layout')

@section('title', 'Dashboard Konsultasi - Bayu Tirta')

@section('content')
<section class="konsultasi-header">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h1>Dashboard Konsultasi</h1>
                <p class="mt-3">Kelola konsultasi perangkat Anda dengan tim ahli kami</p>
            </div>
        </div>
    </div>
</section>

<section class="dashboard-content">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="card shadow-sm sticky-top" style="top: 20px; z-index: 999;">
                    <div class="card-body p-0">
                        <div class="bg-primary text-white p-4">
                            <div class="d-flex align-items-center">
                                <div class="user-avatar me-3">
                                    {{ substr(Auth::guard('konsultasi')->user()->name, 0, 1) }}
                                </div>
                                <div>
                                    <h5 class="mb-1">{{ Auth::guard('konsultasi')->user()->name }}</h5>
                                    <p class="mb-0 small">Member Konsultasi</p>
                                </div>
                            </div>
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action active">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-speedometer2 me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                    <path fill-rule="evenodd"
                                        d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
                                </svg>Dashboard
                            </a>
                            <a href="#formKonsultasi" class="list-group-item list-group-item-action">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-chat-text me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                                    <path
                                        d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8zm0 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z" />
                                </svg>Konsultasi Baru
                            </a>
                            <a href="#riwayatKonsultasi" class="list-group-item list-group-item-action">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-clock-history me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                                    <path
                                        d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                                </svg>Riwayat Konsultasi
                            </a>
                            <!-- Button untuk logout -->
                            <form action="{{ route('konsultasi.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="list-group-item list-group-item-action text-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-box-arrow-right me-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M11.955a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                        <path fill-rule="evenodd"
                                            d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                    </svg>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9 col-md-8">
                <!-- Welcome Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h4>Selamat Datang di Dashboard Konsultasi</h4>
                                <p class="text-muted mb-0">Mulai konsultasikan masalah perangkat Anda dengan tim teknisi
                                    ahli kami</p>
                            </div>
                            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                <a href="#formKonsultasi" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-plus-circle me-2" viewBox="0 0 16 16">
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>Konsultasi Baru
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-circle bg-primary text-white me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                                            <path
                                                d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                            <path
                                                d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
                                        </svg>
                                    </div>
                                    <h5 class="mb-0">Konsultasi</h5>
                                </div>
                                <h2 class="mb-0">{{ $stats['total'] }}</h2>
                                <p class="text-muted mb-0">Total konsultasi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-circle bg-success text-white me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                        </svg>
                                    </div>
                                    <h5 class="mb-0">Selesai</h5>
                                </div>
                                <h2 class="mb-0">{{ $stats['selesai'] }}</h2>
                                <p class="text-muted mb-0">Konsultasi selesai</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-circle bg-warning text-white me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                            <path
                                                d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                            <path
                                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                        </svg>
                                    </div>
                                    <h5 class="mb-0">Proses</h5>
                                </div>
                                <h2 class="mb-0">{{ $stats['diproses'] }}</h2>
                                <p class="text-muted mb-0">Dalam proses</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Konsultasi -->
                <div id="formKonsultasi" class="card shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chat-text text-primary me-2" viewBox="0 0 16 16">
                                <path
                                    d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                                <path
                                    d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8zm0 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z" />
                            </svg>
                            <h5 class="mb-0">Form Konsultasi Baru</h5>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('konsultasi.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori Masalah</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
                                            <path
                                                d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z" />
                                            <path
                                                d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z" />
                                        </svg>
                                    </span>
                                    <select class="form-select" id="kategori" name="kategori" required>
                                        <option value="" selected disabled>Pilih kategori masalah</option>
                                        <option value="hardware">Hardware (Kerusakan Fisik)</option>
                                        <option value="software">Software (Sistem & Aplikasi)</option>
                                        <option value="network">Jaringan & Konektivitas</option>
                                        <option value="battery">Baterai & Pengisian Daya</option>
                                        <option value="display">Layar & Tampilan</option>
                                        <option value="audio">Audio & Speaker</option>
                                        <option value="camera">Kamera</option>
                                        <option value="other">Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-text">Pilih kategori yang paling sesuai dengan masalah perangkat Anda
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="perangkat" class="form-label">Jenis Perangkat</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control" id="perangkat" name="perangkat"
                                        placeholder="Masukkan jenis perangkat (contoh: Xiaomi Redmi Note 10)" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="masalah" class="form-label">Deskripsi Masalah</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                                        </svg>
                                    </span>
                                    <textarea class="form-control" id="masalah" name="masalah" rows="5"
                                        placeholder="Deskripsikan masalah perangkat Anda secara detail"
                                        required></textarea>
                                </div>
                                <div class="form-text">Jelaskan gejala yang muncul, kapan masalah mulai terjadi, dan hal
                                    lain yang relevan.</div>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto Perangkat (Opsional)</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                                <div class="form-text">Unggah gambar yang menunjukkan masalah perangkat (format: JPG,
                                    PNG. Max: 2MB)</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tingkat Urgensi</label>
                                <div class="d-flex">
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="urgensi" id="urgensiRendah"
                                            value="rendah">
                                        <label class="form-check-label" for="urgensiRendah">Rendah</label>
                                    </div>
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="urgensi" id="urgensiSedang"
                                            value="sedang" checked>
                                        <label class="form-check-label" for="urgensiSedang">Sedang</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="urgensi" id="urgensiTinggi"
                                            value="tinggi">
                                        <label class="form-check-label" for="urgensiTinggi">Tinggi</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-send me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                </svg>Kirim Konsultasi
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Riwayat Konsultasi -->
                <div id="riwayatKonsultasi" class="card shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-clock-history text-primary me-2" viewBox="0 0 16 16">
                                <path
                                    d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                                <path
                                    d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                            </svg>
                            <h5 class="mb-0">Riwayat Konsultasi</h5>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        @if($konsultasis->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Kategori</th>
                                        <th>Perangkat</th>
                                        <th>Status</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($konsultasis as $konsultasi)
                                    <tr>
                                        <td>{{ $konsultasi->created_at->format('d M Y') }}</td>
                                        <td>{{ ucfirst($konsultasi->kategori) }}</td>
                                        <td>{{ $konsultasi->perangkat }}</td>
                                        <td>
                                            @if($konsultasi->status == 'menunggu')
                                            <span class="badge bg-warning">Menunggu</span>
                                            @elseif($konsultasi->status == 'diproses')
                                            <span class="badge bg-info">Diproses</span>
                                            @elseif($konsultasi->status == 'selesai')
                                            <span class="badge bg-success">Selesai</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary view-konsultasi"
                                                data-bs-toggle="modal" data-bs-target="#detailModal"
                                                data-id="{{ $konsultasi->id }}"
                                                data-kategori="{{ $konsultasi->kategori }}"
                                                data-perangkat="{{ $konsultasi->perangkat }}"
                                                data-masalah="{{ $konsultasi->masalah }}"
                                                data-urgensi="{{ $konsultasi->urgensi }}"
                                                data-status="{{ $konsultasi->status }}"
                                                data-tanggal="{{ $konsultasi->created_at->format('d M Y H:i') }}"
                                                data-foto="{{ $konsultasi->foto }}"
                                                data-foto-base64="{{ $konsultasi->foto_base64 }}"
                                                data-jawaban="{{ $konsultasi->jawaban }}"
                                                data-jawaban-at="{{ $konsultasi->jawaban_at ? $konsultasi->jawaban_at->format('d M Y H:i') : '' }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    fill="currentColor" class="bi bi-eye me-1" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                    <path
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                </svg>
                                                Detail
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="alert alert-info d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-info-circle me-3" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg>
                            <div>
                                Belum ada riwayat konsultasi. Silakan buat konsultasi baru melalui form di atas.
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Konsultasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Kategori:</strong> <span id="modal-kategori"></span></p>
                        <p class="mb-1"><strong>Perangkat:</strong> <span id="modal-perangkat"></span></p>
                        <p class="mb-1"><strong>Tingkat Urgensi:</strong> <span id="modal-urgensi"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Tanggal:</strong> <span id="modal-tanggal"></span></p>
                        <p class="mb-1"><strong>Status:</strong> <span id="modal-status"></span></p>
                    </div>
                </div>
                <div class="mb-3">
                    <strong>Deskripsi Masalah:</strong>
                    <p id="modal-masalah" class="p-3 bg-light rounded"></p>
                </div>
                <div class="mb-3 foto-container" style="display: none;">
                    <strong>Foto:</strong>
                    <div class="mt-2">
                        <img id="modal-foto" src="" alt="Foto Perangkat" class="img-fluid rounded"
                            style="max-height: 300px;">
                    </div>
                </div>
                <div class="mb-3 jawaban-container" style="display: none;">
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <strong>Jawaban Tim Teknis:</strong>
                        <small id="modal-jawaban-at" class="text-muted"></small>
                    </div>
                    <p id="modal-jawaban" class="p-3 bg-light rounded mt-2"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<style>
.icon-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.user-avatar {
    width: 50px;
    height: 50px;
    background-color: rgba(79, 70, 229, 0.2);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    font-weight: 700;
}

/* Change primary colors to purple to match the homepage */
.btn-primary {
    background-color: #4F46E5;
    border-color: #4F46E5;
}

.btn-primary:hover {
    background-color: #4338CA;
    border-color: #4338CA;
}

.btn-outline-primary {
    color: #4F46E5;
    border-color: #4F46E5;
}

.btn-outline-primary:hover {
    background-color: #4F46E5;
    border-color: #4F46E5;
    color: white;
}

.text-primary {
    color: #4F46E5 !important;
}

.bg-primary {
    background-color: #4F46E5 !important;
}

.bg-info {
    background-color: #6366F1 !important;
}

.feature-icon.bg-primary {
    background-color: #4F46E5 !important;
}

.icon-circle.bg-primary {
    background-color: #4F46E5 !important;
}

.list-group-item.active {
    background-color: #4F46E5;
    border-color: #4F46E5;
}

.badge.bg-info {
    background-color: #6366F1 !important;
}

/* Header styling */
.konsultasi-header {
    background: linear-gradient(135deg, #4F46E5 0%, #6366F1 100%);
    color: white;
    padding: 60px 0;
    margin-bottom: 40px;
    border-radius: 0 0 10px 10px;
}

.konsultasi-header h1 {
    font-weight: 700;
    margin-bottom: 15px;
}

.konsultasi-header p {
    opacity: 0.9;
    font-size: 1.1rem;
}

/* Fix for modal z-index */
.modal-backdrop {
    z-index: 1040 !important;
}

.modal {
    z-index: 1050 !important;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    outline: 0;
}

/* Smaller detail button */
.btn-sm.btn-outline-primary {
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
}

/* Ensure modal dialog is properly positioned */
.modal-dialog {
    margin: 1.75rem auto;
    max-width: 800px;
    position: relative;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle the konsultasi detail modal
    const detailModal = document.getElementById('detailModal');

    if (detailModal) {
        detailModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;

            // Extract data from button
            const id = button.getAttribute('data-id');
            const kategori = button.getAttribute('data-kategori');
            const perangkat = button.getAttribute('data-perangkat');
            const masalah = button.getAttribute('data-masalah');
            const urgensi = button.getAttribute('data-urgensi');
            const status = button.getAttribute('data-status');
            const tanggal = button.getAttribute('data-tanggal');
            const foto = button.getAttribute('data-foto');
            const fotoBase64 = button.getAttribute('data-foto-base64');
            const jawaban = button.getAttribute('data-jawaban');
            const jawabanAt = button.getAttribute('data-jawaban-at');

            // Update modal content
            document.getElementById('modal-kategori').textContent = kategori.charAt(0).toUpperCase() +
                kategori.slice(1);
            document.getElementById('modal-perangkat').textContent = perangkat;
            document.getElementById('modal-masalah').textContent = masalah;

            // Format urgensi display
            let urgensiDisplay = '';
            if (urgensi === 'rendah') {
                urgensiDisplay = '<span class="badge bg-success">Rendah</span>';
            } else if (urgensi === 'sedang') {
                urgensiDisplay = '<span class="badge bg-warning">Sedang</span>';
            } else if (urgensi === 'tinggi') {
                urgensiDisplay = '<span class="badge bg-danger">Tinggi</span>';
            }
            document.getElementById('modal-urgensi').innerHTML = urgensiDisplay;

            // Format status display
            let statusDisplay = '';
            if (status === 'menunggu') {
                statusDisplay = '<span class="badge bg-warning">Menunggu</span>';
            } else if (status === 'diproses') {
                statusDisplay = '<span class="badge bg-info">Diproses</span>';
            } else if (status === 'selesai') {
                statusDisplay = '<span class="badge bg-success">Selesai</span>';
            }
            document.getElementById('modal-status').innerHTML = statusDisplay;

            document.getElementById('modal-tanggal').textContent = tanggal;

            // Handle foto - prefer Base64 if available
            const fotoContainer = document.querySelector('.foto-container');
            const modalFoto = document.getElementById('modal-foto');

            if (fotoBase64) {
                // Use Base64 image
                modalFoto.src = fotoBase64;
                fotoContainer.style.display = 'block';
            } else if (foto) {
                // Fallback to regular image path
                modalFoto.src = '/storage/' + foto;
                fotoContainer.style.display = 'block';

                // Add error handler to hide container if image fails to load
                modalFoto.onerror = function() {
                    console.error('Failed to load image from path:', modalFoto.src);
                    fotoContainer.innerHTML =
                        '<div class="alert alert-warning">Gambar tidak dapat ditampilkan. File mungkin tidak ditemukan.</div>';
                };
            } else {
                fotoContainer.style.display = 'none';
            }

            // Handle jawaban
            const jawabanContainer = document.querySelector('.jawaban-container');
            if (jawaban) {
                document.getElementById('modal-jawaban').textContent = jawaban;
                document.getElementById('modal-jawaban-at').textContent = jawabanAt;
                jawabanContainer.style.display = 'block';
            } else {
                jawabanContainer.style.display = 'none';
            }
        });
    }
});
</script>
@endsection