@extends('guru.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
    <div class="border-b pb-4 mb-4">
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Jadwal Mengajar</h1>
        <p class="text-sm sm:text-base text-gray-600">Jadwal mengajar guru di SMK Pembangunan Bogor</p>
    </div>

    <!-- Filter Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
        <div>
            <label for="tahun_ajaran" class="block text-sm font-medium text-gray-700 mb-1">Tahun Ajaran</label>
            <select id="tahun_ajaran" name="tahun_ajaran" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                <option value="2023/2024-1">2023/2024 - Semester Ganjil</option>
                <option value="2023/2024-2">2023/2024 - Semester Genap</option>
            </select>
        </div>
        <div>
            <label for="hari" class="block text-sm font-medium text-gray-700 mb-1">Hari</label>
            <select id="hari" name="hari" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                <option value="all">Semua Hari</option>
                <option value="senin">Senin</option>
                <option value="selasa">Selasa</option>
                <option value="rabu">Rabu</option>
                <option value="kamis">Kamis</option>
                <option value="jumat">Jumat</option>
            </select>
        </div>
    </div>

    <!-- Jadwal Table -->
    <div class="bg-white rounded-lg border">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hari</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jam</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mata Pelajaran</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kelas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ruangan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Senin</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">07:00 - 08:30</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Pemrograman Dasar</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">X RPL 1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Lab 1</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Senin</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">08:30 - 10:00</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Pemrograman Dasar</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">X RPL 2</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Lab 1</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Selasa</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">10:15 - 11:45</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Basis Data</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">XI RPL 1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Lab 2</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
