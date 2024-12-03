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
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Aktivitas Guru -->
        <div class="bg-white rounded-lg border">
            <div class="p-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Aktivitas Guru</h2>
            </div>
            <div class="p-4">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aktivitas</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Guru</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900">Input Nilai Matematika</td>
                            <td class="px-4 py-3 text-sm text-gray-500">1 jam yang lalu</td>
                            <td class="px-4 py-3 text-sm text-gray-500">Budi Santoso</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900">Upload Materi Pembelajaran</td>
                            <td class="px-4 py-3 text-sm text-gray-500">2 jam yang lalu</td>
                            <td class="px-4 py-3 text-sm text-gray-500">Siti Aminah</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Aktivitas Wali Kelas -->
        <div class="bg-white rounded-lg border">
            <div class="p-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Aktivitas Wali Kelas</h2>
            </div>
            <div class="p-4">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aktivitas</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Wali Kelas</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900">Rekap Absensi X RPL 1</td>
                            <td class="px-4 py-3 text-sm text-gray-500">30 menit yang lalu</td>
                            <td class="px-4 py-3 text-sm text-gray-500">Ahmad Yani</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900">Jadwal Konsultasi Orang Tua</td>
                            <td class="px-4 py-3 text-sm text-gray-500">1 jam yang lalu</td>
                            <td class="px-4 py-3 text-sm text-gray-500">Sri Wahyuni</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
