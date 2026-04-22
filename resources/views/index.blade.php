@extends('layouts.app')

@section('title', 'PSB Wilayah Zaid bin Tsabit Putra — PP Nurul Jadid')
@section('meta_description',
    'Penerimaan Santri Baru Wilayah Zaid bin Tsabit Putra Pondok Pesantren Nurul Jadid.
    Daftarkan putra Anda sekarang untuk tahun ajaran baru.')

@section('content')

    {{-- ============================================================ --}}
    {{-- HERO SECTION                                                  --}}
    {{-- ============================================================ --}}
    @if (session('success'))
        <div class="bg-green-50 border-b border-green-200 py-3 px-4 text-center mt-[76px] relative z-20">
            <div class="max-w-5xl mx-auto flex items-center justify-center gap-2">
                <svg width="20" height="20" fill="currentColor" class="text-green-600 flex-shrink-0" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12 3.41 13.41 9 19 21 7l-1.41-1.41L9 16.17z" />
                </svg>
                <div class="text-green-800 font-medium text-sm md:text-base">
                    {!! session('success') !!}
                </div>
            </div>
        </div>
    @endif

    <section
        class="bg-[#4A3B2A] md:bg-[url('{{ asset('assets/images/Big-Banner.jpg') }}')] md:bg-cover md:bg-center md:bg-no-repeat min-h-[60vh] md:min-h-screen flex items-center justify-center py-12 md:py-20 @if (!session('success')) mt-16 md:mt-20 @endif">
        <div class="max-w-5xl mx-auto px-4 text-center" data-aos="fade-up">
            <div class="section-subtitle mb-4 text-[#D4B483] md:text-[#9A7B4F]">
                ✦ Penerimaan Santri Baru ✦
            </div>
            <h1 class="font-serif text-white md:text-[#4A3B2A] font-bold mb-6"
                style="font-size:clamp(2rem,5vw,3.5rem);line-height:1.15;font-family:'Playfair Display',serif;">
                Wilayah Zaid bin Tsabit Putra<br>
                <span class="text-[#D4B483] md:text-[#9A7B4F]">Pondok Pesantren Nurul Jadid</span>
            </h1>
            <p class="text-white/80 md:text-[#4A3B2A]/80 md:font-medium mb-10 max-w-2xl mx-auto text-lg leading-relaxed">
                Terciptanya Santri Yang Qur'ani, Berilmu, Dan Berakhlakul Karimah
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('pendaftaran') }}" class="btn-gold text-base px-8 py-4">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z" />
                    </svg>
                    Daftar Sekarang
                </a>
                <a href="{{ asset('assets/brosur/Brosur-PSB-2026.pdf') }}" download="Brosur_PSB_Zaid_bin_Tsabit_2026.pdf"
                    class="btn-white-outline md:!border-[#4A3B2A] md:!text-[#4A3B2A] md:hover:!bg-[#4A3B2A]/10 md:hover:!border-[#4A3B2A] md:hover:!text-[#4A3B2A] text-base px-8 py-4">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z" />
                    </svg>
                    Download Brosur
                </a>
            </div>

            {{-- Scroll indicator --}}
            <div class="mt-16 animate-bounce">
                <svg width="28" height="28" class="fill-white/60 md:fill-[#4A3B2A]/60" viewBox="0 0 24 24">
                    <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6z" />
                </svg>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- SEKILAS WILAYAH                                              --}}
    {{-- ============================================================ --}}
    <section id="sekilas" class="py-12 md:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                {{-- Image --}}
                <div data-aos="fade-right" class="relative">
                    <div style="border-radius:20px;overflow:hidden;box-shadow:0 30px 80px rgba(74,59,42,0.2);">
                        <img src="/assets/images/Profile.jpg" alt="Sekilas Wilayah Zaid bin Tsabit"
                            class="w-full h-80 lg:h-[480px] object-cover"
                            onerror="this.style.background='linear-gradient(135deg,#4A3B2A,#B59551)';this.style.height='480px';this.removeAttribute('onerror');">
                    </div>
                    {{-- Decorative badge --}}
                    <div
                        style="position:absolute;bottom:-20px;right:-20px;background:linear-gradient(135deg,#B59551,#D4B483);color:white;border-radius:16px;padding:1.25rem 1.5rem;box-shadow:0 8px 24px rgba(181,149,81,0.4);">
                        <div style="font-size:2rem;font-weight:800;line-height:1;">25+</div>
                        <div style="font-size:0.75rem;font-weight:500;">Tahun Berdiri</div>
                    </div>
                </div>

                {{-- Text --}}
                <div data-aos="fade-left">
                    <div class="section-subtitle">Tentang Kami</div>
                    <div class="gold-divider"></div>
                    <h2 class="section-title mb-6">Sekilas Wilayah<br>Zaid bin Tsabit Putra</h2>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Wilayah Zaid bin Tsabit merupakan salah satu wilayah satelit di pondok ini. Disebut sebagai wilayah
                        satelit karena secara lokasi terpisah dari pondok pusat dengan jarak sekitar 500 meter ke arah barat
                        laut. Selain itu, wilayah ini juga memiliki sistem pengelolaan kegiatan tersendiri dalam membina
                        santri. Meskipun demikian, wilayah ini tetap berada di bawah naungan Pondok Pesantren Nurul Jadid.
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Wilayah ini dirintis oleh KH. Moh. Hefni Mahfudz (menantu KH. Hasan Abdul Wafi dan keponakan KH.
                        Moh. Zuhri Zaini) pada tanggal 26 Januari 2000 M/19 Syawwal 1420 H. Pada awalnya, program yang ada
                        hanya Tahfidzul Qur'an, namun kini telah berkembang dengan berbagai program pendidikan, seperti
                        Tahfidzul Qur'an, Tahsinul Qiro'ah, Amtsilati, Excellent Language (Bahasa Asing), dan Madrasah
                        Diniyah Al-Insyiroh.
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Sejak awal berdiri hingga sekarang, wilayah ini mengalami perkembangan yang cukup signifikan, baik
                        dari segi jumlah santri, fasilitas, kualitas pendidikan, maupun prestasi. Hal ini berdampak pada
                        meningkatnya minat masyarakat untuk mendaftarkan putranya setiap tahun.
                    </p>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="feature-card py-4 px-5">
                            <div style="font-size:2rem;font-weight:800;color:#B59551;">500+</div>
                            <div class="text-sm text-gray-600 font-medium">Santri Aktif</div>
                        </div>
                        <div class="feature-card py-4 px-5">
                            <div style="font-size:2rem;font-weight:800;color:#B59551;">50+</div>
                            <div class="text-sm text-gray-600 font-medium">Tenaga Pengajar</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- JENJANG PENDIDIKAN                                           --}}
    {{-- ============================================================ --}}
    <section id="jenjang" class="py-12 md:py-20" style="background:#F8F5F0;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14" data-aos="fade-up">
                <div class="section-subtitle">Program Pendidikan</div>
                <div class="gold-divider mx-auto"></div>
                <h2 class="section-title">Jenjang Pendidikan</h2>
                <p class="text-gray-500 mt-4 max-w-xl mx-auto">Tersedia berbagai jenjang pendidikan formal terintegrasi
                    dengan pembinaan kepesantrenan.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @php
                    $jenjang = [
                        ['Tingkat Shifir', 'Berfokus pada materi Furudhul Ainiyah dan Imla\''],
                        ['Tingkat I\'dadiyah', 'Berfokus pada praktek pembinaan baca Al-Qur\'an.'],
                        ['Tingkat Awwaliyah', 'Berfokus pada materi cara membaca kitab kuning atau kitab gundul.'],
                        [
                            'Tingkat Wustho (Tahsinul Qiro\'ah)',
                            'Berfokus pada materi pendalaman ilmu tajwid, tahsinul khot, tilawah Al-Qur\'an serta hafalan surat Juz 30 dan Munjiyat.',
                        ],
                        ['Tingkat Wustho (Pasca Amtsilati)', 'Berfokus pada materi pendalaman kitab kuning lanjutan.'],
                        [
                            'Tingkat Wustho (Excellent Language)',
                            'Berfokus pada materi pengembangan bahasa asing (Arab/Inggris/Mandarin).',
                        ],
                        [
                            'Tingkat Wustho (Tahfidzul Qur\'an)',
                            'Berfokus pada menghafal ayat Al-Qur\'an dari Juz 1–30.',
                        ],
                    ];
                @endphp

                @foreach ($jenjang as $index => $item)
                    <div class="feature-card text-center" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                        <div class="icon-badge mx-auto">
                            <svg width="28" height="28" fill="white" viewBox="0 0 24 24">
                                <path d="M12 3L1 9l4 2.18V15h1v3H5v2h14v-2h-1v-3h1V11.18L19 9v1h2V9L12 3z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg mb-3" style="font-family:'Playfair Display',serif;color:#4A3B2A;">
                            {{ $item[0] }}</h3>
                        <p class="text-gray-500 text-sm mb-4 leading-relaxed">{{ $item[1] }}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- INFORMASI PENDAFTARAN                                        --}}
    {{-- ============================================================ --}}
    <section id="informasi" class="py-12 md:py-20 bg-[#4A3B2A]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14" data-aos="fade-up">
                <div class="section-subtitle" style="color:#D4B483;">Jadwal & Layanan</div>
                <div class="gold-divider mx-auto" style="background:linear-gradient(90deg,#B59551,#D4B483);"></div>
                <h2 class="section-title text-white">Informasi Pendaftaran</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-8 rounded-2xl"
                    style="background:rgba(255,255,255,0.06);border:1px solid rgba(181,149,81,0.3);" data-aos="fade-up">
                    <div class="font-bold text-white mb-3 text-lg">Pendaftaran Online</div>
                    <p class="text-white/80 text-sm leading-relaxed mb-4">1 Maret s.d 9 Juli 2025</p>
                    <div class="mt-auto">
                        <a href="https://psb.nuruljadid.net" target="_blank"
                            class="text-[#D4B483] font-semibold text-sm hover:underline flex items-center gap-2">
                            Melalui laman: psb.nuruljadid.net →
                        </a>
                    </div>
                </div>

                <div class="p-8 rounded-2xl"
                    style="background:rgba(255,255,255,0.06);border:1px solid rgba(181,149,81,0.3);" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="font-bold text-white mb-3 text-lg">Layanan Satu Atap Pra Sekolah s.d Dasmen</div>
                    <ul class="text-white/80 text-sm space-y-2 leading-relaxed">
                        <li><span class="text-[#D4B483] font-semibold">Rabu, 02 Juli 2026:</span> SMKNJ, MAN, MTsN</li>
                        <li><span class="text-[#D4B483] font-semibold">Kamis, 02 Juli 2026:</span> SMPNJ</li>
                        <li><span class="text-[#D4B483] font-semibold">Jumat, 03 Juli 2026:</span> SMANJ</li>
                        <li><span class="text-[#D4B483] font-semibold">Sabtu, 04 Juli 2026:</span> MANJ</li>
                        <li><span class="text-[#D4B483] font-semibold">Ahad, 05 Juli 2026:</span> MTsNJ, MINM, KHORIJIN,
                            PDF, TPA, TP, TK</li>
                    </ul>
                </div>

                <div class="p-8 rounded-2xl"
                    style="background:rgba(255,255,255,0.06);border:1px solid rgba(181,149,81,0.3);" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="font-bold text-white mb-3 text-lg">Layanan Pendidikan Tinggi</div>
                    <ul class="text-white/80 text-sm space-y-2 leading-relaxed">
                        <li class="flex items-start gap-2">
                            <svg width="16" height="16" fill="#D4B483" class="mt-1 flex-shrink-0"
                                viewBox="0 0 24 24">
                                <path d="M12 3L1 9l4 2.18V15h1v3H5v2h14v-2h-1v-3h1V11.18L19 9v1h2V9L12 3z" />
                            </svg>
                            Ma'had Aly Nurul Jadid
                        </li>
                        <li class="flex items-start gap-2">
                            <svg width="16" height="16" fill="#D4B483" class="mt-1 flex-shrink-0"
                                viewBox="0 0 24 24">
                                <path d="M12 3L1 9l4 2.18V15h1v3H5v2h14v-2h-1v-3h1V11.18L19 9v1h2V9L12 3z" />
                            </svg>
                            Universitas Nurul Jadid
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- ALUR PENDAFTARAN                                             --}}
    {{-- ============================================================ --}}
    <section id="alur" class="py-12 md:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14" data-aos="fade-up">
                <div class="section-subtitle">Langkah Mudah</div>
                <div class="gold-divider mx-auto"></div>
                <h2 class="section-title">Alur Pendaftaran</h2>
            </div>

            @php
                $steps = [
                    [
                        '1',
                        'Cek Kesehatan',
                        'Klinik Az-Zainiyah.',
                        'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                    ],
                    ['2', 'Validasi & Verifikasi', 'Aula II.', 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                    [
                        '3',
                        'Logistik',
                        'Pengambilan atribut.',
                        'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',
                    ],
                    [
                        '4',
                        'Sowan Pengasuh',
                        'Penyerahan ke Pengasuh.',
                        'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                    ],
                    [
                        '5',
                        'Administrasi Wilayah',
                        'Pendataan internal Zaid bin Tsabit.',
                        'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01',
                    ],
                    [
                        '6',
                        'Sowan Pemangku',
                        'Penyerahan ke Pemangku Wilayah.',
                        'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                    ],
                    [
                        '7',
                        'Kamar & Wali Asuh',
                        'Penentuan kamar.',
                        'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
                    ],
                ];
            @endphp
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($steps as $index => $step)
                    <div class="flex flex-col items-center text-center p-6" data-aos="fade-up"
                        data-aos-delay="{{ $index * 50 }}">
                        <div class="w-20 h-20 rounded-full bg-[#B59551]/10 flex items-center justify-center mb-5 relative">
                            <div
                                class="absolute -top-1 -right-1 w-7 h-7 rounded-full bg-[#4A3B2A] text-white flex items-center justify-center font-bold text-xs border-2 border-white">
                                {{ $step[0] }}</div>
                            <svg class="w-10 h-10 text-[#B59551]" fill="none" stroke="currentColor"
                                stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $step[3] }}"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg text-[#4A3B2A] mb-2">{{ $step[1] }}</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">{{ $step[2] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-8" data-aos="fade-up">
                <a href="{{ route('pendaftaran') }}" class="btn-gold text-base px-8 py-4 shadow-lg">
                    Mulai Pendaftaran <svg width="20" height="20" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24" class="inline ml-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- PERSIAPAN & PERSYARATAN                                      --}}
    {{-- ============================================================ --}}
    <section id="persiapan" class="py-12 md:py-20 bg-[#F8F5F0]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14" data-aos="fade-up">
                <div class="section-subtitle">Panduan Pendaftaran</div>
                <div class="gold-divider mx-auto"></div>
                <h2 class="section-title">Persiapan & Persyaratan</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
                {{-- Dokumen & Barang --}}
                <div data-aos="fade-right">
                    <h3 class="font-bold text-xl mb-6 text-[#4A3B2A]">Dokumen & Barang yang Diperlukan</h3>
                    @php
                        $requirements = [
                            ['Al-Qur\'an dan Alat Tulis', 'Disiapkan dari rumah'],
                            ['Perlengkapan Sholat', 'Sajadah/Surban, Tasbih, dan Siwak'],
                            ['Pakaian Wajib', 'Gamis/Jubah (1), Baju putih polos (2)'],
                            ['Pakaian Santai', 'Sarung (4), Kaos (3), Kemeja (3), Celana Training (2)'],
                            ['Penutup Kepala', 'Songkok Nasional (1), Songkok Putih (2)'],
                            ['Lainnya', 'Sandal, Sepatu, Peralatan mandi, Peralatan tidur (opsional)'],
                        ];
                    @endphp
                    <div class="space-y-4">
                        @foreach ($requirements as $req)
                            <div
                                class="flex items-center gap-4 p-4 rounded-xl bg-white shadow-sm border border-gray-100 transition hover:shadow-md">
                                <div
                                    class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0">
                                    <svg width="16" height="16" fill="none" stroke="currentColor"
                                        stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-semibold text-sm text-[#4A3B2A]">{{ $req[0] }}</div>
                                    <div class="text-xs text-gray-500 mt-0.5">{{ $req[1] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Catatan Penting --}}
                <div data-aos="fade-left" class="md:sticky md:top-24">
                    <div class="bg-red-50 border border-red-200 rounded-2xl p-8 shadow-sm">
                        <div class="w-12 h-12 rounded-full bg-red-100 text-red-600 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl text-red-800 mb-3">Catatan Penting!</h3>
                        <p class="text-red-700 leading-relaxed text-sm font-medium">
                            Dilarang membawa pakaian berbahan levis/jeans, berwarna mencolok, atau bernuansa ormas tertentu.
                            Mohon patuhi peraturan ini demi ketertiban dan kedisiplinan santri di lingkungan pesantren.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- CONTACT                                                      --}}
    {{-- ============================================================ --}}
    <section id="kontak" class="py-12 md:py-20" style="background:#4A3B2A;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14" data-aos="fade-up">
                <div style="color:#D4B483;font-weight:600;text-transform:uppercase;letter-spacing:.1em;font-size:.8rem;">
                    Hubungi Kami</div>
                <div class="gold-divider mx-auto" style="background:linear-gradient(90deg,#B59551,#D4B483);"></div>
                <h2 style="font-family:'Playfair Display',serif;color:white;font-size:2.25rem;font-weight:800;">Informasi
                    Kontak</h2>
                <p class="text-white/60 mt-3">Kami siap membantu informasi pendaftaran santri baru.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $contacts = [
                        [
                            'icon' =>
                                '<path d="M16.75 13.96c.25.13.41.2.46.3.06.11.04.61-.21 1.18-.2.56-1.24 1.1-1.7 1.12-.46.02-.47.36-2.96-.73-2.49-1.09-3.99-3.75-4.11-3.92-.12-.17-.96-1.38-.92-2.61.05-1.22.69-1.8.95-2.04.24-.22.51-.29.68-.26h.47c.15 0 .36-.06.55.45l.69 1.87c.06.19.03.4-.08.56l-.28.37c-.12.15-.26.33-.12.56.52.87 1.16 1.63 1.9 2.28.37.32.83.6 1.28.85z"/><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" clip-rule="evenodd"/>',
                            'title' => 'WhatsApp',
                            'value' => '+62 811-3777-099',
                            'hint' => 'Chat tersedia 07.00 – 22.00',
                        ],
                        [
                            'icon' =>
                                '<path d="M16.75 13.96c.25.13.41.2.46.3.06.11.04.61-.21 1.18-.2.56-1.24 1.1-1.7 1.12-.46.02-.47.36-2.96-.73-2.49-1.09-3.99-3.75-4.11-3.92-.12-.17-.96-1.38-.92-2.61.05-1.22.69-1.8.95-2.04.24-.22.51-.29.68-.26h.47c.15 0 .36-.06.55.45l.69 1.87c.06.19.03.4-.08.56l-.28.37c-.12.15-.26.33-.12.56.52.87 1.16 1.63 1.9 2.28.37.32.83.6 1.28.85z"/><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" clip-rule="evenodd"/>',
                            'title' => 'WhatsApp',
                            'value' => '+62 877-7696-2115',
                            'hint' => 'Chat tersedia 07.00 – 22.00',
                        ],
                        [
                            'icon' =>
                                '<path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>',
                            'title' => 'Email',
                            'value' => 'zaidbintsabitputra@gmail.com',
                            'hint' => 'Respon dalam 1×24 jam',
                        ],
                    ];
                @endphp
                @foreach ($contacts as $contact)
                    <div class="text-center p-8 rounded-2xl"
                        style="background:rgba(255,255,255,0.06);border:1px solid rgba(181,149,81,0.3);"
                        data-aos="fade-up">
                        <div class="mx-auto mb-4 icon-badge" style="background:linear-gradient(135deg,#B59551,#D4B483);">
                            <svg width="24" height="24" fill="white"
                                viewBox="0 0 24 24">{!! $contact['icon'] !!}</svg>
                        </div>
                        <div class="font-bold text-white mb-1">{{ $contact['title'] }}</div>
                        <div class="font-semibold mb-2" style="color:#D4B483;">{{ $contact['value'] }}</div>
                        <div class="text-xs text-white/50">{{ $contact['hint'] }}</div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12" data-aos="fade-up">
                <a href="{{ route('pendaftaran') }}" class="btn-gold text-lg px-10 py-4">
                    Daftar PSB Sekarang →
                </a>
            </div>
        </div>
    </section>

@endsection
