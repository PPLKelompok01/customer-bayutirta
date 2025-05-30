@extends('layout')

@section('title', 'Bayu Celluler | KatalogDetail')

@section('content')

<main>
  <div class="service-detail">
    <div class="container">
      <div class="row align-items-lg-center">
        <div class="col-xl-12">
          <div class="service-detail-image text-center mb-5">
            <img src="../images/katalog/{{$detail->foto}}" style="max-height: 400px;">
          </div>
        </div>
      </div>

      <div class="service-detail-navs">
        <div class="row">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs text-center" role="tablist">
            <div class="col-xl-6">
              <li class="nav-item ">
                <a class="nav-link active" data-bs-toggle="tab" href="#deskripsi">Deskripsi</a>
              </li>
            </div>
            <div class="col-xl-6">
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#review">Diskusi</a>
              </li>
            </div>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div id="deskripsi" class="container tab-pane active"><br>
              <div class="service-detail-desc">
                <h5 class="title font-jakarta">{{$detail->judul}}</h5>
                <div class="price font-jakarta">Rp. {{ number_format($detail->harga, 0, ',', '.') }}</div>
                <div class="list">
                  <ul>
                      @foreach(explode(',', $detail->deskripsi) as $desc)
                          <li>{{ trim($desc) }}</li>
                      @endforeach
                  </ul>
                </div>
                <div class="action">
                  <button><a href="https://wa.me/6282257423118?text={{ urlencode('Halo, saya ingin membeli produk: ' . $detail->judul) }}" 
                      class="text-decoration-none text-white" target="_blank"> Beli</a></button>
                  <div class="logo">
                      @if ($detail->Kategori == 'xiaomi')
                          <div class="brand">
                              <img src="{{ url('images/xiaomi.png') }}" alt="brand">
                          </div>
                      @elseif ($detail->Kategori == 'samsung')
                          <div class="brand">
                              <img src="{{ url('images/samsung.png') }}" alt="brand">
                          </div>
                      @elseif ($detail->Kategori == 'oppo')
                          <div class="brand">
                              <img src="{{ url('images/oppo.png') }}" alt="brand">
                          </div>
                      @elseif ($detail->Kategori == 'vivo')
                          <div class="brand">
                              <img src="{{ url('images/vivo.png') }}" alt="brand">
                          </div>
                      @endif
                  </div>
                </div>
              </div>
            </div>

            <div id="review" class="container tab-pane fade"><br>
              <div class="review">
                <h5>Semua Diskusi</h5>
                <div class="filter">
                  <a href="" class="sort">
                    <svg width="48" height="48" ... (kode icon tetap sama) ... </svg>
                  </a>
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle news font-jakarta" style="background-color:#F0F0F0; color:black" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort By
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ url()->current() }}?sort=terbaru">Terbaru</a></li>
                        <li><a class="dropdown-item" href="{{ url()->current() }}?sort=terlama">Terlama</a></li>
                    </ul>
                  </div>
                  <button id="tambah-diskusi">Tambah Diskusi</button>
                </div> 
              </div>
              
              @foreach($diskusi as $item)
              @if(isset($diskusi) && $diskusi->isNotEmpty()) 
              <div class="review-testimonial">
                <div class="row">
                  <div class="row">
                    <div class="diskusi">
                      <div class="ratings">
                        <div class="diskusi-name">
                          <h5>{{$item->name}}</h5>
                          <p class="diskusi-date">{{$item->created_at->format('d-m-Y')}}</p>
                        </div>
                      </div>
                      <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:transparent; border:none">
                              <svg width="24" height="24" ... (kode icon tetap sama) ... </svg>
                          </button>
                          <ul class="dropdown-menu" style="background-color: red;" aria-labelledby="dropdownMenuButton">
                              <li><a class="dropdown-item" style="color:white" href="{{ url("/katalogdetail/delete/$item->id_diskusi") }}">Delete Diskusi?</a></li>
                          </ul>
                      </div>
                    </div>
                    <div class="diskusi-content">
                      <p>{{$item->isi}}</p>
                    </div>
                  </div>
                </div>
              </div>
              @else
              <div class="message text-center">
                  <h3 class="fw-bold">Belum ada diskusi</h3>
              </div>  
              @endif
              @endforeach

            <div id="komentar" class="container tab-pane"><br>
              <div class="col-xl-12">
              <form action="{{ url("/katalogdetail/diskusi/$detail->id_penjualan") }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="consultation-form">
                  <h3>Tambah Diskusi</h3><br>
                  <div class="form">
                      <label for="name">Nama<span>*</span></label>
                      <div class="input">
                          <input type="text" name="name" placeholder="Masukkan nama anda" required>
                      </div>
                  </div>
                  <div class="form mt-xl-4">
                      <label for="name">Komentar<span>*</span></label>
                      <div class="input">
                          <textarea name="isi" id="" cols="10" rows="5" placeholder="Masukkan isi diskusi anda" required></textarea>
                      </div>
                  </div>
                  <div class="button-form">
                      <button type="submit">Kirim</button>
                  </div>
              </div>
              </form>
          </div>
          </div>

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
