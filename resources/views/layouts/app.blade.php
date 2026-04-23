<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'PSB Wilayah Zaid bin Tsabit — PP Nurul Jadid')</title>
    <meta name="description" content="@yield('meta_description', 'Penerimaan Santri Baru Wilayah Zaid bin Tsabit Putra Pondok Pesantren Nurul Jadid. Daftarkan putra Anda sekarang.')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap"
        rel="stylesheet">

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brown: {
                            DEFAULT: '#4A3B2A',
                            dark: '#2E2518',
                            light: '#6B5440',
                        },
                        gold: {
                            DEFAULT: '#B59551',
                            light: '#D4B483',
                            dark: '#8B6F47',
                        },
                        cream: {
                            DEFAULT: '#F8F5F0',
                            dark: '#EDE8DF',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>

    {{-- AOS Animate on Scroll --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    {{-- Heroicons via CDN (SVG inline below) --}}

    <style>
        :root {
            --brown: #4A3B2A;
            --gold: #B59551;
            --cream: #F8F5F0;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--cream);
            color: var(--brown);
            overflow-x: hidden;
        }

        /* ---- Navbar ---- */
        #navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: #F8F5F0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 0.8rem 0;
            transition: padding 0.4s ease;
        }

        #navbar.scrolled {
            padding: 0.6rem 0;
        }

        .nav-logo {
            color: #4A3B2A;
        }

        .nav-link-item {
            color: #4A3B2A;
            font-weight: 600;
            font-size: 0.9rem;
            transition: color 0.2s;
        }

        .nav-link-item:hover {
            color: #B59551;
        }

        /* ---- Hero ---- */
        .hero-section {
            height: 100vh;
            min-height: 600px;
            background: linear-gradient(135deg, rgba(20, 12, 4, 0.75) 0%, rgba(74, 59, 42, 0.6) 100%),
                url('/assets/images/bg_psb.jpg') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ---- Section Styling ---- */
        .section-title {
            font-family: 'Playfair Display', serif;
            color: #4A3B2A;
            font-size: 2.25rem;
            font-weight: 800;
            line-height: 1.2;
        }

        .section-subtitle {
            color: #B59551;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 0.8rem;
        }

        .gold-divider {
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #B59551, #D4B483);
            border-radius: 2px;
            margin: 1rem 0;
        }

        /* ---- Cards ---- */
        .feature-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 24px rgba(74, 59, 42, 0.08);
            border: 1px solid rgba(181, 149, 81, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(74, 59, 42, 0.15);
        }

        .icon-badge {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #B59551, #D4B483);
            margin-bottom: 1rem;
        }

        /* ---- Buttons ---- */
        .btn-gold {
            background: linear-gradient(135deg, #B59551, #D4B483);
            color: white;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(181, 149, 81, 0.4);
            color: white;
        }

        .btn-outline-gold {
            background: transparent;
            color: #B59551;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            border: 2px solid #B59551;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-outline-gold:hover {
            background: #B59551;
            color: white;
            transform: translateY(-2px);
        }

        .btn-white-outline {
            background: transparent;
            color: white;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            border: 2px solid rgba(255, 255, 255, 0.7);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-white-outline:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: white;
            color: white;
        }

        /* ---- Floating Buttons ---- */
        #back-to-top {
            position: fixed;
            z-index: 9999;
            border-radius: 50%;
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            bottom: 2rem;
            right: 2rem;
            background: linear-gradient(135deg, #B59551, #D4B483);
            opacity: 0;
            pointer-events: none;
        }

        #back-to-top.visible {
            opacity: 1;
            pointer-events: all;
        }

        #back-to-top:hover {
            transform: translateY(-4px);
        }

        /* ---- Footer ---- */
        footer {
            background: #2E2518;
            color: rgba(255, 255, 255, 0.8);
        }

        /* ---- Responsive ---- */
        @media(max-width: 768px) {
            .section-title {
                font-size: 1.6rem;
            }

            .hero-section h1 {
                font-size: 2rem !important;
            }
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">

    {{-- ===== NAVBAR ===== --}}
    <nav id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="nav-logo font-bold text-lg flex items-center gap-2">
                    <img src="{{ asset('assets/images/Logo.png') }}" alt="Logo Zabitsa"
                        style="height: 40px; width: auto; border-radius: 4px; object-fit: contain;">

                    <span style="color:#B59551;font-family:'Playfair Display',serif;">Zabitsa</span>
                </a>

                {{-- Desktop menu --}}
                <div class="hidden md:flex items-center gap-6">
                    <a href="{{ route('home') }}#sekilas" class="nav-link-item">Sekilas</a>
                    <a href="{{ route('home') }}#jenjang" class="nav-link-item">Jenjang</a>
                    <a href="{{ route('home') }}#persiapan" class="nav-link-item">Persiapan</a>
                    <a href="{{ route('home') }}#kontak" class="nav-link-item">Kontak</a>
                    <a href="{{ route('cek.status') }}" class="nav-link-item">Cek Status</a>
                </div>

                <div class="hidden md:flex items-center gap-3">
                    <a href="/admin/login" class="btn-gold text-sm py-2 px-5">
                        Login
                    </a>
                </div>

                {{-- Mobile hamburger --}}
                <button id="mobile-menu-btn" class="md:hidden text-[#4A3B2A] p-2" onclick="toggleMobileMenu()">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            {{-- Mobile menu --}}
            <div id="mobile-menu" class="md:hidden hidden mt-4 pb-4 border-t border-[#4A3B2A]/20">
                <div class="flex flex-col gap-3 mt-3">
                    <a href="{{ route('home') }}#sekilas" class="nav-link-item">Sekilas</a>
                    <a href="{{ route('home') }}#jenjang" class="nav-link-item">Jenjang</a>
                    <a href="{{ route('home') }}#persiapan" class="nav-link-item">Persiapan</a>
                    <a href="{{ route('home') }}#kontak" class="nav-link-item">Kontak</a>
                    <a href="{{ route('cek.status') }}" class="nav-link-item">Cek Status</a>
                    <a href="/admin/login" class="btn-gold text-sm mt-2 self-start">Login</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- ===== MAIN CONTENT ===== --}}
    <main class="flex-grow flex flex-col">
        @yield('content')
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer class="py-12 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h3 class="font-bold text-xl text-yellow-400 font-serif mb-3">Wilayah Zaid bin Tsabit</h3>
                    <p class="text-sm leading-relaxed opacity-80">Pondok Pesantren Nurul Jadid<br>Paiton, Probolinggo,
                        Jawa Timur.</p>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-3">Tautan Cepat</h4>
                    <ul class="space-y-2 text-sm opacity-80">
                        <li><a href="{{ route('home') }}" class="hover:text-yellow-400 transition-colors">Beranda</a>
                        </li>
                        <li><a href="{{ route('pendaftaran') }}" class="hover:text-yellow-400 transition-colors">Daftar
                                PSB</a></li>
                        <li><a href="{{ route('cek.status') }}" class="hover:text-yellow-400 transition-colors">Cek
                                Status</a></li>
                        <li><a href="/admin" class="hover:text-yellow-400 transition-colors">Portal Admin</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-3">Hubungi Kami</h4>
                    <ul class="space-y-2 text-sm opacity-80">
                        <li class="flex items-start gap-2">
                            <svg width="16" height="16" fill="currentColor" class="mt-1 flex-shrink-0"
                                viewBox="0 0 24 24">
                                <path
                                    d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                            </svg>
                            <div>
                                <div>0811 3777 099</div>
                                <div class="text-xs opacity-70">Nomor Wilayah (Zaid bin Tsabit Putra)</div>
                            </div>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg width="16" height="16" fill="currentColor" class="mt-1 flex-shrink-0"
                                viewBox="0 0 24 24">
                                <path
                                    d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                            </svg>
                            <div>
                                <div>08777 696 2115</div>
                                <div class="text-xs opacity-70">Nomor Panitia PSB (a.n. Ust. Fayakun)</div>
                            </div>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg width="16" height="16" fill="currentColor" class="mt-1 flex-shrink-0"
                                viewBox="0 0 24 24">
                                <path
                                    d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2zm-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8 1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25zM12 7a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5zm0 2a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3z" />
                            </svg>
                            <div>
                                <div>@zabitsa.nj | @zabitsamedia</div>
                                <div class="text-xs opacity-70">Social Media</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-white/10 pt-6 text-center text-xs opacity-60">
                &copy; {{ date('Y') }} Wilayah Zaid bin Tsabit Putra — PP Nurul Jadid. All rights reserved.
            </div>
        </div>
    </footer>

    {{-- ===== FLOATING BUTTONS ===== --}}
    <button id="back-to-top" onclick="window.scrollTo({top:0,behavior:'smooth'})" title="Kembali ke atas">
        <svg width="22" height="22" fill="white" viewBox="0 0 24 24">
            <path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z" />
        </svg>
    </button>

    {{-- ===== SCRIPTS ===== --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        AOS.init({
            duration: 700,
            once: true,
            easing: 'ease-out-cubic',
            offset: 60
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('navbar');
            const btn = document.getElementById('back-to-top');
            if (window.scrollY > 80) {
                nav.classList.add('scrolled');
                btn.classList.add('visible');
            } else {
                nav.classList.remove('scrolled');
                btn.classList.remove('visible');
            }
        });

        function toggleMobileMenu() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        }
    </script>
    @stack('scripts')
</body>

</html>
