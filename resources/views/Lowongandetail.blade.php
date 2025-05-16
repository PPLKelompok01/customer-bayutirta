@extends('layout')

@section('title', 'Bayu Celluler | LowonganDetail')

@section('content')

<main>
  <div class="service-detail">
    <div class="container">
      <div class="row align-items-lg-center">
        <div class="col-xl-5">
          <div class="service-detail-image">
            <img src="{{url('images/lowongan/'.$detail->foto)}}" alt="foto">
          </div>
        </div>
        <div class="col-xl-5">
          <div class="service-detail-desc">
            <h5 class="title font-jakarta">{{$detail->judul}}</h5>
            <div class="price font-jakarta">{{ $detail->posisi}}</div><br>
            <h5 class="font-jakarta">{{$detail->cabang_perusahaan}}</h5>
            <div class="action">
              <button><a href="{{ url('https://wa.me/6282257423118?text=Halo,%20Saya%20tertarik%20dengan%20informasi%20lowongan%20pekerjaan%20yang%20tersedia%20di%20website%20Bayu%20Tirta%20Cell.%20Sehingga%20saya%20ingin%20melamar%20sebagai%20'.$detail->posisi) }}" class="text-decoration-none text-white">Kontak Perusahaan</a></button>
            </div>
          </div>
        </div>
      </div>
      <div class="service-detail-navs">
        <div class="row">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs text-center" role="tablist">
            <div class="col-xl-12">
              <li class="nav-item ">
                <a class="nav-link active" data-bs-toggle="tab" >Deskripsi</a>
              </li>
            </div>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="container">
              @foreach(explode(',', $detail->deskripsi) as $desc)
                      <li>{{ trim($desc) }}</li>
                  @endforeach
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- Reservasi -->
  <div class="reservasi">
    <div class="container bg-black rounded-4">
      <div class="reservasi-wrapper">
        <div class="row">
          <div class="col-xl-5">
            <div class="reservasi-cta">
              <div class="title">
                <h5 class="font-jakarta">Masih Ragu? Konsultasikan Sekarang!</h5>
                <p class="font-jakarta">Hubungi admin kami untuk melakukan konsultasi sebelum melakukan reservasi
                  layanan kami. Tim kami akan melakukan observasi dan diagnosa kerusakan perangkatmu.</p>
              </div>
              <div class="button">
                <button class="bg-purple text-white"><a href="https://wa.me/6282257423118?text=Halo,%20saya%20ingin%20konsultasi%20&%20reservasi%20service%20smartphone" class="text-decoration-none text-white">Hubungi Kami</a></button>
              </div>
            </div>
          </div>
          <div class="col-xl-7">
            <div class="reservasi-image">
              <img src="{{ url('images/mockuptrans.png') }}" alt="mmockup">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End : reservasi -->
</main>
@endsection