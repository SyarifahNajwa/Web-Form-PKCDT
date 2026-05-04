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
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid gap-6">
                    @forelse($allData as $index => $item)
                        <div class="rounded-3xl border border-gray-200 bg-gray-50 p-6 shadow-sm hover:shadow-md transition">
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-xs uppercase tracking-[0.2em] text-gray-500">Item #{{ $index + 1 }}</p>
                                    <h3 class="mt-2 text-xl font-semibold text-gray-900">{{ $item->penomoran }}</h3>
                                    <p class="mt-1 text-sm text-gray-600">Tanggal PIBK: {{ $item->tanggal_pibk->format('d-m-Y') }}</p>
                                    @if($item->nama_pfpd)
                                        <p class="mt-1 text-sm text-gray-600">PFPD: {{ $item->nama_pfpd }}</p>
                                    @endif
                                </div>
                                <div class="inline-flex items-center gap-2 text-xs text-gray-500">
                                    <span class="rounded-full bg-white px-3 py-1 font-semibold text-gray-700 shadow-sm">ID: {{ $item->id }}</span>
                                </div>
                            </div>

                            <div class="mt-5 grid gap-2 sm:grid-cols-2 lg:grid-cols-4">
                                <a href="{{ route('penomoran.show', $item->id) }}" class="inline-flex justify-center rounded-xl bg-blue-500 px-3 py-2 text-center text-xs font-semibold uppercase text-white transition hover:bg-blue-600">Lihat</a>
                                <a href="{{ route('penomoran.print', $item->id) }}" target="_blank" class="inline-flex justify-center rounded-xl bg-green-500 px-3 py-2 text-center text-xs font-semibold uppercase text-white transition hover:bg-green-600">Cetak</a>
                                <a href="{{ route('penomoran.edit', $item->id) }}" class="inline-flex justify-center rounded-xl bg-yellow-500 px-3 py-2 text-center text-xs font-semibold uppercase text-white transition hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('penomoran.destroy', $item->id) }}" method="POST" class="inline-flex">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="w-full rounded-xl bg-red-500 px-3 py-2 text-center text-xs font-semibold uppercase text-white transition hover:bg-red-600">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="rounded-3xl border border-dashed border-gray-300 bg-white p-8 text-center text-gray-500">
                            <p class="text-lg font-medium">Belum ada data penomoran.</p>
                            <p class="mt-2 text-sm">Silakan tambahkan data penomoran baru menggunakan tombol Tambah Data.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>