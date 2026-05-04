<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Penomoran PIBK') }}
            </h2>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('penomoran.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-xs uppercase inline-block">
                    + Tambah Data
                </a>
                <a href="{{ route('penomoran.cetak') }}" target="_blank" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-xs uppercase inline-block">
                    Cetak Laporan
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- TABEL DATA ANDA DI SINI -->
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse border border-gray-300 min-w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2 text-left whitespace-nowrap">No</th>
                                <th class="border border-gray-300 px-4 py-2 text-left whitespace-nowrap">Nomor Penomoran</th>
                                <th class="border border-gray-300 px-4 py-2 text-left whitespace-nowrap">Tanggal PIBK</th>
                                <th class="border border-gray-300 px-4 py-2 text-left whitespace-nowrap">Aksi</th>
                            </tr>
                        </thead>
                    <tbody>
                        @forelse($allData as $index => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $item->penomoran }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $item->tanggal_pibk->format('d-m-Y') }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <div class="flex flex-wrap gap-1">
                                        <a href="{{ route('penomoran.show', $item->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-xs inline-block">
                                            Lihat
                                        </a>
                                        <a href="{{ route('penomoran.edit', $item->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded text-xs inline-block">
                                            Edit
                                        </a>
                                        <form action="{{ route('penomoran.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-xs inline-block">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="border border-gray-300 px-4 py-2 text-center">Tidak ada data penomoran.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>