<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title')</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

  <!-- Styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}" />
  <link rel="stylesheet" href="{{ url('css/owl.theme.default.min.css') }}" />
  <link rel="stylesheet" href="{{ url('css/style.css') }}" />

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- Icon -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Page Fade Animation -->
  <style>
    .fade-page {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .fade-page.loaded {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      document.querySelectorAll('.fade-page').forEach(el => el.classList.add('loaded'));
    });
  </script>
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand font-jakarta nav-link" href="/"><img src="{{ url('images/logo.png') }}" alt="logo" />Bayu Tirta</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="{{ url('/service') }}">Layanan</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/katalogview') }}">Katalog</a></li>
          <li class="nav-item"><a class="nav-link" href="/#working">Cara Kerja</a></li>
          <li class="nav-item"><a class="nav-link" href="/#testimonial">Testimonial</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/faq') }}">FAQ</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/article') }}">Artikel</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/lowongan') }}">Lowongan</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="fade-page">
    @yield('content')
  </main>

  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-xl-10">
          <div class="footer-logo">
            <div class="image">
              <img src="{{ url('images/logo.png') }}" alt="logo" />
            </div>
            <h5>Bayu Tirta</h5>
          </div>
          <div class="footer-desc">
            <p class="font-jakartas">
              Bayu Tirta Cell adalah konter resmi di Malang yang melayani service untuk segala
              jenis handphone android yang sudah beroperasi selama 7 tahun dari tahun 2016 sampai kini.
            </p>
          </div>
        </div>
      </div>

      <div class="footer-information mt-4">
        <div class="row">
          <div class="col-xl-2">
            <div class="telp">
              <svg width="32" height="32" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M5.97942 6.0368C5.59787 6.41877 5.24802 6.88731 5.02182 7.29531C4.73771 7.79396 4.52797 8.34078 4.40152 8.90931L4.33572 9.25282C3.29871 14.5141 4.6157 19.2207 8.96325 23.5373C11.8158 26.3695 13.9788 27.5333 16.9406 27.9582C17.4205 28.0271 17
