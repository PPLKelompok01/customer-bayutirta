@extends('layout')

@section('title', 'Bayu Celluler | Service')

@section('content')
<main>
  <section class="serviceus mb-9rem">
    <div class="serviceus-image">
      <div class="image">
        <img src="{{ url('images/heroserviceimg.png') }}" alt="hero">
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-xl-5">
          <div class="serviceus-title">
            <h2 class="font-jakarta">Katalog Kami</h2>
            <p>Menerima segala permintaan service atau konsultasi hanya dari rumah kamu. Terpercaya dan cepat!</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Filter Merk -->
  <section class="part">
    <div class="container mb-4">
      <div class="row">
        <div class="col">
          <div class="btn-group">
            <a href="{{ url('/katalog') }}" class="btn btn-outline-primary {{ $selectedMerk == null ? 'active' : '' }}">Semua</a>
            @foreach($listMerk as $merkItem)
              <a href="{{ url('/katalog?merk='.$merkItem) }}" class="btn btn-outline-primary {{ $selectedMerk == $merkItem ? 'active' : '' }}">
                {{ ucfirst($merkItem) }}
              </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        @if (isset($katalog))
          @foreach ($katalog as $item)
          <div class="col-xl-4">
            <a href="{{ url("/katalogdetail/$item->id_penjualan") }}" class="text-decoration-none">
              <div class="part-card">
                <div class="image">
                  <img style="height: 270px; width: 415px; object-fit: cover; border-radius:20px"
                    src="{{ asset('images/katalog/'.$item->foto) }}" {{-- ✅ Sudah fix path --}}
                    onerror="this.src='{{ asset('images/service2.png') }}'" 
                    alt="Foto Produk"> 
                </div>
                <div class="body">
                  <h5 class="title font-jakarta">{{$item->judul}}</h5>
                  <p class="text">{{$item->deskripsi}}</p>
                  <div class="logo">
                      @if ($item->Kategori == 'xiaomi')
                          <div class="brand"><img src="{{ url('images/xiaomi.png') }}" alt="brand"></div>
                      @elseif ($item->Kategori == 'samsung')
                          <div class="brand"><img src="{{ url('images/samsung.png') }}" alt="brand"></div>
                      @elseif ($item->Kategori == 'oppo')
                          <div class="brand"><img src="{{ url('images/oppo.png') }}" alt="brand"></div>
                      @elseif ($item->Kategori == 'vivo')
                          <div class="brand"><img src="{{ url('images/vivo.png') }}" alt="brand"></div>
                      @endif
                  </div>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        @else
        <div class="picture">
          <img src="/img/ALT 4.png" alt="noservice">
        </div>
        <div class="message text-center">
          <h3 class="fw-bold">Belum ada produk yang tersedia</h3>
          <p>Silakan nikmati layanan kami yang lain</p>
        </div>
        @endif
      </div>
    </div>
  </section>

  <div class="reservasi bg-blacker">
    <div class="container">
      <div class="reservasi-wrapper bg-purple">
        <div class="row">
          <div class="col-xl-5">
            <div class="reservasi-cta">
              <div class="title">
                <h5 class="font-jakarta">Konsultasikan & Reservasi</h5>
                <p class="font-jakarta">Hubungi admin kami untuk melakukan konsultasi sebelum melakukan reservasi layanan kami!</p>
              </div>
              <div class="button">
                <button><a href="https://wa.me/6282257423118?text=Halo,%20saya%20ingin%20konsultasi%20&%20reservasi%20service%20smartphone" class="text-decoration-none text-dark">Hubungi Kami</a></button>
              </div>
            </div>
          </div>
          <div class="col-xl-7">
            <div class="reservasi-image">
              <img src="{{ url('images/mmockup.png') }}" alt="mmockup">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
