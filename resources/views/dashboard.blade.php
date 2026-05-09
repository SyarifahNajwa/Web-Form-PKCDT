<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Selamat Datang') }} {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Selamat Datang di Sistem Administrasi Bea Cukai</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="p-6 bg-blue-50 border border-blue-200 rounded-lg shadow-sm">
                            <p class="text-sm text-gray-600 uppercase tracking-wide">Total PIBK</p>
                            <p class="mt-3 text-3xl font-semibold text-blue-800">{{ $totalPenomorans }}</p>
                        </div>
                        <div class="p-6 bg-green-50 border border-green-200 rounded-lg shadow-sm">
                            <p class="text-sm text-gray-600 uppercase tracking-wide">Selesai</p>
                            <p class="mt-3 text-3xl font-semibold text-green-800">{{ $completedPenomorans }}</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800">Daftar Penomoran</h4>
                            <p class="text-sm text-gray-500">Lihat daftar surat PIBK yang telah dibuat.</p>
                        </div>
                        <a href="{{ route('penomoran-form.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md transition">
                            + Buat Baru
                        </a>
                    </div>

                    @if($penomorans->count())
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal PIBK</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    @foreach($penomorans as $index => $penomoran)
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="px-4 py-3 text-sm text-gray-600">{{ $index + 1 }}</td>
                                            <td class="px-4 py-3 text-sm font-semibold text-gray-800">{{ $penomoran->penomoran }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-600">{{ $penomoran->tanggal_pibk->format('d-m-Y') }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-600">
                                                <div class="flex flex-wrap gap-2">
                                                    <a href="{{ route('penomoran-form.edit', $penomoran->id) }}" class="inline-flex items-center px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white text-xs font-medium rounded transition">✎ Edit</a>
                                                    <a href="{{ route('penomoran-form.show', $penomoran->id) }}" class="inline-flex items-center px-3 py-1.5 bg-sky-500 hover:bg-sky-600 text-white text-xs font-medium rounded transition">◉ Lihat</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <p class="text-gray-500 text-sm mb-2">Belum ada data PIBK.</p>
                            <a href="{{ route('penomoran-form.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md transition">+ Buat yang baru sekarang</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>