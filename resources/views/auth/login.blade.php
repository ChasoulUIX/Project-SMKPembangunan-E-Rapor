<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Rapor SMK Pembangunan Bogor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="max-w-4xl w-full grid grid-cols-1 md:grid-cols-2 gap-8 bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Left Side - Image/Brand -->
            <div class="hidden md:block relative bg-gradient-to-br from-blue-500 to-indigo-600 p-8 lg:p-12 overflow-hidden">
                <div class="absolute inset-0">
                    <div class="absolute inset-0 bg-black opacity-20"></div>
                    <div class="absolute -bottom-48 -right-48 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="absolute -top-48 -left-48 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
                </div>
                <div class="relative z-10 h-full flex flex-col justify-between">
                    <div>
                        <img class="h-16 md:h-20 lg:h-24 w-auto transition-transform hover:scale-105 duration-300" 
                             src="{{ url('/images/logopembut.png') }}" 
                             alt="SMK Pembangunan Bogor">
                        <h2 class="mt-6 md:mt-8 text-3xl md:text-4xl font-bold text-white leading-tight tracking-tight">
                            Selamat Datang di <span class="text-blue-200">E-Rapor</span>
                        </h2>
                        <p class="mt-3 md:mt-4 text-blue-100 text-base md:text-lg">
                            Sistem Informasi Akademik<br>
                            SMK Pembangunan Kota Bogor
                        </p>
                    </div>
                    <div class="text-blue-100/80 text-xs md:text-sm font-light">
                        &copy; {{ date('Y') }} SMK Pembangunan Bogor. All rights reserved.
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="p-6 md:p-8 lg:p-12">
                <div class="md:hidden text-center mb-6">
                    <img src="{{ asset('images/logopembut.png') }}" alt="SMK Pembangunan Bogor" class="h-16 mx-auto">
                    <h2 class="mt-4 text-xl md:text-2xl font-bold text-gray-900">
                        E-Rapor
                    </h2>
                    <p class="mt-2 text-sm text-gray-600">
                        SMK Pembangunan Kota Bogor
                    </p>
                </div>

                @if (session('status'))
                    <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg" role="alert">
                        <p class="font-medium">Error</p>
                        <p>{{ session('status') }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.submit') }}" class="space-y-6">
                    @csrf
                    <div class="space-y-2">
                        <label for="nip" class="block text-sm font-medium text-gray-700">Nomor Induk</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" />
                                </svg>
                            </div>
                            <input id="nip" name="nip" type="text" required
                                class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"
                                placeholder="Masukkan NIP/NIS/ID anda">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input id="password" name="password" type="password" required
                                class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"
                                placeholder="Masukkan password anda">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember_me" type="checkbox" 
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                Ingat saya
                            </label>
                        </div>
                        <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                            Lupa password?
                        </a>
                    </div>

                    <div>
                        <button type="submit" 
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 hover:from-blue-700 hover:via-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transform transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-blue-300 group-hover:text-blue-400 transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            Masuk ke Dashboard
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center text-xs sm:text-sm text-gray-500 md:hidden">
                    &copy; {{ date('Y') }} SMK Pembangunan Bogor. All rights reserved.
                </div>
            </div>
        </div>
    </div>
</body>
</html>
