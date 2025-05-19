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

    <!-- Service -->
    <!-- shape -->
    <div class="bg-white py-5 d-flex justify-content-center align-items-center">
        <div style="width: 90%; max-width: 1000px;">
            <div class="text-center mb-3">
                <h5>How can we help?</h5>
            </div>
            <div class="input-group">
                <input type="text" class="form-control form-control-lg rounded-start-pill" placeholder="Type your question">
                <span class="input-group-text bg-white border-1 rounded-end-pill">
                    <i class="bi bi-search"></i>
                </span>
            </div>
        </div>
    </div>
    </div>
    </section>
    <!-- End : Service -->


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
                        <!-- Item 1 -->
                        <div class="accordion-item" data-page="1">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Berapa lama waktu yang dibutuhkan untuk service handphone saya?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Waktu service bervariasi tergantung pada jenis kerusakan...
                                </div>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="accordion-item" data-page="1">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Apakah saya perlu membuat janji temu untuk service handphone?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Anda tidak perlu membuat janji temu terlebih dahulu...
                                </div>
                            </div>
                        </div>

                        <!-- Item 3 -->
                        <div class="accordion-item" data-page="1">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Apakah Bayu Tirta Cell menyediakan garansi untuk service?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ya, kami memberikan garansi untuk setiap perbaikan dan penggantian...
                                </div>
                            </div>
                        </div>

                        <!-- Item 4 -->
                        <div class="accordion-item" data-page="1">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Apa saja merk handphone yang bisa diperbaiki di Bayu Tirta Cell?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Kami melayani perbaikan untuk hampir semua merk handphone Android...
                                </div>
                            </div>
                        </div>

                        <!-- Item 5 -->
                        <div class="accordion-item" data-page="1">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Apakah Bayu Tirta Cell menjual aksesoris handphone?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Tentu saja! Kami juga menyediakan berbagai macam aksesoris handphone...
                                </div>
                            </div>
                        </div>

                        <!-- Item 6 -->
                        <div class="accordion-item" data-page="2">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Apakah Bayu Tirta Cell menerima service untuk tablet atau iPad?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ya, kami juga menerima perbaikan untuk tablet dan iPad dengan jenis kerusakan tertentu.
                                </div>
                            </div>
                        </div>

                        <!-- Item 7 -->
                        <div class="accordion-item" data-page="2">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    Apa yang harus saya lakukan jika handphone saya terkena air?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Segera matikan handphone dan bawa ke tempat service. Jangan mencoba menyalakan kembali
                                    sebelum diperiksa.
                                </div>
                            </div>
                        </div>

                        <!-- Item 8 -->
                        <div class="accordion-item" data-page="2">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    Apakah saya bisa mengecek status perbaikan handphone saya secara online?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Kami sedang mengembangkan sistem pelacakan online. Untuk sementara, Anda bisa
                                    menghubungi kami langsung.
                                </div>
                            </div>
                        </div>

                        <!-- Item 9 -->
                        <div class="accordion-item" data-page="2">
                            <h2 class="accordion-header" id="headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                    Berapa biaya rata-rata untuk service layar pecah?
                                </button>
                            </h2>
                            <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Biaya tergantung pada merk dan tipe handphone, tetapi kami selalu memberikan estimasi
                                    harga terlebih dahulu.
                                </div>
                            </div>
                        </div>

                        <!-- Item 10 -->
                        <div class="accordion-item" data-page="2">
                            <h2 class="accordion-header" id="headingTen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                    Apakah suku cadang yang digunakan asli?
                                </button>
                            </h2>
                            <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Kami selalu menggunakan suku cadang original atau berkualitas tinggi sesuai pilihan
                                    pelanggan.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination Control -->
                    <div class="text-center mt-4">
                        <button class="btn btn-outline-primary me-2" onclick="changePage(-1)">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                        <span id="page-indicator">Halaman 1 dari 2</span>
                        <button class="btn btn-outline-primary ms-2" onclick="changePage(1)">
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
                const pageAttr = item.getAttribute('data-page');
                item.style.display = (parseInt(pageAttr) === page) ? 'block' : 'none';
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
        });
    </script>

@endsection