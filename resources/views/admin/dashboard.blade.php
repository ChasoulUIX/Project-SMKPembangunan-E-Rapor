@extends('admin.layouts.app')

@section('content')
@php
use Illuminate\Support\Facades\DB;
@endphp
<div class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-xl p-6 sm:p-8">
    <!-- Header Section -->
    <div class="relative border-b border-gray-200 pb-8 mb-8">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 to-indigo-600/10 rounded-t-xl"></div>
        <div class="relative">
            <h1 class="text-3xl sm:text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-700 to-indigo-700">
                Dashboard Admin
            </h1>
            <p class="text-sm sm:text-base text-gray-600 mt-2 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Selamat datang di sistem E-Rapor SMK Pembangunan Bogor
            </p>
        </div>
    </div>

    <!-- Info Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-6 mb-8">
        <!-- Guru Card -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100 transform hover:scale-105 transition-all duration-300 group">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl group-hover:rotate-6 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Guru</p>
                    <p class="text-2xl font-bold text-blue-700">{{ DB::table('gurus')->count() }}</p>
                    <div class="mt-1 text-xs text-blue-500">
                        <span>Aktif mengajar</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Siswa Card -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-green-100 transform hover:scale-105 transition-all duration-300 group">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-gradient-to-br from-green-500 to-green-600 rounded-xl group-hover:rotate-6 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Siswa</p>
                    <p class="text-2xl font-bold text-green-700">{{ DB::table('murids')->count() }}</p>
                    <div class="flex space-x-3 mt-1 text-xs text-green-500">
                        <span>L: {{ DB::table('murids')->where('gender', 'L')->count() }}</span>
                        <span>•</span>
                        <span>P: {{ DB::table('murids')->where('gender', 'P')->count() }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mata Pelajaran Card -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-purple-100 transform hover:scale-105 transition-all duration-300 group">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl group-hover:rotate-6 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Mata Pelajaran</p>
                    <p class="text-2xl font-bold text-purple-700">{{ DB::table('matapelajarans')->count() }}</p>
                    <div class="mt-1 text-xs text-purple-500">
                        <span>Semester Aktif</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kelas Card -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-red-100 transform hover:scale-105 transition-all duration-300 group">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-gradient-to-br from-red-500 to-red-600 rounded-xl group-hover:rotate-6 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Kelas</p>
                    <p class="text-2xl font-bold text-red-700">{{ DB::table('kelas')->count() }}</p>
                    <div class="grid grid-cols-2 gap-2 mt-1 text-xs text-red-500">
                        @foreach(DB::table('kelas')->select('jurusan', DB::raw('count(*) as total'))->groupBy('jurusan')->get() as $jurusan)
                            <span>{{ ucfirst($jurusan->jurusan) }}: {{ $jurusan->total }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities & Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Aktivitas Guru -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-lg overflow-hidden group hover:shadow-xl transition-shadow duration-300">
            <div class="p-5 bg-gradient-to-r from-blue-600 to-blue-700 group-hover:from-blue-700 group-hover:to-blue-800 transition-colors duration-300">
                <h2 class="text-lg font-bold text-white flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Aktivitas Guru
                </h2>
            </div>
            <div class="p-5">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Waktu</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Guru</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach(DB::table('gurus')->orderBy('updated_at', 'desc')->take(5)->get() as $guru)
                            <tr class="hover:bg-blue-50/50 transition-colors duration-200">
                                <td class="px-4 py-3">
                                    @if($guru->created_at == $guru->updated_at)
                                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Baru</span>
                                    @else
                                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">Update</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ \Carbon\Carbon::parse($guru->updated_at)->diffForHumans() }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center">
                                        @if($guru->photo)
                                            <img src="{{ $guru->photo }}" class="w-8 h-8 rounded-full object-cover mr-3 border-2 border-blue-200">
                                        @else
                                            <div class="w-8 h-8 rounded-full bg-blue-100 mr-3 flex items-center justify-center border-2 border-blue-200">
                                                <span class="text-blue-600 text-sm font-semibold">{{ substr($guru->name, 0, 1) }}</span>
                                            </div>
                                        @endif
                                        <span class="text-sm font-medium text-gray-700">{{ $guru->name }}</span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Aktivitas Siswa -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-lg overflow-hidden group hover:shadow-xl transition-shadow duration-300">
            <div class="p-5 bg-gradient-to-r from-green-600 to-green-700 group-hover:from-green-700 group-hover:to-green-800 transition-colors duration-300">
                <h2 class="text-lg font-bold text-white flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Aktivitas Siswa
                </h2>
            </div>
            <div class="p-5">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Waktu</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Siswa</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach(DB::table('murids')->orderBy('updated_at', 'desc')->take(5)->get() as $murid)
                            <tr class="hover:bg-green-50/50 transition-colors duration-200">
                                <td class="px-4 py-3">
                                    @if($murid->created_at == $murid->updated_at)
                                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Baru</span>
                                    @else
                                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">Update</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ \Carbon\Carbon::parse($murid->updated_at)->diffForHumans() }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center">
                                        @if($murid->photo)
                                            <img src="{{ $murid->photo }}" class="w-8 h-8 rounded-full object-cover mr-3 border-2 border-green-200">
                                        @else
                                            <div class="w-8 h-8 rounded-full bg-green-100 mr-3 flex items-center justify-center border-2 border-green-200">
                                                <span class="text-green-600 text-sm font-semibold">{{ substr($murid->name, 0, 1) }}</span>
                                            </div>
                                        @endif
                                        <span class="text-sm font-medium text-gray-700">{{ $murid->name }}</span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Aktivitas Mata Pelajaran -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-lg overflow-hidden group hover:shadow-xl transition-shadow duration-300">
            <div class="p-5 bg-gradient-to-r from-purple-600 to-purple-700 group-hover:from-purple-700 group-hover:to-purple-800 transition-colors duration-300">
                <h2 class="text-lg font-bold text-white flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    Aktivitas Mata Pelajaran
                </h2>
            </div>
            <div class="p-5">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Waktu</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Mapel</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach(DB::table('matapelajarans')->orderBy('updated_at', 'desc')->take(5)->get() as $mapel)
                            <tr class="hover:bg-purple-50/50 transition-colors duration-200">
                                <td class="px-4 py-3">
                                    @if($mapel->created_at == $mapel->updated_at)
                                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Baru</span>
                                    @else
                                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">Update</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ \Carbon\Carbon::parse($mapel->updated_at)->diffForHumans() }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-medium text-gray-700">{{ $mapel->nama_mapel }}</span>
                                        <span class="text-xs text-gray-500">{{ $mapel->nama_guru }}</span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Statistik Jurusan -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
            <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                Statistik Jurusan
            </h3>
            <div class="space-y-6">
                @php
                    $jurusanStats = DB::table('murids')
                        ->select('major', DB::raw('count(*) as total'))
                        ->groupBy('major')
                        ->get();
                    $totalSiswa = DB::table('murids')->count();
                    $colors = [
                        'multimedia' => ['from-blue-400', 'to-blue-500', 'text-blue-600'],
                        'akuntansi' => ['from-green-400', 'to-green-500', 'text-green-600'],
                        'perkantoran' => ['from-yellow-400', 'to-yellow-500', 'text-yellow-600'],
                        'pemasaran' => ['from-red-400', 'to-red-500', 'text-red-600']
                    ];
                @endphp
                
                @foreach($jurusanStats as $stat)
                <div class="relative group">
                    <div class="flex mb-2 items-center justify-between">
                        <div>
                            <span class="text-sm font-semibold {{ $colors[$stat->major][2] }}">
                                {{ ucfirst($stat->major) }}
                            </span>
                        </div>
                        <div class="text-right">
                            <span class="text-sm font-bold text-gray-700">
                                {{ $stat->total }} Siswa
                                <span class="text-gray-500">({{ number_format(($stat->total / $totalSiswa) * 100, 1) }}%)</span>
                            </span>
                        </div>
                    </div>
                    <div class="overflow-hidden h-3 rounded-full bg-gray-100">
                        <div style="width:{{ ($stat->total / $totalSiswa) * 100 }}%" 
                             class="h-full rounded-full bg-gradient-to-r {{ $colors[$stat->major][0] }} {{ $colors[$stat->major][1] }} shadow-lg transition-all duration-500 group-hover:scale-105">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Calendar/Schedule Section -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
            <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Kalender Akademik
            </h3>
            <div class="space-y-4">
                <div class="flex items-center p-4 bg-indigo-50 rounded-lg">
                    <div class="flex-shrink-0 bg-indigo-500 rounded-lg p-3 text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-sm font-semibold text-indigo-900">Ujian Tengah Semester</h4>
                        <p class="text-xs text-indigo-700">2 minggu lagi</p>
                    </div>
                </div>
                <div class="flex items-center p-4 bg-green-50 rounded-lg">
                    <div class="flex-shrink-0 bg-green-500 rounded-lg p-3 text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-sm font-semibold text-green-900">Pembagian Rapor</h4>
                        <p class="text-xs text-green-700">1 bulan lagi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
