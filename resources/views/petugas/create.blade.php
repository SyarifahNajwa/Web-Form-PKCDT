<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Input Data Petugas Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('petugas.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="nama" :value="__('Nama Lengkap')" />
                            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="nip" :value="__('NIP')" />
                            <x-text-input id="nip" name="nip" type="text" class="mt-1 block w-full" required />
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div>
                                <x-input-label for="pangkat" :value="__('Pangkat/Golongan')" />
                                <x-text-input id="pangkat" name="pangkat" type="text" class="mt-1 block w-full" required />
                            </div>
                            <div>
                                <x-input-label for="jabatan" :value="__('Jabatan')" />
                                <x-text-input id="jabatan" name="jabatan" type="text" class="mt-1 block w-full" required />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('petugas.index') }}" class="mr-4 text-sm text-gray-600 hover:underline">Batal</a>
                            <x-primary-button>
                                {{ __('Simpan & Buat Surat') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>