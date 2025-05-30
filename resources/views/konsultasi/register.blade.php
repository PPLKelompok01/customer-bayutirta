@extends('layout')

@section('title', 'Daftar Konsultasi - Bayu Tirta')

@section('content')
<section class="konsultasi-header">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h1>Daftar Konsultasi</h1>
                <p class="mt-3">Buat akun untuk mengakses layanan konsultasi perangkat</p>
            </div>
        </div>
    </div>
</section>

<section class="register-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <div class="mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-plus text-primary" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h2zm3.5-5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </div>
                            <h4 class="mb-1">Buat Akun Baru</h4>
                            <p class="text-muted">Isi form berikut untuk mendaftar akun konsultasi</p>
                        </div>
                        
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <form action="{{ url('/konsultasi/register') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" required autofocus>
                                        <label for="name">Nama Lengkap</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="nama@contoh.com" required>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Nomor Telepon">
                                        <label for="phone">Nomor Telepon</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                                        <label for="password_confirmation">Konfirmasi Password</label>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                            <div class="d-grid gap-2 mb-4">
                                <button type="submit" class="btn btn-primary btn-lg register-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus me-2" viewBox="0 0 16 16">
                                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h2zm3.5-5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                    Daftar Sekarang
                                </button>
                            </div>
                        </form>
                        
                        <div class="text-center">
                            <p>Sudah punya akun? <a href="{{ url('/konsultasi/login') }}" class="text-primary">Login</a></p>
                            <p><a href="{{ url('/konsultasi') }}" class="text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-1" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                </svg>
                                Kembali ke halaman konsultasi</a></p>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="d-flex align-items-center justify-content-center mb-3">
                                <div class="me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-shield-check text-primary" viewBox="0 0 16 16">
                                        <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                                        <path d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </div>
                                <div class="text-start">
                                    <p class="mb-0 small">Data Anda aman dan terenkripsi. Kami tidak akan membagikan informasi pribadi Anda kepada pihak ketiga.</p>
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

.text-primary {
    color: #4F46E5 !important;
}

.bi-person-plus.text-primary {
    color: #4F46E5 !important;
}

.bi-shield-check.text-primary {
    color: #4F46E5 !important;
}

.form-control:focus {
    border-color: #4F46E5;
    box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.25);
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

/* Card styling */
.card {
    border: none;
    border-radius: 10px;
}

.register-content {
    margin-top: -20px;
}

/* Button enhancement */
.register-button {
    font-weight: 600;
    padding: 12px 20px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(79, 70, 229, 0.25);
}

.register-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 8px rgba(79, 70, 229, 0.35);
    background-color: #4338CA;
}

/* Animated shield icon */
.bi-shield-check {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}
</style>
@endsection 