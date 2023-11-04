@extends('layouts.student.panel', ['content_card' => true])

@section('title', 'File')
@section('head')
    <style>
        ::-webkit-file-upload-button {
            display: none;
        }
    </style>
    <script type="module">
        document.querySelectorAll('[data-file]').forEach(element => {
            element.addEventListener('click', () => {
                document.getElementById(element.dataset.file).click()
            })
        });
        document.querySelectorAll('input[type="file"]').forEach(element => {
            element.addEventListener('input', () => {
                if (element.files[0]) {
                    element.previousElementSibling.value = element.files[0].name
                    element.previousElementSibling.previousElementSibling.className = "py-2.5 px-6 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-l-lg"
                }
            })
        });
    </script>
@endsection
@php
    $readonly = $data['status'] == 'validate' || $data['status'] == 'revalidate' || $data['status'] == 'validated';
@endphp
@section('content')
    <form id="biodata" class="grid gap-4" action="{{ route('student.file.store') }}" method="POST"
        enctype="multipart/form-data">
        @if (!$readonly)
            @csrf
        @endif
        <div class="grid gap-2">
            <label class="block text-lg font-medium text-gray-900 dark:text-white" for="munaqasyah">
                Berita Acara Yudisium
            </label>
            @if (!$readonly)
                <p class="text-sm text-gray-600 dark:text-gray-400" id="munaqasyah_help">
                    File dalam bentuk jpg/jpeg/png, max 2MB.
                </p>
                <div
                    class="relative flex items-center w-min text-sm text-gray-900 border-none cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <button data-file="munaqasyah"
                        class="py-2.5 px-6 {{ $data['munaqasyah'] ? 'bg-green-500 hover:bg-green-600' : 'bg-gray-800 hover:bg-gray-700' }} text-white font-medium rounded-l-lg"
                        type="button">Browse</button>
                    <input class="flex-grow border border-gray-300 rounded-lg rounded-l-none" type="text"
                        value="{{ preg_replace('/.*\/.*\//i', '', $data['munaqasyah']) }}" readonly>
                    <input class="p-2.5 hidden" aria-describedby="munaqasyah_help" id="munaqasyah" name="munaqasyah"
                        type="file">
                </div>
                @error('munaqasyah')
                    <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            @else
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ preg_replace('/.*\/.*\//i', '', $data['munaqasyah']) }}
                </p>
            @endif
        </div>
        <div class="grid gap-2">
            <label class="block text-lg font-medium text-gray-900 dark:text-white" for="school_certificate">
                Ijazah SMA/SMK/MA/S1
            </label>
            @if (!$readonly)
                <p class="text-sm text-gray-600 dark:text-gray-400" id="school_certificate_help">
                    Ijazah Yang Telah Dilegalisir.<br>
                    File dalam bentuk jpg/jpeg/png, max 2MB.
                </p>
                <div
                    class="relative flex items-center w-min text-sm text-gray-900 border-none cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <button data-file="school_certificate"
                        class="py-2.5 px-6 {{ $data['school_certificate'] ? 'bg-green-500 hover:bg-green-600' : 'bg-gray-800 hover:bg-gray-700' }} text-white font-medium rounded-l-lg"
                        type="button">Browse</button>
                    <input class="flex-grow border border-gray-300 rounded-lg rounded-l-none" type="text"
                        value="{{ preg_replace('/.*\/.*\//i', '', $data['school_certificate']) }}" readonly>
                    <input class="p-2.5 hidden" aria-describedby="school_certificate_help" id="school_certificate"
                        name="school_certificate" type="file">
                </div>
                @error('school_certificate')
                    <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            @else
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ preg_replace('/.*\/.*\//i', '', $data['school_certificate']) }}
                </p>
            @endif
        </div>
        <div class="grid gap-2">
            <label class="block text-lg font-medium text-gray-900 dark:text-white" for="ktp">
                Kartu Tanda Pengenal (KTP)
            </label>
            @if (!$readonly)
                <p class="text-sm text-gray-600 dark:text-gray-400" id="ktp_help">
                    File dalam bentuk jpg/jpeg/png, max 2MB.
                </p>
                <div
                    class="relative flex items-center w-min text-sm text-gray-900 border-none cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <button data-file="ktp"
                        class="py-2.5 px-6 {{ $data['ktp'] ? 'bg-green-500 hover:bg-green-600' : 'bg-gray-800 hover:bg-gray-700' }} text-white font-medium rounded-l-lg"
                        type="button">Browse</button>
                    <input class="flex-grow border border-gray-300 rounded-lg rounded-l-none" type="text"
                        value="{{ preg_replace('/.*\/.*\//i', '', $data['ktp']) }}" readonly>
                    <input class="p-2.5 hidden" aria-describedby="ktp_help" id="ktp" name="ktp" type="file">
                </div>
                @error('ktp')
                    <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            @else
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ preg_replace('/.*\/.*\//i', '', $data['ktp']) }}
                </p>
            @endif
        </div>
        {{-- <div class="grid gap-2">
            <label class="block text-lg font-medium text-gray-900 dark:text-white" for="kk">Kartu Keluarga
                (KK)</label>
            <p class="text-sm text-gray-500 dark:text-gray-300" id="kk_help">
                File dalam bentuk jpg/png, max 2MB.
            </p>
            @if ($data['kk'])
                <button type="button"
                    class="text-left text-base font-medium text-gray-900 dark:text-gray-50 hover:text-gray-600">
                    Sudah Ada
                </button>
            @endif
            @if (!$readonly)
                <div
                    class="relative flex items-center w-min text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <button data-file="kk"
                        class="py-2.5 px-6 {{ $data['kk'] ? 'bg-green-500 hover:bg-green-600' : 'bg-gray-800 hover:bg-gray-700' }} text-white font-medium rounded-l-lg"
                        type="button">Browse</button>
                    <input class="p-2.5" aria-describedby="kk_help" id="kk" name="kk" type="file">
                </div>
                @error('kk')
                    <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            @endif
        </div> --}}
        <div class="grid gap-2">
            <label class="block text-lg font-medium text-gray-900 dark:text-white" for="spukt">
                Slip Pembayaran Uang Kuliah Tunggal
            </label>
            @if (!$readonly)
                <p class="text-sm text-gray-600 dark:text-gray-400" id="spukt_help">
                    Slip pembayran terakhir. <br>
                    File dalam bentuk jpg/jpeg/png, max 2MB.
                </p>
                <div
                    class="relative flex items-center w-min text-sm text-gray-900 border-none cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <button data-file="spukt"
                        class="py-2.5 px-6 {{ $data['spukt'] ? 'bg-green-500 hover:bg-green-600' : 'bg-gray-800 hover:bg-gray-700' }} text-white font-medium rounded-l-lg"
                        type="button">Browse</button>
                    <input class="flex-grow border border-gray-300 rounded-lg rounded-l-none" type="text"
                        value="{{ preg_replace('/.*\/.*\//i', '', $data['spukt']) }}" readonly>
                    <input class="p-2.5 hidden" aria-describedby="spukt_help" id="spukt" name="spukt" type="file">
                </div>
                @error('spukt')
                    <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            @else
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ preg_replace('/.*\/.*\//i', '', $data['spukt']) }}
                </p>
            @endif
        </div>
        <div class="grid place-items-center">
            @if (!$readonly)
                <button data-modal-target="dialog-submit" data-modal-toggle="dialog-submit" type='button'
                    class="w-full sm:w-1/2 lg:w-1/4 text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Simpan
                </button>
            @endif
        </div>
        @env('local')
        <div>
            @foreach ($errors->all() as $item)
                <div>{{ $item }}</div>
            @endforeach
        </div>
        @endenv
    </form>
    <div id="dialog-submit" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="dialog-submit">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        Apakah anda yakin ingin menyimpan?
                    </h3>
                    <button data-modal-hide="dialog-submit" type="submit" form="biodata"
                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Ya
                    </button>
                    <button data-modal-hide="dialog-submit" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
