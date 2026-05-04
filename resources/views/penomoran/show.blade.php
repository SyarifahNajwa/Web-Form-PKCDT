<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Penomoran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <strong>Nomor Penomoran:</strong> {{ $data->penomoran }}
                </div>
                <div class="mb-4">
                    <strong>Tanggal PIBK:</strong> {{ $data->tanggal_pibk->format('d-m-Y') }}
                </div>
                @if($data->nama_pfpd && $data->nip_pfpd)
                <div class="mb-4">
                    <strong>PFPD:</strong> {{ $data->nama_pfpd }}, {{ $data->nip_pfpd }}
                </div>
                @endif
                @if($data->diisiBc)
                <div class="mb-4">
                    <strong>Nomor BC11:</strong> {{ $data->diisiBc->nomor_bc11 ?? '-' }}
                </div>
                <div class="mb-4">
                    <strong>Nomor POS:</strong> {{ $data->diisiBc->nomor_pos ?? '-' }}
                </div>
                <div class="mb-4">
                    <strong>Invoice:</strong> {{ $data->diisiBc->invoice ?? '-' }}
                </div>
                <div class="mb-4">
                    <strong>Tanggal Invoice:</strong> {{ optional($data->diisiBc->tanggal_invoice)->format('d-m-Y') ?? '-' }}
                </div>
                <div class="mb-4">
                    <strong>Nomor BL/AWB:</strong> {{ $data->diisiBc->nomor_bl_awb ?? '-' }}
                </div>
                <div class="mb-4">
                    <strong>Tanggal BL/AWB:</strong> {{ optional($data->diisiBc->tanggal_bl_awb)->format('d-m-Y') ?? '-' }}
                </div>
                <div class="mb-4">
                    <strong>Negara Asal:</strong> {{ $data->diisiBc->negara_asal ?? '-' }}
                </div>
                <div class="mb-4">
                    <strong>Valuta:</strong> {{ $data->diisiBc->valuta ?? '-' }}
                </div>
                <div class="mb-4">
                    <strong>FOB:</strong> {{ $data->diisiBc->fob ?? '-' }}
                </div>
                <div class="mb-4">
                    <strong>Freight:</strong> {{ $data->diisiBc->freight ?? '-' }}
                </div>
                <div class="mb-4">
                    <strong>Asuransi:</strong> {{ $data->diisiBc->asuransi ?? '-' }}
                </div>
                <div class="mb-4">
                    <strong>Nilai CIF:</strong> {{ $data->diisiBc->nilai_cif ?? '-' }}
                </div>
                @endif
                <div class="mt-4 flex flex-wrap gap-2">
                    <a href="{{ route('penomoran.print', $data->id) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 active:bg-green-700 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">Cetak</a>
                    <a href="{{ route('penomoran.edit', $data->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">Edit</a>
                    <a href="{{ route('penomoran.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 active:bg-gray-400 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>