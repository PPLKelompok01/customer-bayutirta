@extends('layout')

@section('title', 'Bayu Celluler | Service')

@section('content')
  
<main>
  <div class="article-detail">
    <div class="container">
      <div class="title">
        <span class="tag">
          article
        </span>
        <div class="desc">
          <h5 class="text font-jakarta">{{$detail->judul}}</h5>
          <div class="user">
            <div class="profile">
              <div class="image">
                <img src="{{ url('images/profiledev1.png') }}" alt="profile">
              </div>
              <div class="position">
                <h5>{{$detail->nama_penulis}}</h5>
                <p>{{$detail->title_penulis}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="article-detail-image">
            <img src="" alt="">
            <img src="images/artikel/{{$detail->foto}}" onerror="this.src='{{ url('images/articledetail.png') }}';" alt="images/articledetail.png">
          </div>
          <div class="article-detail-icon">
            <a href="{{ url("/articledetail/suka/$detail->id_artikel") }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
              </svg>
            </a>
            <span>{{$detail->suka}}</span>
          </div>
          <div class="article-detail-desc">
            <p class="font-jakarta">{{$detail->isi}}</p>
          </div>
        </div>
      </div>
    

  <div class="service-detail-navs">
    <div class="row">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs text-center" role="tablist">
        <div class="col-xl">
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab"><h3>Komentar</h3></a>
          </li>
        </div>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="container">
          <div class="review-testimonial">
            <div class="row">
              <div class="col-xl-12">
                @if (isset($komentar)AND $komentar->count()>0)
                @foreach ($komentar as $item)
                <div class="review-user">
                  <div class="ratings">
                    <div class="name">
                      <h5>{{$item->name}}</h5>
                    </div>
                  </div>
                </div>
                <div class="review-desc">
                  <p>"{{$item->komentar}}"</p>
                </div>
                <div class="review-date">
                  {{-- <p>{{$item->created_at->format('d-m-Y')}}</p> --}}
                  <p>{{ $item->created_at->diffForHumans() }}</p>
                </div>
                @endforeach
                @else
                <div class="message text-center">
                  <h3 class="fw-bold">Belum ada Komentar</h3>
                  <p>Isi Form Dibawah Ini Untuk Menambahkan Komentar</p>
              </div>  
                @endif
              </div>
              </div>
            </div>
            <div id="komentar" class="container tab-pane"><br>
              <div class="col-xl-12">
                <form action="{{ url("/articledetail/komentar/$detail->id_artikel") }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                <div class="consultation-form">
                  <h3>Tambah Komentar</h3><br>
                  <div class="form">
                    <label for="name">Nama <span>*</span></label>
                    <div class="input">
                      <input type="text" name="name" placeholder="Masukkan nama anda">
                    </div>
                  </div>
                  <div class="form mt-xl-4">
                    <label for="name">Komentar <span>*</span></label>
                    <div class="input">
                      <textarea name="komentar" id="" cols="10" rows="5" placeholder="Masukkan komentar anda"></textarea>
                    </div>
                  </div>
                  <div class="button-form">
                    <button>Kirim</button>
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

  <!-- Devices -->
  <div class="devices">
    <div class="container">
      <div class="row">
        <div class="col-xl-6">
          <div class="details-title">
            <h5 class="font-jakarta">Baca Artikel lainnya</h5>
            </p>
          </div>
        </div>
      </div>
      <div class="devices-item m-0">
        <div class="row">
          @if (isset($artikel))
          @foreach ($artikel as $item)
          <div class="col-xl-4">
            <a href="{{ url("/articledetail/$item->id_artikel") }}" class="text-decoration-none">
            <div class="card border-0 ">
              <img class="card-img-top" src="images/artikel/{{$item->foto}}" onerror="this.src='{{ url('images/articledetail.png') }}';" alt="images/articledetail.png">
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
          @endif
          {{-- <div class="col-xl-4">
            <div class="card border-0 ">
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
            </div>
          </div>
          <div class="col-xl-4">
            <div class="card border-0 ">
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
            </div>
          </div> --}}

        </div>
      </div>
    </div>
  </div>
  <!-- End : devices -->
</main>
@endsection