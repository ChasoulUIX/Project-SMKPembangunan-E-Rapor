<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - E-Rapor SMK Pembangunan Bogor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .hover-scale {
            transition: transform 0.2s;
        }
        .hover-scale:hover {
            transform: scale(1.02);
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }
            .sidebar.active {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
    <!-- Mobile Menu Button -->
    <button id="mobile-menu-button" class="md:hidden fixed top-4 left-4 z-50 p-2 rounded-lg bg-blue-600 text-white">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <!-- App Bar -->
    <nav class="fixed w-full z-40 border-b border-white/20 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center md:ml-0 ml-12">
                    <div class="flex-shrink-0 flex items-center space-x-3">
                        <img class="h-10 w-auto hover-scale" src="{{ url('/images/logopembut.png') }}" alt="SMK Pembangunan">
                        <div class="flex flex-col">
                            <span class="text-xl font-bold text-white">Admin Panel</span>
                            <span class="text-xs text-white/80">SMK Pembangunan Bogor</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative group">
                        <button class="flex items-center space-x-3 px-4 py-2 rounded-xl hover:bg-white/10 transition-all duration-200">
                            <div class="flex flex-col items-end">
                                <span class="text-sm font-medium text-white">Administrator</span>
                                <span class="text-xs text-white/80 hidden sm:inline">Super Admin</span>
                            </div>
                            <img class="h-10 w-10 rounded-lg ring-2 ring-white/20 shadow-lg" 
                                 src="https://ui-avatars.com/api/?name=Admin&background=EFF6FF&color=3B82F6" 
                                 alt="Admin Profile">
                        </button>
                        <div class="hidden group-hover:block absolute right-0 w-48 mt-2 py-2 bg-white rounded-lg shadow-xl border border-gray-100">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Profile
                                </div>
                            </a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    Logout
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar & Main Content -->
    <div class="flex h-screen pt-16">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar w-64 fixed h-full bg-gradient-to-b from-blue-600 via-indigo-600 to-purple-600 shadow-2xl md:translate-x-0 z-30">
            <nav class="mt-6 px-3 space-y-2">
                <a href="/admin/dashboard" class="group flex items-center px-4 py-3 text-base font-medium rounded-xl text-white hover-scale bg-white/15 shadow-lg">
                    <svg class="mr-3 h-6 w-6 text-blue-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="flex-1">Dashboard</span>
                </a>

                <!-- Data Management -->
                <div class="px-4 py-2">
                    <h3 class="text-xs font-semibold text-white/60 uppercase tracking-wider">Data Management</h3>
                </div>

                <a href="/admin/siswa" class="block px-4 py-3 text-base font-medium rounded-xl text-white/80 hover:text-white hover:bg-white/10 transition-all duration-200">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-3 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        Manajemen Siswa
                    </div>
                </a>

                <a href="/admin/guru" class="block px-4 py-3 text-base font-medium rounded-xl text-white/80 hover:text-white hover:bg-white/10 transition-all duration-200">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-3 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Manajemen Guru
                    </div>
                </a>

                <a href="/admin/kelas" class="block px-4 py-3 text-base font-medium rounded-xl text-white/80 hover:text-white hover:bg-white/10 transition-all duration-200">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-3 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        Manajemen Kelas
                    </div>
                </a>

                <a href="/admin/matapelajaran" class="block px-4 py-3 text-base font-medium rounded-xl text-white/80 hover:text-white hover:bg-white/10 transition-all duration-200">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-3 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        Manajemen Mapel
                    </div>
                </a>

                <!-- System Settings -->
                <div class="px-4 py-2 mt-4">
                    <h3 class="text-xs font-semibold text-white/60 uppercase tracking-wider">System</h3>
                </div>

                <form method="POST" action="/login" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full group flex items-center px-4 py-3 text-base font-medium rounded-xl text-white/80 hover:text-white hover:bg-white/10 transition-all duration-200">
                        <svg class="mr-3 h-6 w-6 text-white/70 group-hover:text-white transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="flex-1">Logout</span>
                    </button>
                </form>
            </nav>

            <div class="absolute bottom-0 left-0 right-0 p-4">
                <div class="bg-white/10 rounded-xl p-4 backdrop-blur-sm">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-blue-500 rounded-lg">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="text-sm font-medium text-white">Butuh bantuan?</h5>
                            <p class="text-xs text-white/70">Hubungi support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 md:ml-64 p-4 md:p-8 bg-gray-50/50">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const sidebar = document.getElementById('sidebar');
        
        mobileMenuButton.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth < 768) {
                if (!sidebar.contains(e.target) && !mobileMenuButton.contains(e.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
    </script>
</body>
</html>
