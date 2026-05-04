<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Penomoran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- FORM INPUT ANDA DI SINI -->
                <form action="{{ route('penomoran.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Input untuk Penomoran -->
                    <div class="mb-4">
                        <x-input-label for="penomoran" :value="__('Nomor Penomoran')" />
                        <x-text-input id="penomoran" class="block mt-1 w-full" type="text" name="penomoran" :value="old('penomoran', $data->penomoran)" required autofocus autocomplete="penomoran" />
                        <x-input-error :messages="$errors->get('penomoran')" class="mt-2" />
                    </div>

                    <!-- Input untuk Tanggal PIBK -->
                    <div class="mb-4">
                        <x-input-label for="tanggal_pibk" :value="__('Tanggal PIBK')" />
                        <x-text-input id="tanggal_pibk" class="block mt-1 w-full" type="date" name="tanggal_pibk" :value="old('tanggal_pibk', $data->tanggal_pibk->format('Y-m-d'))" required />
                        <x-input-error :messages="$errors->get('tanggal_pibk')" class="mt-2" />
                    </div>

                    <!-- Input untuk Nama PFPD -->
                    <div class="mb-4">
                        <x-input-label for="nama_pfpd" :value="__('Nama Pejabat Bea dan Cukai (PFPD)')" />
                        <x-text-input id="nama_pfpd" class="block mt-1 w-full" type="text" name="nama_pfpd" :value="old('nama_pfpd', $data->nama_pfpd)" autocomplete="nama_pfpd" />
                        <x-input-error :messages="$errors->get('nama_pfpd')" class="mt-2" />
                    </div>

                    <!-- Input untuk NIP PFPD -->
                    <div class="mb-4">
                        <x-input-label for="nip_pfpd" :value="__('NIP Pejabat Bea dan Cukai (PFPD)')" />
                        <x-text-input id="nip_pfpd" class="block mt-1 w-full" type="text" name="nip_pfpd" :value="old('nip_pfpd', $data->nip_pfpd)" autocomplete="nip_pfpd" />
                        <x-input-error :messages="$errors->get('nip_pfpd')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="nomor_bc11" :value="__('Nomor BC11')" />
                        <x-text-input id="nomor_bc11" class="block mt-1 w-full" type="text" name="nomor_bc11" :value="old('nomor_bc11', optional($data->diisiBc)->nomor_bc11)" autocomplete="nomor_bc11" />
                        <x-input-error :messages="$errors->get('nomor_bc11')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="nomor_pos" :value="__('Nomor POS')" />
                        <x-text-input id="nomor_pos" class="block mt-1 w-full" type="text" name="nomor_pos" :value="old('nomor_pos', optional($data->diisiBc)->nomor_pos)" autocomplete="nomor_pos" />
                        <x-input-error :messages="$errors->get('nomor_pos')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="invoice" :value="__('Invoice')" />
                        <x-text-input id="invoice" class="block mt-1 w-full" type="text" name="invoice" :value="old('invoice', optional($data->diisiBc)->invoice)" autocomplete="invoice" />
                        <x-input-error :messages="$errors->get('invoice')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="tanggal_invoice" :value="__('Tanggal Invoice')" />
                        <x-text-input id="tanggal_invoice" class="block mt-1 w-full" type="date" name="tanggal_invoice" :value="old('tanggal_invoice', optional($data->diisiBc)->tanggal_invoice?->format('Y-m-d'))" />
                        <x-input-error :messages="$errors->get('tanggal_invoice')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="nomor_bl_awb" :value="__('Nomor BL/AWB')" />
                        <x-text-input id="nomor_bl_awb" class="block mt-1 w-full" type="text" name="nomor_bl_awb" :value="old('nomor_bl_awb', optional($data->diisiBc)->nomor_bl_awb)" autocomplete="nomor_bl_awb" />
                        <x-input-error :messages="$errors->get('nomor_bl_awb')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="tanggal_bl_awb" :value="__('Tanggal BL/AWB')" />
                        <x-text-input id="tanggal_bl_awb" class="block mt-1 w-full" type="date" name="tanggal_bl_awb" :value="old('tanggal_bl_awb', optional($data->diisiBc)->tanggal_bl_awb?->format('Y-m-d'))" />
                        <x-input-error :messages="$errors->get('tanggal_bl_awb')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="negara_asal" :value="__('Negara Asal')" />
                        <x-text-input id="negara_asal" class="block mt-1 w-full" type="text" name="negara_asal" :value="old('negara_asal', optional($data->diisiBc)->negara_asal)" autocomplete="negara_asal" />
                        <x-input-error :messages="$errors->get('negara_asal')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="valuta" :value="__('Valuta')" />
                        <x-text-input id="valuta" class="block mt-1 w-full" type="text" name="valuta" :value="old('valuta', optional($data->diisiBc)->valuta)" autocomplete="valuta" maxlength="5" />
                        <x-input-error :messages="$errors->get('valuta')" class="mt-2" />
                    </div>

                    <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="fob" :value="__('FOB')" />
                            <x-text-input id="fob" class="block mt-1 w-full" type="number" step="0.01" name="fob" :value="old('fob', optional($data->diisiBc)->fob)" />
                            <x-input-error :messages="$errors->get('fob')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="freight" :value="__('Freight')" />
                            <x-text-input id="freight" class="block mt-1 w-full" type="number" step="0.01" name="freight" :value="old('freight', optional($data->diisiBc)->freight)" />
                            <x-input-error :messages="$errors->get('freight')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="asuransi" :value="__('Asuransi')" />
                            <x-text-input id="asuransi" class="block mt-1 w-full" type="number" step="0.01" name="asuransi" :value="old('asuransi', optional($data->diisiBc)->asuransi)" />
                            <x-input-error :messages="$errors->get('asuransi')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="nilai_cif" :value="__('Nilai CIF')" />
                            <x-text-input id="nilai_cif" class="block mt-1 w-full" type="number" step="0.01" name="nilai_cif" :value="old('nilai_cif', optional($data->diisiBc)->nilai_cif)" />
                            <x-input-error :messages="$errors->get('nilai_cif')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-4 flex gap-2">
                        <x-primary-button>Perbarui Data</x-primary-button>
                        <a href="{{ route('penomoran.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 active:bg-gray-400 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>