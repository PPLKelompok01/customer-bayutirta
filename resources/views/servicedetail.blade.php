@extends('layout')

@section('title', 'Bayu Celluler | ServiceDetail')

@section('content')


<main>
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
</main>

@endsection