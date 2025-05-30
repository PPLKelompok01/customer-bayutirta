@extends('layout')

@section('title', 'Konsultasi - Bayu Tirta')

@section('content')
<section class="konsultasi-header">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h1>Konsultasi Perangkat</h1>
                <p class="mt-3">Konsultasikan masalah perangkat Anda dengan tim ahli kami untuk mendapatkan solusi
                    terbaik</p>
            </div>
        </div>
    </div>
</section>

<section class="konsultasi-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-body p-4 text-center">
                        @if (Auth::guard('konsultasi')->check())
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <div class="user-avatar me-3">
                                {{ substr(Auth::guard('konsultasi')->user()->name, 0, 1) }}
                            </div>
                            <div class="text-start">
                                <h4 class="mb-1">Selamat datang, {{ Auth::guard('konsultasi')->user()->name }}</h4>
                                <p class="text-muted mb-0">Anda sudah login dan dapat mengakses dashboard konsultasi.
                                </p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ url('konsultasi/dashboard') }}" class="btn btn-primary me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-gear me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                                    <path
                                        d="M11.886 9.46c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
                                </svg>
                                Dashboard Konsultasi
                            </a>
                            <form action="{{ route('konsultasi.logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-box-arrow-right me-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                        <path fill-rule="evenodd"
                                            d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                        @else
                        <div class="mb-4">
                            <h4>Akses Konsultasi</h4>
                            <p>Silakan login atau daftar untuk mengakses layanan konsultasi</p>
                        </div>
                        <div class="mt-4">
                            <a href="{{ url('konsultasi/login') }}" class="btn btn-primary me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-box-arrow-in-right me-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                    <path fill-rule="evenodd"
                                        d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg>
                                Login
                            </a>
                            <a href="{{ url('konsultasi/register') }}" class="btn btn-outline-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-plus me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z" />
                                    <path fill-rule="evenodd"
                                        d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                                </svg>
                                Daftar
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h4 class="mb-4">Layanan Konsultasi</h4>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="feature-icon bg-primary text-white rounded-circle p-3 me-3"
                                            style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                                                <path
                                                    d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                                <path
                                                    d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h5>Konsultasi Online</h5>
                                        <p class="text-muted">Berkonsultasi langsung dengan teknisi ahli melalui
                                            platform kami</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="feature-icon bg-primary text-white rounded-circle p-3 me-3"
                                            style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
                                                <path
                                                    d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h5>Solusi Masalah</h5>
                                        <p class="text-muted">Dapatkan solusi untuk masalah perangkat dari teknisi
                                            berpengalaman</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="feature-icon bg-primary text-white rounded-circle p-3 me-3"
                                            style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16">
                                                <path
                                                    d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                                                <path
                                                    d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-4z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h5>Estimasi Biaya</h5>
                                        <p class="text-muted">Dapatkan estimasi biaya perbaikan sebelum melakukan servis
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="feature-icon bg-primary text-white rounded-circle p-3 me-3"
                                            style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                                                <path
                                                    d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h5>Buat Janji</h5>
                                        <p class="text-muted">Buat janji untuk perbaikan di toko kami tanpa antri</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="mb-4">Cara Kerja Konsultasi</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="steps">
                                    <div class="step d-flex mb-4">
                                        <div class="step-number bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                            style="width: 40px; height: 40px; flex-shrink: 0;">1</div>
                                        <div>
                                            <h5>Buat Akun</h5>
                                            <p class="text-muted">Daftar dan buat akun di sistem konsultasi kami dengan
                                                cepat dan mudah</p>
                                        </div>
                                    </div>
                                    <div class="step d-flex mb-4">
                                        <div class="step-number bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                            style="width: 40px; height: 40px; flex-shrink: 0;">2</div>
                                        <div>
                                            <h5>Isi Form Konsultasi</h5>
                                            <p class="text-muted">Masukkan detail perangkat dan jelaskan masalah yang
                                                Anda alami</p>
                                        </div>
                                    </div>
                                    <div class="step d-flex mb-4">
                                        <div class="step-number bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                            style="width: 40px; height: 40px; flex-shrink: 0;">3</div>
                                        <div>
                                            <h5>Dapatkan Tanggapan</h5>
                                            <p class="text-muted">Tim ahli kami akan memeriksa dan memberikan solusi
                                                untuk masalah Anda</p>
                                        </div>
                                    </div>
                                    <div class="step d-flex">
                                        <div class="step-number bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                            style="width: 40px; height: 40px; flex-shrink: 0;">4</div>
                                        <div>
                                            <h5>Lanjut ke Servis</h5>
                                            <p class="text-muted">Jika perlu, Anda dapat membuat janji untuk perbaikan
                                                di toko kami</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
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
}

.text-primary {
    color: #4F46E5 !important;
}

.bg-primary {
    background-color: #4F46E5 !important;
}

.feature-icon.bg-primary {
    background-color: #4F46E5 !important;
}

.step-number.bg-primary {
    background-color: #4F46E5 !important;
}

.user-avatar {
    background-color: #4F46E5;
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
</style>
@endsection