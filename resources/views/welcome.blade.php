<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=""> <!-- class kosong untuk diisi skrip tema -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DigiLib - Solusi Perpustakaan Digital</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Skrip Tema (Penting untuk ditaruh di head) -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-light-base text-light-text dark:bg-dark-base dark:text-dark-text">

<div class="relative min-h-screen">
    <!-- Navbar Landing Page -->
    <nav class="sticky top-0 z-40 w-full backdrop-blur flex-none transition-colors duration-500 lg:z-50 lg:border-b lg:border-gray-900/10 dark:border-gray-50/[0.06] bg-white/80 dark:bg-dark-surface/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-2">
                     <svg class="h-8 w-8 text-light-primary dark:text-dark-accent" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                    <span class="font-bold text-xl text-light-primary dark:text-dark-text">DigiLib</span>
                </a>

                <!-- Tombol Navigasi dan Tema -->
                <div class="flex items-center space-x-4">
                    <button id="landing-theme-toggle" type="button" class="text-light-text dark:text-dark-text hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2.5">
                        <svg id="landing-theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="landing-theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 5.05A1 1 0 003.636 6.464l.707.707a1 1 0 001.414-1.414l-.707-.707zM3 11a1 1 0 100-2H2a1 1 0 100 2h1zM11 17a1 1 0 10-2 0v1a1 1 0 102 0v-1z"></path></svg>
                    </button>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-sm font-medium text-white bg-light-primary dark:bg-dark-accent dark:text-dark-surface rounded-md hover:bg-opacity-90">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="hidden sm:inline-block px-4 py-2 text-sm font-medium text-light-primary dark:text-dark-text hover:bg-gray-200 dark:hover:bg-dark-surface rounded-md">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-white bg-light-accent dark:bg-dark-accent dark:text-dark-surface rounded-md shadow-md hover:bg-opacity-90 transition-all">Daftar</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main>
        <!-- Hero Section -->
        <section class="py-20 sm:py-32">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-base font-semibold text-light-accent dark:text-dark-accent">Revolusi Manajemen Pustaka</p>
                <h1 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-light-primary dark:text-dark-text">
                    Digitalisasi Perpustakaan, <br class="hidden lg:inline"> Buka Jendela Dunia.
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-lg text-light-text dark:text-gray-400">
                    Platform kami membantu Anda mengelola koleksi buku, melacak peminjaman, dan memberikan akses lebih mudah bagi para pembaca. Modern, efisien, dan terintegrasi.
                </p>
                <div class="mt-10 flex justify-center items-center gap-x-6">
                    <a href="{{ route('register') }}" class="px-8 py-3 font-semibold text-white bg-light-primary dark:bg-dark-accent dark:text-dark-surface rounded-lg shadow-lg hover:scale-105 transform transition-transform duration-300">Mulai Sekarang</a>
                    <a href="#fitur" class="font-semibold text-light-primary dark:text-dark-text">Lihat Fitur &rarr;</a>
                </div>
            </div>
        </section>

        <!-- Fitur Section -->
        <section id="fitur" class="py-20 bg-white dark:bg-dark-surface">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-light-primary dark:text-dark-text">Semua yang Anda Butuhkan dalam Satu Platform</h2>
                    <p class="mt-4 text-lg text-light-text dark:text-gray-400">Fitur canggih untuk membawa perpustakaan Anda ke level berikutnya.</p>
                </div>
                <div class="mt-16 grid gap-12 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Fitur 1 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="flex items-center justify-center h-12 w-12 rounded-full bg-light-secondary dark:bg-dark-accent/20 text-light-primary dark:text-dark-accent">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
                        </div>
                        <h3 class="mt-5 text-xl font-semibold text-light-primary dark:text-dark-text">Katalog Digital</h3>
                        <p class="mt-2 text-base text-light-text dark:text-gray-400">Kelola semua koleksi buku Anda secara online. Tambah, edit, dan cari buku dengan mudah.</p>
                    </div>
                    <!-- Fitur 2 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="flex items-center justify-center h-12 w-12 rounded-full bg-light-secondary dark:bg-dark-accent/20 text-light-primary dark:text-dark-accent">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" /></svg>
                        </div>
                        <h3 class="mt-5 text-xl font-semibold text-light-primary dark:text-dark-text">Sistem Peminjaman</h3>
                        <p class="mt-2 text-base text-light-text dark:text-gray-400">Lacak status peminjaman dan pengembalian buku secara real-time. Notifikasi otomatis untuk keterlambatan.</p>
                    </div>
                    <!-- Fitur 3 -->
                    <div class="flex flex-col items-center text-center">
                         <div class="flex items-center justify-center h-12 w-12 rounded-full bg-light-secondary dark:bg-dark-accent/20 text-light-primary dark:text-dark-accent">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
                        </div>
                        <h3 class="mt-5 text-xl font-semibold text-light-primary dark:text-dark-text">Manajemen Anggota</h3>
                        <p class="mt-2 text-base text-light-text dark:text-gray-400">Daftarkan dan kelola data anggota perpustakaan dengan riwayat peminjaman yang lengkap.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-light-base dark:bg-dark-base">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <p class="text-sm text-light-text dark:text-gray-400">&copy; {{ date('Y') }} DigiLib. Semua Hak Cipta Dilindungi.</p>
                </div>
            </div>
        </footer>
    </main>
</div>

</body>
</html>
