<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Penomoran Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- FORM INPUT ANDA DI SINI -->
                <form action="{{ route('penomoran.store') }}" method="POST">
                    @csrf

                    <!-- Input untuk Penomoran -->
                    <div class="mb-4">
                        <x-input-label for="penomoran" :value="__('Nomor Penomoran')" />
                        <x-text-input id="penomoran" class="block mt-1 w-full" type="text" name="penomoran" :value="old('penomoran')" required autofocus autocomplete="penomoran" />
                        <x-input-error :messages="$errors->get('penomoran')" class="mt-2" />
                    </div>

                    <!-- Input untuk Tanggal PIBK -->
                    <div class="mb-4">
                        <x-input-label for="tanggal_pibk" :value="__('Tanggal PIBK')" />
                        <x-text-input id="tanggal_pibk" class="block mt-1 w-full" type="date" name="tanggal_pibk" :value="old('tanggal_pibk')" required />
                        <x-input-error :messages="$errors->get('tanggal_pibk')" class="mt-2" />
                    </div>

                    <div class="mt-4 flex gap-2">
                        <x-primary-button>Simpan Data</x-primary-button>
                        <a href="{{ route('penomoran.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 active:bg-gray-400 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>