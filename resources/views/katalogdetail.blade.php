@extends('layout')

@section('title', 'Bayu Celluler | KatalogDetail')

@section('content')

<main>
  <div class="service-detail">
    <div class="container">
      <div class="row align-items-lg-center">
        <div class="col-xl-5">
          <div class="service-detail-image">
          <img src="../images/katalog/{{$detail->foto}}">
          </div>
        </div>
        <div class="col-xl-5">
          <div class="service-detail-desc">
            <h5 class="title font-jakarta">{{$detail->judul}}</h5>
            <div class="price font-jakarta">Rp. {{ number_format($detail->harga, 0, ',', '.') }}
            </div>
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
            <div id="review" class="container tab-pane fade"><br>
              <div class="review">
                <h5>Semua Diskusi</h5>
                <div class="filter">
                  <a href="" class="sort">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect width="48" height="48" rx="24" fill="#F0F0F0" />
                      <path
                        d="M25.125 23.625V32.25C25.125 32.5484 25.0065 32.8345 24.7955 33.0455C24.5845 33.2565 24.2984 33.375 24 33.375C23.7016 33.375 23.4155 33.2565 23.2045 33.0455C22.9935 32.8345 22.875 32.5484 22.875 32.25V23.625C22.875 23.3266 22.9935 23.0405 23.2045 22.8295C23.4155 22.6185 23.7016 22.5 24 22.5C24.2984 22.5 24.5845 22.6185 24.7955 22.8295C25.0065 23.0405 25.125 23.3266 25.125 23.625ZM30.75 30C30.4516 30 30.1655 30.1185 29.9545 30.3295C29.7435 30.5405 29.625 30.8266 29.625 31.125V32.25C29.625 32.5484 29.7435 32.8345 29.9545 33.0455C30.1655 33.2565 30.4516 33.375 30.75 33.375C31.0484 33.375 31.3345 33.2565 31.5455 33.0455C31.7565 32.8345 31.875 32.5484 31.875 32.25V31.125C31.875 30.8266 31.7565 30.5405 31.5455 30.3295C31.3345 30.1185 31.0484 30 30.75 30ZM33 26.25H31.875V15.75C31.875 15.4516 31.7565 15.1655 31.5455 14.9545C31.3345 14.7435 31.0484 14.625 30.75 14.625C30.4516 14.625 30.1655 14.7435 29.9545 14.9545C29.7435 15.1655 29.625 15.4516 29.625 15.75V26.25H28.5C28.2016 26.25 27.9155 26.3685 27.7045 26.5795C27.4935 26.7905 27.375 27.0766 27.375 27.375C27.375 27.6734 27.4935 27.9595 27.7045 28.1705C27.9155 28.3815 28.2016 28.5 28.5 28.5H33C33.2984 28.5 33.5845 28.3815 33.7955 28.1705C34.0065 27.9595 34.125 27.6734 34.125 27.375C34.125 27.0766 34.0065 26.7905 33.7955 26.5795C33.5845 26.3685 33.2984 26.25 33 26.25ZM17.25 27C16.9516 27 16.6655 27.1185 16.4545 27.3295C16.2435 27.5405 16.125 27.8266 16.125 28.125V32.25C16.125 32.5484 16.2435 32.8345 16.4545 33.0455C16.6655 33.2565 16.9516 33.375 17.25 33.375C17.5484 33.375 17.8345 33.2565 18.0455 33.0455C18.2565 32.8345 18.375 32.5484 18.375 32.25V28.125C18.375 27.8266 18.2565 27.5405 18.0455 27.3295C17.8345 27.1185 17.5484 27 17.25 27ZM19.5 23.25H18.375V15.75C18.375 15.4516 18.2565 15.1655 18.0455 14.9545C17.8345 14.7435 17.5484 14.625 17.25 14.625C16.9516 14.625 16.6655 14.7435 16.4545 14.9545C16.2435 15.1655 16.125 15.4516 16.125 15.75V23.25H15C14.7016 23.25 14.4155 23.3685 14.2045 23.5795C13.9935 23.7905 13.875 24.0766 13.875 24.375C13.875 24.6734 13.9935 24.9595 14.2045 25.1705C14.4155 25.3815 14.7016 25.5 15 25.5H19.5C19.7984 25.5 20.0845 25.3815 20.2955 25.1705C20.5065 24.9595 20.625 24.6734 20.625 24.375C20.625 24.0766 20.5065 23.7905 20.2955 23.5795C20.0845 23.3685 19.7984 23.25 19.5 23.25ZM26.25 18.75H25.125V15.75C25.125 15.4516 25.0065 15.1655 24.7955 14.9545C24.5845 14.7435 24.2984 14.625 24 14.625C23.7016 14.625 23.4155 14.7435 23.2045 14.9545C22.9935 15.1655 22.875 15.4516 22.875 15.75V18.75H21.75C21.4516 18.75 21.1655 18.8685 20.9545 19.0795C20.7435 19.2905 20.625 19.5766 20.625 19.875C20.625 20.1734 20.7435 20.4595 20.9545 20.6705C21.1655 20.8815 21.4516 21 21.75 21H26.25C26.5484 21 26.8345 20.8815 27.0455 20.6705C27.2565 20.4595 27.375 20.1734 27.375 19.875C27.375 19.5766 27.2565 19.2905 27.0455 19.0795C26.8345 18.8685 26.5484 18.75 26.25 18.75Z"
                        fill="black" />
                    </svg>
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
                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M14.625 12C14.625 12.5192 14.471 13.0267 14.1826 13.4584C13.8942 13.8901 13.4842 14.2265 13.0045 14.4252C12.5249 14.6239 11.9971 14.6758 11.4879 14.5746C10.9787 14.4733 10.511 14.2233 10.1438 13.8562C9.77673 13.489 9.52673 13.0213 9.42544 12.5121C9.32415 12.0029 9.37614 11.4751 9.57482 10.9955C9.7735 10.5158 10.11 10.1058 10.5416 9.81739C10.9733 9.52895 11.4808 9.375 12 9.375C12.6962 9.375 13.3639 9.65156 13.8562 10.1438C14.3484 10.6361 14.625 11.3038 14.625 12ZM4.5 9.375C3.98083 9.375 3.47331 9.52895 3.04163 9.81739C2.60995 10.1058 2.2735 10.5158 2.07482 10.9955C1.87614 11.4751 1.82415 12.0029 1.92544 12.5121C2.02673 13.0213 2.27673 13.489 2.64385 13.8562C3.01096 14.2233 3.47869 14.4733 3.98789 14.5746C4.49709 14.6758 5.02489 14.6239 5.50455 14.4252C5.9842 14.2265 6.39417 13.8901 6.68261 13.4584C6.97105 13.0267 7.125 12.5192 7.125 12C7.125 11.3038 6.84844 10.6361 6.35616 10.1438C5.86387 9.65156 5.19619 9.375 4.5 9.375ZM19.5 9.375C18.9808 9.375 18.4733 9.52895 18.0416 9.81739C17.61 10.1058 17.2735 10.5158 17.0748 10.9955C16.8761 11.4751 16.8242 12.0029 16.9254 12.5121C17.0267 13.0213 17.2767 13.489 17.6438 13.8562C18.011 14.2233 18.4787 14.4733 18.9879 14.5746C19.4971 14.6758 20.0249 14.6239 20.5045 14.4252C20.9842 14.2265 21.3942 13.8901 21.6826 13.4584C21.971 13.0267 22.125 12.5192 22.125 12C22.125 11.6553 22.0571 11.3139 21.9252 10.9955C21.7933 10.677 21.5999 10.3876 21.3562 10.1438C21.1124 9.90009 20.823 9.70673 20.5045 9.57482C20.1861 9.4429 19.8447 9.375 19.5 9.375Z" fill="black" fill-opacity="0.4" />
                              </svg>
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