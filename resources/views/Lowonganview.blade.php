@extends('layout')

@section('title', 'Bayu Celluler | Lowongan')

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
            <h2 class="font-jakarta">Lowongan Pekerjaan</h2>
            <p>Informasi Lowongan Pekerjaan di Bayu Tirta Cell</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Part -->
  
  <section class="part">
    <div class="container">
      <div class="row">
          @if (isset($lowongan))
            @foreach ($lowongan as $item)
            <div class="col-xl-4">
                  <a href="{{ url("/lowongandetail/$item->id_lowongan") }}" class="text-decoration-none">
                    <div class="part-card">
                      <div class="image">
                        <img style="height: 270px; width: 415px; object-fit: cover; border-radius:20px" src="images/lowongan/{{$item->foto}}" onerror="this.src='images/service2.png'" alt="images/service2.png">
                      </div>
                      <div class="body">
                        <h5 class="title font-jakarta">{{$item->judul}}</h5>
                        <p class="text">{{$item->posisi}}</p>
                      </div>
                    </div>
                  </a>
                </div>
            @endforeach
        @else
            {{-- <div class="picture">
                <img src="/img/ALT 4.png" alt="noservice">
            </div> --}}
            <div class="message text-center">
                <h3 class="fw-bold">Belum Ada Lowongan Pekerjaan</h3>
                <p>Lowongan Pekerjaan akan diinformasikan di halaman ini!</p>
            </div>
        @endif
        
      </div>
    </div>
  </section>
  <!-- End : Part -->
  <!-- Reservasi -->
  <div class="reservasi bg-blacker">
    <div class="container">
      <div class="reservasi-wrapper bg-purple">
        <div class="row">
          <div class="col-xl-5">
            <div class="reservasi-cta">
              <div class="title">
                <h5 class="font-jakarta">Konsultasikan & Reservasi</h5>
                <p class="font-jakarta">Hubungi admin kami untuk melakukan konsultasi sebelum melakukan reservasi
                  layanan kami!</p>
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
  <!-- End : reservasi -->
</main>
@endsection