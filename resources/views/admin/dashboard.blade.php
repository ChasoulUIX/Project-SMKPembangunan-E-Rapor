@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
    <div class="border-b pb-4 mb-4">
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Dashboard Admin</h1>
        <p class="text-sm sm:text-base text-gray-600">Selamat datang di sistem E-Rapor SMK Pembangunan Bogor</p>
    </div>

    <!-- Info Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mb-6">
        <div class="bg-blue-50 rounded-xl p-4 shadow-md">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Total Guru</p>
                    <p class="text-xl font-bold text-gray-800">24 Guru</p>
                </div>
            </div>
        </div>

        <div class="bg-green-50 rounded-xl p-4 shadow-md">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-green-100 rounded-lg">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Total Siswa</p>
                    <p class="text-xl font-bold text-gray-800">360 Siswa</p>
                </div>
            </div>
        </div>

        <div class="bg-purple-50 rounded-xl p-4 shadow-md">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Mata Pelajaran</p>
                    <p class="text-xl font-bold text-gray-800">12 Mapel</p>
                </div>
            </div>
        </div>

        <div class="bg-red-50 rounded-xl p-4 shadow-md">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-red-100 rounded-lg">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Total Kelas</p>
                    <p class="text-xl font-bold text-gray-800">12 Kelas</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="bg-white rounded-lg border">
        <div class="p-4 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Aktivitas Terbaru</h2>
        </div>
        <div class="p-4">
            <div class="space-y-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Input Nilai Kelas X RPL 1</p>
                        <p class="text-sm text-gray-500">2 jam yang lalu oleh Budi Santoso</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Absensi Kelas XI RPL 2</p>
                        <p class="text-sm text-gray-500">3 jam yang lalu oleh Siti Aminah</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
