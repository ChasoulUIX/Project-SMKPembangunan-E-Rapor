@extends('guru.layouts.app')

@php use Illuminate\Support\Facades\Auth; @endphp

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Pengaturan Nama Materi</h2>

        <form action="{{ route('guru.materi.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <input type="hidden" name="nama_guru" value="{{ Auth::user()->name }}">

            <div class="relative">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Mata Pelajaran</label>
                <select name="nama_mapel" id="nama_mapel" 
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                    required>
                    <option value="">Pilih Mata Pelajaran</option>
                    @foreach(\App\Models\Daftarmatapelajaran::where('nama_guru', Auth::user()->name)
                        ->select('nama_mapel')
                        ->distinct()
                        ->get() as $mapel)
                        <option value="{{ $mapel->nama_mapel }}">{{ $mapel->nama_mapel }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="relative">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Materi 1</label>
                    <input type="text" name="materi_1"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                        placeholder="Masukkan nama materi 1">
                </div>

                <div class="relative">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Materi 2</label>
                    <input type="text" name="materi_2"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                        placeholder="Masukkan nama materi 2">
                </div>

                <div class="relative">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Materi 3</label>
                    <input type="text" name="materi_3"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                        placeholder="Masukkan nama materi 3">
                </div>

                <div class="relative">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Materi 4</label>
                    <input type="text" name="materi_4"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                        placeholder="Masukkan nama materi 4">
                </div>

                <div class="relative">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Materi 5</label>
                    <input type="text" name="materi_5"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                        placeholder="Masukkan nama materi 5">
                </div>
            </div>

            <div class="flex justify-end space-x-4 mt-8 pt-4 border-t">
                <button type="submit"
                    class="px-6 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white transition duration-200 ease-in-out font-medium text-sm">
                    Simpan Nama Materi
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('nama_mapel').addEventListener('change', function() {
    const mapel = this.value;
    if (mapel) {
        fetch(`/guru/materi/${mapel}`)
            .then(response => response.json())
            .then(data => {
                if (data) {
                    document.querySelector('input[name="materi_1"]').value = data.materi_1 || '';
                    document.querySelector('input[name="materi_2"]').value = data.materi_2 || '';
                    document.querySelector('input[name="materi_3"]').value = data.materi_3 || '';
                    document.querySelector('input[name="materi_4"]').value = data.materi_4 || '';
                    document.querySelector('input[name="materi_5"]').value = data.materi_5 || '';
                }
            });
    }
});
</script>

@if(session('success'))
    <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
        {{ session('success') }}
    </div>
@endif

@endsection
