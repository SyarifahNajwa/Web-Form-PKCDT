<!-- PAGE 8 -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Halaman 8: Petugas & Jaminan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <!-- Progress Bar -->
            <div class="mb-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-600">Progress: 8/9</span>
                    <span class="text-sm font-medium text-gray-600">88%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 88%"></div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('penomoran-form.savePage8', $penomoran->id) }}">
                        @csrf

                        <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Data PFPD (Pejabat Fungsional Pemeriksa Dinas)</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <x-input-label for="nama_pfpd" :value="__('Nama PFPD')" />
                                <x-text-input id="nama_pfpd" name="nama_pfpd" type="text" class="mt-1 block w-full" value="{{ old('nama_pfpd', $pfpd->nama_pfpd ?? '') }}" />
                                @error('nama_pfpd')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <x-input-label for="nip_pfpd" :value="__('NIP PFPD')" />
                                <x-text-input id="nip_pfpd" name="nip_pfpd" type="text" class="mt-1 block w-full" value="{{ old('nip_pfpd', $pfpd->nip_pfpd ?? '') }}" />
                                @error('nip_pfpd')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <hr class="my-6">

                        <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Data Pemeriksa</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <x-input-label for="nama_pemeriksa" :value="__('Nama Pemeriksa')" />
                                <x-text-input id="nama_pemeriksa" name="nama_pemeriksa" type="text" class="mt-1 block w-full" value="{{ old('nama_pemeriksa', $pemeriksa->nama_pemeriksa ?? '') }}" />
                                @error('nama_pemeriksa')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <x-input-label for="nip_pemeriksa" :value="__('NIP Pemeriksa')" />
                                <x-text-input id="nip_pemeriksa" name="nip_pemeriksa" type="text" class="mt-1 block w-full" value="{{ old('nip_pemeriksa', $pemeriksa->nip_pemeriksa ?? '') }}" />
                                @error('nip_pemeriksa')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <hr class="my-6">

                        <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Jaminan</h3>

                        <div class="mb-4">
                            <x-input-label for="pembayaran" :value="__('Pembayaran')" />
                            <x-text-input id="pembayaran" name="pembayaran" type="text" class="mt-1 block w-full" value="{{ old('pembayaran', $jaminan->pembayaran ?? '') }}" />
                            @error('pembayaran')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <x-input-label for="jaminan" :value="__('Jaminan')" />
                            <textarea id="jaminan" name="jaminan" rows="3" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >{{ old('jaminan', $jaminan->jaminan ?? '') }}</textarea>
                            @error('jaminan')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-6">
                            <x-input-label for="pejabat_penerima" :value="__('Pejabat Penerima')" />
                            <x-text-input id="pejabat_penerima" name="pejabat_penerima" type="text" class="mt-1 block w-full" value="{{ old('pejabat_penerima', $jaminan->pejabat_penerima ?? '') }}" />
                            @error('pejabat_penerima')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('penomoran-form.back', [$penomoran->id, 8]) }}" class="text-gray-600 hover:text-gray-800">← Kembali</a>
                            <x-primary-button>
                                {{ __('Lanjut ke Halaman 9') }} →
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
