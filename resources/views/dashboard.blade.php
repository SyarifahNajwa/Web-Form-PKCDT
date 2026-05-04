<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Utama') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Selamat Datang di Sistem Administrasi Bea Cukai</h3>
                    
                    <!-- Grid Menu Cepat -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kotak Shortcut 1 -->
                        <div class="p-6 bg-blue-50 border border-blue-200 rounded-lg shadow-sm">
                            <h4 class="font-bold text-blue-800 mb-2">Manajemen Petugas</h4>
                            <p class="text-sm text-gray-600 mb-4">Kelola data petugas, NIP, pangkat, dan cetak surat tugas resmi.</p>
                            <div class="flex space-x-3">
                                <a href="{{ route('petugas.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                                    Lihat Semua Petugas
                                </a>
                                <a href="{{ route('petugas.create') }}" class="inline-flex items-center px-4 py-2 bg-white border border-blue-600 rounded-md font-semibold text-xs text-blue-600 uppercase tracking-widest hover:bg-blue-50">
                                    + Tambah Baru
                                </a>
                            </div>
                        </div>

                        <!-- Kotak Shortcut 2 (Bisa untuk fitur lain nanti) -->
                        <div class="p-6 bg-gray-50 border border-gray-200 rounded-lg shadow-sm">
                            <h4 class="font-bold text-gray-800 mb-2">Informasi Sistem</h4>
                            <p class="text-sm text-gray-600">Sistem ini digunakan untuk mempermudah administrasi data pegawai di lingkungan kantor.</p>
                            <span class="text-xs font-mono bg-gray-200 px-2 py-1 rounded">Versi 1.0 - PKCDT Mode</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>