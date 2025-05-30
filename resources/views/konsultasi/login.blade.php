@extends('layout')

@section('title', 'Login Konsultasi - Bayu Tirta')

@section('content')
<section class="konsultasi-header">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h1>Login Konsultasi</h1>
                <p class="mt-3">Masuk ke akun untuk mengakses layanan konsultasi perangkat</p>
            </div>
        </div>
    </div>
</section>

<section class="login-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <div class="mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                                    class="bi bi-person-circle text-primary" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </div>
                            <h4 class="mb-1">Selamat Datang Kembali</h4>
                            <p class="text-muted">Masukkan email dan password Anda untuk login</p>
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

                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        <form action="{{ url('/konsultasi/login') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" placeholder="name@example.com" required autofocus>
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Ingat saya</label>
                            </div>
                            <div class="d-grid gap-2 mb-4">
                                <button type="submit" class="btn btn-primary btn-lg login-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-box-arrow-in-right me-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                        <path fill-rule="evenodd"
                                            d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                    </svg>
                                    Login
                                </button>
                            </div>
                        </form>

                        <div class="text-center">
                            <p class="mb-1">Belum punya akun? <a href="{{ url('/konsultasi/register') }}"
                                    class="text-primary">Daftar sekarang</a></p>
                            <p><a href="{{ url('/konsultasi') }}" class="text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-arrow-left me-1" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                                    </svg>
                                    Kembali ke halaman konsultasi</a></p>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <p class="text-muted small">Dengan login, Anda menyetujui Syarat dan Ketentuan serta
                                Kebijakan Privasi Bayu Tirta Cell</p>
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

.bi-person-circle.text-primary {
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

.login-content {
    margin-top: -20px;
}

/* Button enhancement */
.login-button {
    font-weight: 600;
    padding: 12px 20px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(79, 70, 229, 0.25);
}

.login-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 8px rgba(79, 70, 229, 0.35);
}

.form-check-input:checked {
    background-color: #4F46E5;
    border-color: #4F46E5;
}
</style>
@endsection