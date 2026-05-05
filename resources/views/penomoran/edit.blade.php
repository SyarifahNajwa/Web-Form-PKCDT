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
                @php
                    $initialStep = 1;
                    $stepFields = [
                        1 => ['penomoran', 'tanggal_pibk'],
                        2 => [
                            'nama_barang',
                            'alamat_pengiriman',
                            'identitas_penerima',
                            'nama_penerima',
                            'alamat_penerima',
                            'identitas_pemberitahu',
                            'nama_pemberitahu',
                            'alamat_pemberitahu',
                            'no_tgl_izin_pjt',
                            'cara_pengangkut',
                            'nama_sarana_angkut',
                            'no_flight',
                            'pelabuhan_muat',
                            'pelabuhan_bongkar',
                        ],
                        3 => [
                            'nomor_bc11',
                            'nomor_pos',
                            'invoice',
                            'tanggal_invoice',
                            'nomor_bl_awb',
                            'tanggal_bl_awb',
                            'negara_asal',
                            'valuta',
                            'fob',
                            'freight',
                            'asuransi',
                            'nilai_cif',
                        ],
                    ];
                    foreach ($stepFields as $step => $fields) {
                        foreach ($fields as $field) {
                            if ($errors->has($field)) {
                                $initialStep = $step;
                                break 2;
                            }
                        }
                    }
                @endphp

                <form action="{{ route('penomoran.update', $data->id) }}" method="POST" id="penomoranForm">
                    @csrf
                    @method('PUT')

                    <div class="mb-6 grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <button type="button" class="step-indicator px-3 py-2 rounded-full border text-sm font-semibold" data-step="1">1. Penomoran</button>
                        <button type="button" class="step-indicator px-3 py-2 rounded-full border text-sm font-semibold" data-step="2">2. Pemberitahuan</button>
                        <button type="button" class="step-indicator px-3 py-2 rounded-full border text-sm font-semibold" data-step="3">3. Diisi BC</button>
                    </div>

                    <div class="step-panel" data-step="1">
                        <h3 class="text-lg font-semibold mb-4">Penomoran dan Tanggal</h3>

                        <div class="mb-4">
                            <x-input-label for="penomoran" :value="__('Nomor Penomoran')" />
                            <x-text-input id="penomoran" class="block mt-1 w-full" type="text" name="penomoran" :value="old('penomoran', $data->penomoran)" required autofocus autocomplete="penomoran" />
                            <x-input-error :messages="$errors->get('penomoran')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="tanggal_pibk" :value="__('Tanggal PIBK')" />
                            <x-text-input id="tanggal_pibk" class="block mt-1 w-full" type="date" name="tanggal_pibk" :value="old('tanggal_pibk', $data->tanggal_pibk->format('Y-m-d'))" required />
                            <x-input-error :messages="$errors->get('tanggal_pibk')" class="mt-2" />
                        </div>
                    </div>

                    <div class="step-panel hidden" data-step="2">
                        <h3 class="text-lg font-semibold mb-4">Data Pemberitahuan</h3>

                        <div class="mb-4">
                            <x-input-label for="nama_barang" :value="__('Nama Barang')" />
                            <textarea id="nama_barang" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="nama_barang">{{ old('nama_barang', optional($data->dataPemberitahuan)->nama_barang) }}</textarea>
                            <x-input-error :messages="$errors->get('nama_barang')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="alamat_pengiriman" :value="__('Alamat Pengiriman')" />
                            <textarea id="alamat_pengiriman" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat_pengiriman">{{ old('alamat_pengiriman', optional($data->dataPemberitahuan)->alamat_pengiriman) }}</textarea>
                            <x-input-error :messages="$errors->get('alamat_pengiriman')" class="mt-2" />
                        </div>

                        <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="identitas_penerima" :value="__('Identitas Penerima')" />
                                <x-text-input id="identitas_penerima" class="block mt-1 w-full" type="text" name="identitas_penerima" :value="old('identitas_penerima', optional($data->dataPemberitahuan)->identitas_penerima)" autocomplete="identitas_penerima" />
                                <x-input-error :messages="$errors->get('identitas_penerima')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="nama_penerima" :value="__('Nama Penerima')" />
                                <x-text-input id="nama_penerima" class="block mt-1 w-full" type="text" name="nama_penerima" :value="old('nama_penerima', optional($data->dataPemberitahuan)->nama_penerima)" autocomplete="nama_penerima" />
                                <x-input-error :messages="$errors->get('nama_penerima')" class="mt-2" />
                            </div>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="alamat_penerima" :value="__('Alamat Penerima')" />
                            <textarea id="alamat_penerima" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat_penerima">{{ old('alamat_penerima', optional($data->dataPemberitahuan)->alamat_penerima) }}</textarea>
                            <x-input-error :messages="$errors->get('alamat_penerima')" class="mt-2" />
                        </div>

                        <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="identitas_pemberitahu" :value="__('Identitas Pemberitahu')" />
                                <x-text-input id="identitas_pemberitahu" class="block mt-1 w-full" type="text" name="identitas_pemberitahu" :value="old('identitas_pemberitahu', optional($data->dataPemberitahuan)->identitas_pemberitahu)" autocomplete="identitas_pemberitahu" />
                                <x-input-error :messages="$errors->get('identitas_pemberitahu')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="nama_pemberitahu" :value="__('Nama Pemberitahu')" />
                                <x-text-input id="nama_pemberitahu" class="block mt-1 w-full" type="text" name="nama_pemberitahu" :value="old('nama_pemberitahu', optional($data->dataPemberitahuan)->nama_pemberitahu)" autocomplete="nama_pemberitahu" />
                                <x-input-error :messages="$errors->get('nama_pemberitahu')" class="mt-2" />
                            </div>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="alamat_pemberitahu" :value="__('Alamat Pemberitahu')" />
                            <textarea id="alamat_pemberitahu" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat_pemberitahu">{{ old('alamat_pemberitahu', optional($data->dataPemberitahuan)->alamat_pemberitahu) }}</textarea>
                            <x-input-error :messages="$errors->get('alamat_pemberitahu')" class="mt-2" />
                        </div>

                        <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="no_tgl_izin_pjt" :value="__('No/Tgl Izin PJT')" />
                                <x-text-input id="no_tgl_izin_pjt" class="block mt-1 w-full" type="text" name="no_tgl_izin_pjt" :value="old('no_tgl_izin_pjt', optional($data->dataPemberitahuan)->no_tgl_izin_pjt)" autocomplete="no_tgl_izin_pjt" />
                                <x-input-error :messages="$errors->get('no_tgl_izin_pjt')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="cara_pengangkut" :value="__('Cara Pengangkut')" />
                                <x-text-input id="cara_pengangkut" class="block mt-1 w-full" type="text" name="cara_pengangkut" :value="old('cara_pengangkut', optional($data->dataPemberitahuan)->cara_pengangkut)" autocomplete="cara_pengangkut" />
                                <x-input-error :messages="$errors->get('cara_pengangkut')" class="mt-2" />
                            </div>
                        </div>

                        <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="nama_sarana_angkut" :value="__('Nama Sarana Angkut')" />
                                <x-text-input id="nama_sarana_angkut" class="block mt-1 w-full" type="text" name="nama_sarana_angkut" :value="old('nama_sarana_angkut', optional($data->dataPemberitahuan)->nama_sarana_angkut)" autocomplete="nama_sarana_angkut" />
                                <x-input-error :messages="$errors->get('nama_sarana_angkut')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="no_flight" :value="__('No Flight')" />
                                <x-text-input id="no_flight" class="block mt-1 w-full" type="text" name="no_flight" :value="old('no_flight', optional($data->dataPemberitahuan)->no_flight)" autocomplete="no_flight" />
                                <x-input-error :messages="$errors->get('no_flight')" class="mt-2" />
                            </div>
                        </div>

                        <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="pelabuhan_muat" :value="__('Pelabuhan Muat')" />
                                <x-text-input id="pelabuhan_muat" class="block mt-1 w-full" type="text" name="pelabuhan_muat" :value="old('pelabuhan_muat', optional($data->dataPemberitahuan)->pelabuhan_muat)" autocomplete="pelabuhan_muat" />
                                <x-input-error :messages="$errors->get('pelabuhan_muat')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="pelabuhan_bongkar" :value="__('Pelabuhan Bongkar')" />
                                <x-text-input id="pelabuhan_bongkar" class="block mt-1 w-full" type="text" name="pelabuhan_bongkar" :value="old('pelabuhan_bongkar', optional($data->dataPemberitahuan)->pelabuhan_bongkar)" autocomplete="pelabuhan_bongkar" />
                                <x-input-error :messages="$errors->get('pelabuhan_bongkar')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="step-panel hidden" data-step="3">
                        <h3 class="text-lg font-semibold mb-4">Diisi Oleh Bea dan Cukai</h3>

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
                    </div>

                    <div class="mt-4 flex items-center justify-between gap-2">
                        <button type="button" id="prevBtn" class="hidden inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-300">Sebelumnya</button>
                        <button type="button" id="nextBtn" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-semibold text-white hover:bg-blue-700">Selanjutnya</button>
                        <x-primary-button id="submitBtn" type="submit" class="hidden">Perbarui Data</x-primary-button>
                    </div>
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const panels = document.querySelectorAll('.step-panel');
                        const indicators = document.querySelectorAll('.step-indicator');
                        const prevBtn = document.getElementById('prevBtn');
                        const nextBtn = document.getElementById('nextBtn');
                        const submitBtn = document.getElementById('submitBtn');
                        let currentStep = {{ $initialStep }};

                        function setActiveStep(step) {
                            panels.forEach(panel => {
                                panel.classList.toggle('hidden', Number(panel.dataset.step) !== step);
                            });
                            indicators.forEach(indicator => {
                                const active = Number(indicator.dataset.step) === step;
                                indicator.classList.toggle('bg-blue-600', active);
                                indicator.classList.toggle('text-white', active);
                                indicator.classList.toggle('border-blue-600', active);
                                indicator.classList.toggle('bg-white', !active);
                                indicator.classList.toggle('text-gray-700', !active);
                                indicator.classList.toggle('border-gray-300', !active);
                            });
                            prevBtn.classList.toggle('hidden', step === 1);
                            nextBtn.classList.toggle('hidden', step === panels.length);
                            submitBtn.classList.toggle('hidden', step !== panels.length);
                        }

                        function validateCurrentStep() {
                            const currentPanel = document.querySelector(`.step-panel[data-step="${currentStep}"]`);
                            const inputs = currentPanel.querySelectorAll('input, textarea, select');
                            for (const input of inputs) {
                                if (!input.checkValidity()) {
                                    input.reportValidity();
                                    return false;
                                }
                            }
                            return true;
                        }

                        indicators.forEach(indicator => {
                            indicator.addEventListener('click', () => {
                                const targetStep = Number(indicator.dataset.step);
                                if (targetStep <= currentStep || validateCurrentStep()) {
                                    currentStep = targetStep;
                                    setActiveStep(currentStep);
                                }
                            });
                        });

                        prevBtn.addEventListener('click', function () {
                            if (currentStep > 1) {
                                currentStep -= 1;
                                setActiveStep(currentStep);
                            }
                        });

                        nextBtn.addEventListener('click', function () {
                            if (validateCurrentStep() && currentStep < panels.length) {
                                currentStep += 1;
                                setActiveStep(currentStep);
                                window.scrollTo({ top: 0, behavior: 'smooth' });
                            }
                        });

                        setActiveStep(currentStep);
                    });
                </script>
            </div>
        </div>
    </div>
</x-app-layout>