@extends('layout')

@section('title', 'Bayu Celluler | KatalogDetail')

@section('content')

<main>
  <div class="service-detail">
    <div class="container">
      <div class="row align-items-lg-center">
        <div class="col-xl-5">
          <div class="service-detail-image">
            <img src="{{ asset('images/katalog/'.$detail->foto) }}" style="max-height: 400px; border-radius: 20px">
          </div>
        </div>
        <div class="col-xl-5">
          <div class="service-detail-desc">
            <h5 class="title font-jakarta">{{ $detail->judul }}</h5>
            <div class="price font-jakarta">Rp. {{ number_format($detail->harga, 0, ',', '.') }}</div><br>
            <div class="list">
              <ul>
                @foreach(explode(',', $detail->deskripsi) as $desc)
                  <li>{{ trim($desc) }}</li>
                @endforeach
              </ul>
            </div>
            <div class="action">
              <button>
                <a href="https://wa.me/6282257423118?text={{ urlencode('Halo, saya ingin membeli produk: ' . $detail->judul) }}" 
                  class="text-decoration-none text-white" target="_blank">Beli</a>
              </button>
              <div class="logo mt-3">
                @if ($detail->Kategori == 'xiaomi')
                  <div class="brand"><img src="{{ url('images/xiaomi.png') }}" alt="brand"></div>
                @elseif ($detail->Kategori == 'samsung')
                  <div class="brand"><img src="{{ url('images/samsung.png') }}" alt="brand"></div>
                @elseif ($detail->Kategori == 'oppo')
                  <div class="brand"><img src="{{ url('images/oppo.png') }}" alt="brand"></div>
                @elseif ($detail->Kategori == 'vivo')
                  <div class="brand"><img src="{{ url('images/vivo.png') }}" alt="brand"></div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Section Diskusi -->
      <div class="service-detail-navs mt-5">
        <h5 class="mb-4 font-jakarta">Diskusi Produk</h5>
        <div class="filter mb-3">
          <div class="dropdown d-inline">
            <button class="btn btn-secondary dropdown-toggle" style="background-color:#F0F0F0; color:black" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              Sort By
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <li><a class="dropdown-item" href="{{ url()->current() }}?sort=terbaru">Terbaru</a></li>
              <li><a class="dropdown-item" href="{{ url()->current() }}?sort=terlama">Terlama</a></li>
            </ul>
          </div>
          <button id="tambah-diskusi" class="btn btn-primary ms-3">Tambah Diskusi</button>
        </div>

        @if(isset($diskusi) && $diskusi->isNotEmpty())
          @foreach($diskusi as $item)
          <div class="review-testimonial border rounded p-3 mb-3">
            <div class="d-flex justify-content-between align-items-center">
              <div class="diskusi-name">
                <h5>{{ $item->name }}</h5>
                <p class="text-muted">{{ $item->created_at->format('d-m-Y') }}</p>
              </div>
              <div class="dropdown">
                <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  ...
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item text-danger" href="{{ url("/katalogdetail/delete/$item->id_diskusi") }}">Hapus Komentar</a></li>
                </ul>
              </div>
            </div>
            <div class="diskusi-content mt-2">
              <p>{{ $item->isi }}</p>
            </div>
          </div>
          @endforeach
        @else
        <div class="message text-center">
          <h3 class="fw-bold">Belum ada diskusi</h3>
        </div>
        @endif

        <!-- Form Tambah Diskusi -->
        <div id="komentar" class="mt-5">
          <form action="{{ url("/katalogdetail/diskusi/$detail->id_penjualan") }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="consultation-form">
              <h3>Tambah Komentar</h3><br>
              <div class="form mb-3">
                <label for="name">Nama<span>*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama anda" required>
              </div>
              <div class="form mb-3">
                <label for="isi">Komentar<span>*</span></label>
                <textarea name="isi" class="form-control" rows="5" placeholder="Masukkan isi komentar anda" required></textarea>
              </div>
              <button type="submit" class="btn btn-success">Kirim</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

<script>
  document.getElementById("tambah-diskusi").addEventListener("click", function() {
      document.getElementById("komentar").scrollIntoView({ behavior: 'smooth' });
  });
</script>
</main>
@endsection
