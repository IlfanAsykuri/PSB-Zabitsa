<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — PSB Zaid bin Tsabit</title>
    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brown: '#4A3B2A',
                        gold: '#B59551',
                        goldhover: '#9A7B4F',
                    },
                    fontFamily: {
                        serif: ['"Playfair Display"', 'serif'],
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-brown min-h-screen flex items-center justify-center relative overflow-hidden font-sans">

    <!-- Decorative background elements mapped elegantly -->
    <div class="absolute top-[-10%] right-[-10%] w-96 h-96 bg-gold opacity-10 rounded-full blur-3xl mix-blend-overlay">
    </div>
    <div class="absolute bottom-[-10%] left-[-10%] w-96 h-96 bg-gold opacity-10 rounded-full blur-3xl mix-blend-overlay">
    </div>

    <!-- Centralized Premium Card UI -->
    <div
        class="relative bg-[#F8F5F0] rounded-2xl shadow-[0_25px_50px_rgba(0,0,0,0.5)] w-full max-w-md p-10 border border-gold/20 z-10">
        <div class="text-center mb-8 mt-2">
            <img src="{{ asset('assets/images/Logo.png') }}" alt="Logo PSB Zabitsa"
                class="mx-auto h-16 w-auto mb-3 object-contain">

            <h1 class="text-3xl font-serif font-extrabold text-brown tracking-tight" style="line-height:1.2;">
                PSB Wilayah <br> Zaid bin Tsabit
            </h1>
            <p class="text-xs font-semibold tracking-widest text-gold mt-2 uppercase">Portal Administrator</p>
        </div>

        <form method="POST" action="{{ route('backpack.auth.login') }}">
            @csrf

            <!-- Dedicated Username override bypass logic implemented explicitly! -->
            <div class="mb-5">
                <label for="username" class="block text-sm font-semibold text-brown mb-1.5">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" required autofocus
                    class="w-full px-4 py-3 rounded-xl border-2 border-[#E8E0D5] bg-white text-brown outline-none transition duration-200 focus:border-gold focus:ring-4 focus:ring-gold/20"
                    placeholder="Masukkan username admin">

                @if ($errors->has('username'))
                    <p class="mt-2 text-sm text-red-600 font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{ $errors->first('username') }}
                    </p>
                @endif
            </div>

            <div class="mb-6">
                <!-- Registration & Forgot Password routing completely purged -> clean structural array -->
                <label for="password" class="block text-sm font-semibold text-brown mb-1.5">Kata Sandi</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-3 rounded-xl border-2 border-[#E8E0D5] bg-white text-brown outline-none transition duration-200 focus:border-gold focus:ring-4 focus:ring-gold/20"
                    placeholder="Masukkan kata sandi">
                @if ($errors->has('password'))
                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $errors->first('password') }}</p>
                @endif
            </div>

            <div class="flex items-center mb-8">
                <input type="checkbox" name="remember" id="remember"
                    class="w-4 h-4 text-gold bg-white border-gray-300 rounded focus:ring-gold focus:ring-2 accent-gold"
                    {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="ml-2 text-sm text-gray-600 font-medium cursor-pointer">Ingat Saya</label>
            </div>

            <button type="submit"
                class="w-full bg-gradient-to-br from-gold to-goldhover hover:to-brown text-white font-semibold py-3.5 px-4 rounded-xl shadow-lg shadow-gold/30 hover:shadow-gold/50 transition-all duration-300 transform hover:-translate-y-0.5">
                Masuk Sistem &rarr;
            </button>
        </form>
    </div>
</body>

</html>
