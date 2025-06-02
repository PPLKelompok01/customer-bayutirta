@extends('layout')
@section('title', 'Bayu Celluler | FAQ')
@section('content')

<!-- Hero -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 align-self-center">
                <div class="hero-desc">
                    <h1 class="font-jakarta">FAQ</h1>
                    <p>Frequently Asked Questions</p>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="hero-image">
                    <img src="{{ url('images/herosection.png') }}" alt="Ilustrasi layanan FAQ">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero -->

<!-- Search -->
<div class="bg-white py-5 d-flex justify-content-center align-items-center">
    <div style="width: 90%; max-width: 1000px;">
        <div class="text-center mb-3">
            <h5>How can we help?</h5>
        </div>
        <div class="input-group">
            <input id="searchInput" type="text" class="form-control form-control-lg rounded-pill"
                placeholder="Type your question">
        </div>
    </div>
</div>
<!-- End Search -->

<!-- FAQ -->
<section class="faq-section fade-page" id="question">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-title text-center">
                    <h2 class="font-jakarta">Frequently Asked Questions</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion" id="faqAccordion">

                    {{-- Semua item FAQ sama seperti yang kamu punya, tidak perlu diubah --}}
                    @for ($i = 1; $i <= 10; $i++)
                        @php
                        $faq=[
                        1=> ["Berapa lama waktu yang dibutuhkan untuk service handphone saya?", "Waktu service bervariasi tergantung pada jenis kerusakan..."],
                        2 => ["Apakah saya perlu membuat janji temu untuk service handphone?", "Anda tidak perlu membuat janji temu terlebih dahulu..."],
                        3 => ["Apakah Bayu Tirta Cell menyediakan garansi untuk service?", "Ya, kami memberikan garansi untuk setiap perbaikan dan penggantian..."],
                        4 => ["Apa saja merk handphone yang bisa diperbaiki di Bayu Tirta Cell?", "Kami melayani perbaikan untuk hampir semua merk handphone Android..."],
                        5 => ["Apakah Bayu Tirta Cell menjual aksesoris handphone?", "Tentu saja! Kami juga menyediakan berbagai macam aksesoris handphone..."],
                        6 => ["Apakah Bayu Tirta Cell menerima service untuk tablet atau iPad?", "Ya, kami juga menerima perbaikan untuk tablet dan iPad dengan jenis kerusakan tertentu."],
                        7 => ["Apa yang harus saya lakukan jika handphone saya terkena air?", "Segera matikan handphone dan bawa ke tempat service. Jangan mencoba menyalakan kembali sebelum diperiksa."],
                        8 => ["Apakah saya bisa mengecek status perbaikan handphone saya secara online?", "Kami sedang mengembangkan sistem pelacakan online. Untuk sementara, Anda bisa menghubungi kami langsung."],
                        9 => ["Berapa biaya rata-rata untuk service layar pecah?", "Biaya tergantung pada merk dan tipe handphone, tetapi kami selalu memberikan estimasi harga terlebih dahulu."],
                        10 => ["Apakah suku cadang yang digunakan asli?", "Kami selalu menggunakan suku cadang original atau berkualitas tinggi sesuai pilihan pelanggan."]
                        ];
                        $page = $i <= 5 ? 1 : 2;
                            @endphp

                            <div class="accordion-item" data-page="{{ $page }}">
                            <h2 class="accordion-header" id="heading{{ $i }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $i }}" aria-expanded="false"
                                    aria-controls="collapse{{ $i }}">
                                    {{ $faq[$i][0] }}
                                </button>
                            </h2>
                            <div id="collapse{{ $i }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $i }}"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{ $faq[$i][1] }}
                                </div>
                            </div>
                </div>
                @endfor

            </div>

            <!-- Jika tidak ada hasil pencarian -->
            <div id="noResults" class="text-center mt-3 text-muted" style="display: none;">
                Tidak ada hasil ditemukan.
            </div>

            <!-- Pagination Control -->
            <div class="text-center mt-4" id="pagination">
                <button class="btn btn-outline-primary me-2" onclick="changePage(-1)"
                    aria-label="Halaman Sebelumnya">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <span id="page-indicator">Halaman 1 dari 2</span>
                <button class="btn btn-outline-primary ms-2" onclick="changePage(1)"
                    aria-label="Halaman Selanjutnya">
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End FAQ -->

<script>
    let currentPage = 1;
    const totalPages = 2;

    function showPage(page) {
        document.querySelectorAll('.accordion-item').forEach(item => {
            const pageAttr = parseInt(item.getAttribute('data-page'));
            item.style.display = (pageAttr === page) ? 'block' : 'none';
        });
        document.getElementById('page-indicator').innerText = `Halaman ${page} dari ${totalPages}`;
    }

    function changePage(direction) {
        currentPage += direction;
        if (currentPage < 1) currentPage = 1;
        if (currentPage > totalPages) currentPage = totalPages;
        showPage(currentPage);
    }

    document.addEventListener('DOMContentLoaded', () => {
        showPage(currentPage);

        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', function() {
            const keyword = this.value.toLowerCase().trim();
            let matchCount = 0;

            document.querySelectorAll('.accordion-item').forEach(item => {
                const question = item.querySelector('.accordion-button').innerText.toLowerCase();
                const answer = item.querySelector('.accordion-body').innerText.toLowerCase();

                if (question.includes(keyword) || answer.includes(keyword)) {
                    item.style.display = 'block';
                    matchCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Tampilkan pesan jika tidak ada hasil
            document.getElementById('noResults').style.display = (matchCount === 0 && keyword) ? 'block' : 'none';

            // Sembunyikan pagination jika sedang search
            document.getElementById('pagination').style.display = (keyword.length > 0) ? 'none' : 'block';

            // Kembalikan ke halaman normal jika tidak ada keyword
            if (keyword.length === 0) {
                showPage(currentPage);
            }
        });
    });
</script>

@endsection