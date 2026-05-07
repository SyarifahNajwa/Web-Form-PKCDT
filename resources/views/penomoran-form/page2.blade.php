<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Halaman 2: Pengirim & Penerima') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <!-- Progress Bar -->
            <div class="mb-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-600">Progress: 2/9</span>
                    <span class="text-sm font-medium text-gray-600">22%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 22%"></div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('penomoran-form.savePage2', $penomoran->id) }}">
                        @csrf

                        <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Data Pengirim</h3>

                        <div class="mb-4">
                            <x-input-label for="nama_pengirim" :value="__('Nama Pengirim')" />
                            <x-text-input id="nama_pengirim" name="nama_pengirim" type="text" class="mt-1 block w-full" value="{{ old('nama_pengirim', $pengirim->nama_pengirim ?? '') }}" required />
                            @error('nama_pengirim')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-6">
                            <x-input-label for="alamat_pengirim" :value="__('Alamat Pengirim')" />
                            <textarea id="alamat_pengirim" name="alamat_pengirim" rows="3" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('alamat_pengirim', $pengirim->alamat_pengirim ?? '') }}</textarea>
                            @error('alamat_pengirim')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <hr class="my-6">

                        <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Data Penerima</h3>

                        <div class="mb-4">
                            <x-input-label for="jenis_identitas_penerima" :value="__('Jenis Identitas Penerima')" />
                            <x-text-input id="jenis_identitas_penerima" name="jenis_identitas_penerima" type="text" class="mt-1 block w-full" value="{{ old('jenis_identitas_penerima', $penerima->jenis_identitas_penerima ?? '') }}" placeholder="KTP, Passport" required />
                            @error('jenis_identitas_penerima')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <x-input-label for="identitas_penerima" :value="__('Nomor Identitas Penerima')" />
                            <x-text-input id="identitas_penerima" name="identitas_penerima" type="text" class="mt-1 block w-full" value="{{ old('identitas_penerima', $penerima->identitas_penerima ?? '') }}" required />
                            @error('identitas_penerima')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <x-input-label for="nama_penerima" :value="__('Nama Penerima')" />
                            <x-text-input id="nama_penerima" name="nama_penerima" type="text" class="mt-1 block w-full" value="{{ old('nama_penerima', $penerima->nama_penerima ?? '') }}" required />
                            @error('nama_penerima')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-6">
                            <x-input-label for="alamat_penerima" :value="__('Alamat Penerima')" />
                            <textarea id="alamat_penerima" name="alamat_penerima" rows="3" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('alamat_penerima', $penerima->alamat_penerima ?? '') }}</textarea>
                            @error('alamat_penerima')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('penomoran-form.back', [$penomoran->id, 2]) }}" class="text-gray-600 hover:text-gray-800">← Kembali</a>
                            <x-primary-button>
                                {{ __('Lanjut ke Halaman 3') }} →
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
