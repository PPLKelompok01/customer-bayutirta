@extends('layout')

@section('title', 'Bayu Celluler | Service')

@section('content')
<main>
  <section class="serviceus">
    <div class="serviceus-image">
      <div class="image">
        <img src="{{ url('images/articlehero.png') }}" alt="hero">
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-xl-5">
          <div class="serviceus-title">
            <h2 class="font-jakarta">Artikel</h2>
            <p>Beberapa tulisan dari tim kami untuk kamu agar semakin memahami perangkat kamu.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Devices -->
  <div class="devices">
    <div class="container">
      <div class="devices-item">
        <div class="row">
          @if (isset($artikel))
          @foreach ($artikel as $item)
          <div class="col-xl-4">
          <a href="{{ url("/articledetail/$item->id_artikel") }}" class="text-decoration-none">  <div class="card border-0 ">
            <img style="height: 270px; width: 415px; object-fit: cover; border-radius:20px" src="images/artikel/{{$item->foto}}" onerror="this.src='images/articledetail.png'" alt="images/articledetail.png">
            <div class="card-body p-0">
              <h5 class="card-title font-jakarta">{{$item->judul}}</h5>
              <p class="card-text font-jakarta">{{$item->isi}}</p>
            </div>
            <div class="card-profile">
              <div class="image">
                <img src="{{ url('images/profiledev1.png') }}" alt="profile">
              </div>
              <div class="position">
                <h5>{{$item->nama_penulis}}</h5>
                <p>{{$item->title_penulis}}</p>
              </div>
            </div>
          </div></a>
          </div>
          @endforeach
        @else
        <div class="picture">
                <img src="/img/ALT 4.png" alt="noservice">
            </div>
            <div class="message text-center">
                <h3 class="fw-bold">Belum ada layanan yang dibuat</h3>
                <p>Buat dan atur layanan yang bisa diakses pelangganmu!</p>
                <p>Klik button “Tambah Layanan” di atas kanan halaman ini</p>
            </div>
        @endif
          {{-- <div class="col-xl-4">
            <a href="{{ url('/articledetail') }}" class="text-decoration-none"> <div class="card border-0 ">
              <img src="{{ url('images/devices2.png') }}" class="card-img-top" alt="devices">
              <div class="card-body p-0">
                <h5 class="card-title font-jakarta">Terhubung dengan HP Off</h5>
                <p class="card-text font-jakarta">Handphone menjadi alat yang wajib untuk dibawa kemana mana untuk
                  saat ini,
                  maka
                  dari itu per...</p>
              </div>
              <div class="card-profile">
                <div class="image">
                  <img src="{{ url('images/profiledev1.png') }}" alt="profile">
                </div>
                <div class="position">
                  <h5>Ralph Edwards</h5>
                  <p>5 min read</p>
                </div>
              </div>
            </div></a>
          </div>
          <div class="col-xl-4">
            <a href="{{ url('/articledetail') }}" class="text-decoration-none">  <div class="card border-0 ">
              <img src="{{ url('images/devices3.png') }}" class="card-img-top" alt="devices">
              <div class="card-body p-0">
                <h5 class="card-title font-jakarta">Merawat HP agar Awet</h5>
                <p class="card-text font-jakarta">Handphone menjadi alat yang wajib untuk dibawa kemana mana untuk
                  saat ini,
                  maka
                  dari itu per...</p>
              </div>
              <div class="card-profile">
                <div class="image">
                  <img src="{{ url('images/profiledev1.png') }}" alt="profile">
                </div>
                <div class="position">
                  <h5>Ralph Edwards</h5>
                  <p>5 min read</p>
                </div>
              </div>
            </div></a>
          
          </div>
          <div class="col-xl-4">
             <a href="{{ url('/articledetail') }}" class="text-decoration-none">  <div class="card border-0 ">
              <img src="{{ url('images/devices3.png') }}" class="card-img-top" alt="devices">
              <div class="card-body p-0">
                <h5 class="card-title font-jakarta">Merawat HP agar Awet</h5>
                <p class="card-text font-jakarta">Handphone menjadi alat yang wajib untuk dibawa kemana mana untuk
                  saat ini,
                  maka
                  dari itu per...</p>
              </div>
              <div class="card-profile">
                <div class="image">
                  <img src="{{ url('images/profiledev1.png') }}" alt="profile">
                </div>
                <div class="position">
                  <h5>Ralph Edwards</h5>
                  <p>5 min read</p>
                </div>
              </div>
            </div></a>
          
          </div>
          <div class="col-xl-4">
             <a href="{{ url('/articledetail') }}" class="text-decoration-none"> <div class="card border-0 ">
              <img src="{{ url('images/devices3.png') }}" class="card-img-top" alt="devices">
              <div class="card-body p-0">
                <h5 class="card-title font-jakarta">Merawat HP agar Awet</h5>
                <p class="card-text font-jakarta">Handphone menjadi alat yang wajib untuk dibawa kemana mana untuk
                  saat ini,
                  maka
                  dari itu per...</p>
              </div>
              <div class="card-profile">
                <div class="image">
                  <img src="{{ url('images/profiledev1.png') }}" alt="profile">
                </div>
                <div class="position">
                  <h5>Ralph Edwards</h5>
                  <p>5 min read</p>
                </div>
              </div>
            </div></a>
           
          </div>
          <div class="col-xl-4">
             <a href="{{ url('/articledetail') }}" class="text-decoration-none"><div class="card border-0 ">
              <img src="{{ url('images/devices3.png') }}" class="card-img-top" alt="devices">
              <div class="card-body p-0">
                <h5 class="card-title font-jakarta">Merawat HP agar Awet</h5>
                <p class="card-text font-jakarta">Handphone menjadi alat yang wajib untuk dibawa kemana mana untuk
                  saat ini,
                  maka
                  dari itu per...</p>
              </div>
              <div class="card-profile">
                <div class="image">
                  <img src="{{ url('images/profiledev1.png') }}" alt="profile">
                </div>
                <div class="position">
                  <h5>Ralph Edwards</h5>
                  <p>5 min read</p>
                </div>
              </div>
            </div></a>
            
          </div> --}}
        </div>
      </div>
    </div>
  </div>
  <!-- End : devices -->
  <!-- Reservasi -->
  <div class="reservasi  bg-blacker">
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
