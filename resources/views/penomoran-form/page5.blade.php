<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Halaman 5: PIB (Pemberitahuan Impor Barang)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Progress Bar -->
            <div class="mb-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-600">Progress: 5/9</span>
                    <span class="text-sm font-medium text-gray-600">55%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 55%"></div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('penomoran-form.savePage5', $penomoran->id) }}">
                        @csrf

                        <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Dokumen PIB</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <x-input-label for="nomor_bc11" :value="__('Nomor BC 1.1')" />
                                <x-text-input id="nomor_bc11" name="nomor_bc11" type="text" class="mt-1 block w-full" value="{{ old('nomor_bc11', $pib->nomor_bc11 ?? '') }}" />
                                @error('nomor_bc11')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <x-input-label for="tanggal_bc11" :value="__('Tanggal BC 1.1')" />
                                <x-text-input id="tanggal_bc11" name="tanggal_bc11" type="date" class="mt-1 block w-full" value="{{ old('tanggal_bc11', $pib->tanggal_bc11?->format('Y-m-d') ?? '') }}" />
                                @error('tanggal_bc11')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <x-input-label for="nomor_pos" :value="__('Nomor Pos')" />
                                <x-text-input id="nomor_pos" name="nomor_pos" type="text" class="mt-1 block w-full" value="{{ old('nomor_pos', $pib->nomor_pos ?? '') }}" />
                                @error('nomor_pos')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <x-input-label for="invoice" :value="__('Invoice')" />
                                <x-text-input id="invoice" name="invoice" type="text" class="mt-1 block w-full" value="{{ old('invoice', $pib->invoice ?? '') }}" />
                                @error('invoice')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <x-input-label for="tanggal_invoice" :value="__('Tanggal Invoice')" />
                                <x-text-input id="tanggal_invoice" name="tanggal_invoice" type="date" class="mt-1 block w-full" value="{{ old('tanggal_invoice', $pib->tanggal_invoice?->format('Y-m-d') ?? '') }}" />
                                @error('tanggal_invoice')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <x-input-label for="nomor_bl_awb" :value="__('Nomor BL/AWB')" />
                                <x-text-input id="nomor_bl_awb" name="nomor_bl_awb" type="text" class="mt-1 block w-full" value="{{ old('nomor_bl_awb', $pib->nomor_bl_awb ?? '') }}" />
                                @error('nomor_bl_awb')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <x-input-label for="tanggal_bl_awb" :value="__('Tanggal BL/AWB')" />
                            <x-text-input id="tanggal_bl_awb" name="tanggal_bl_awb" type="date" class="mt-1 block w-full" value="{{ old('tanggal_bl_awb', $pib->tanggal_bl_awb?->format('Y-m-d') ?? '') }}" />
                            @error('tanggal_bl_awb')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <hr class="my-6">

                        <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Nilai PIB</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <x-input-label for="negara_asal_barang" :value="__('Negara Asal Barang')" />
                                <x-text-input id="negara_asal_barang" name="negara_asal_barang" type="text" class="mt-1 block w-full" value="{{ old('negara_asal_barang', $pib->negara_asal_barang ?? '') }}" />
                                @error('negara_asal_barang')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <x-input-label for="valuta" :value="__('Valuta')" />
                                <x-text-input id="valuta" name="valuta" type="text" class="mt-1 block w-full" placeholder="USD, EUR, IDR" value="{{ old('valuta', $pib->valuta ?? '') }}" maxlength="5" />
                                @error('valuta')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <x-input-label for="fob" :value="__('FOB')" />
                                <x-text-input id="fob" name="fob" type="number" step="0.01" class="mt-1 block w-full" value="{{ old('fob', $pib->fob ?? '') }}" />
                                @error('fob')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <x-input-label for="freight" :value="__('Freight')" />
                                <x-text-input id="freight" name="freight" type="number" step="0.01" class="mt-1 block w-full" value="{{ old('freight', $pib->freight ?? '') }}" />
                                @error('freight')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <x-input-label for="asuransi" :value="__('Asuransi')" />
                                <x-text-input id="asuransi" name="asuransi" type="number" step="0.01" class="mt-1 block w-full" value="{{ old('asuransi', $pib->asuransi ?? '') }}" />
                                @error('asuransi')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <x-input-label for="nilai_cif" :value="__('Nilai CIF')" />
                                <x-text-input id="nilai_cif" name="nilai_cif" type="number" step="0.01" class="mt-1 block w-full" value="{{ old('nilai_cif', $pib->nilai_cif ?? '') }}" />
                                @error('nilai_cif')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('penomoran-form.back', [$penomoran->id, 5]) }}" class="text-gray-600 hover:text-gray-800">← Kembali</a>
                            <x-primary-button>
                                {{ __('Lanjut ke Halaman 6') }} →
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
