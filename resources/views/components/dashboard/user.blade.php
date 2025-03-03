<x-dashboard.layouts.layout-dashboard>

    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:header>{{ $header }}</x-slot:header> <!-- Mengisi slot "header" -->

    <x-slot:main>
        <section class="bg-white dark:bg-gray-900 lg:px-8 rounded-lg ">
            <div class="grid max-w-screen-xl px-4 py-8 mx-5 lg:gap-8 xl:gap-12 lg:py-8 lg:grid-cols-12 items-center">
                <!-- Bagian Gambar -->
                <div class="lg:col-span-5 flex justify-center lg:justify-start">
                    <img src="{{ asset('assets/images/photo.png') }}" alt="mockup"
                        class="lg:ms-10 lg:w-[300px] w-[150px] my-5 rounded-full object-cover shadow-md shadow-sky-200/90" />
                </div>

                <!-- Bagian Konten -->
                <div class="lg:col-span-7 lg:me-12 text-center lg:text-left">
                    <h4>Hi!</h4>
                    <h1
                        class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                        I'm <span>Sulaiman Faqih</span>
                    </h1>
                    <h3 class="lg:text-xl text-gray-700 mb-6">
                        Saya Seorang <span id="specialist" class="italic font-bold text-[#111827]">Back-End
                            Developer</span>
                    </h3>
                    <ul
                        class="max-w-2xl mb-6 font-light text-gray-700 lg:mb-8 md:text-lg lg:text-md text-justify list-disc">
                        <li>Dengan pengalaman lebih dari 1 tahun dalam merancang
                            dan memelihara RESTful API yang andal untuk platform web dan seluler.</li>
                        <li>Berpengalaman dalam mengintegrasikan layanan eksternal seperti Payment Gateway dan layanan
                            API
                            pihak ketiga seperti
                            PPOB, daftar universitas dan wilayah administratif yang ada di Indonesia.</li>
                        <li>Terampil dalam mengoptimalkan arsitektur database menggunakan teknologi relasional database.
                        </li>
                        <li>Terampil dalam menggunakan Node.js, dengan framework NestJS, Express.JS dan Laravel 11 untuk
                            menciptakan
                            solusi
                            backend yang aman, dapat diskalakan, dan berkinerja tinggi.</li>
                        <li>Dikenal karena pendekatan proaktif dalam memecahkan masalah dan komitmen terhadap hasil yang
                            berdampak.</li>
                    </ul>
                    <div class="login-box">
                        <form>
                            <a href="#" id="box" class="btn-box">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <i>Hire Me!</i>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </x-slot:main>

</x-dashboard.layouts.layout-dashboard>
