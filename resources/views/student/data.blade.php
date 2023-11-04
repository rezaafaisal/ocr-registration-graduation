@extends('layouts.student.panel', ['content_card' => true])

@section('title', 'Biodata')
@section('head')
    @vite('resources/js/student/biodata.js')
    <script>
        var faculties = @json($faculties)
    </script>
@endsection

@inject('carbon', 'Illuminate\Support\Carbon')
@php
    $readonly = $data['status'] == 'validate' || $data['status'] == 'revalidate' || $data['status'] == 'validated';
@endphp
@section('content')
    <form id="biodata" class="grid gap-4" action="{{ route('student.data.store') }}" method="POST"
        enctype="multipart/form-data">
        @if (!$readonly)
            @csrf
        @endif
        <div class="flex items-end gap-2">
            <div class="grid place-content-center w-[10rem] aspect-square bg-gray-100 rounded-lg dark:bg-gray-600">
                @if ($data['photo'])
                    <img id="photo_preview" class="w-[9rem] aspect-square object-cover object-center text-gray-400"
                        src="{{ asset($data['photo']) }}" alt="">
                @else
                    <svg id="photo_preview" class="w-[9rem] aspect-square text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd">
                        </path>
                    </svg>
                @endif
            </div>
            <div class="">
                @if (!$readonly)
                    <label class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="photo">
                        {{ __('photo') }}
                    </label>
                    <input aria-describedby="photo_help" id="photo" name="photo" type="file"
                        class="block w-full text-sm text-gray-900 dark:text-white border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="photo_help">
                        SVG, PNG, JPG (BG. Red, MAX. 2MB).
                    </p>
                @endif
                @error('photo')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="grid gap-4 sm:w-1/2">
            <div>
                <label for="name" class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('name') }}
                </label>
                <input type="text" id="name" name="name" value="{{ $data['name'] ?? old('name') }}"
                    {{ $readonly ? 'readonly' : '' }}
                    class="{{ $readonly ? 'text-gray-800 dark:text-gray-400' : 'text-gray-900 dark:text-white' }} bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="">
            </div>
            <div>
                <label for="nim"
                    class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                <input type="text" id="nim" name="nim" value="{{ $user->nim }}" readonly
                    class="bg-gray-50 border border-gray-300 text-gray-600 dark:text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="">
                @error('nim')
                    <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="nik"
                    class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                <input type="text" id="nik" name="nik" value="{{ $data['nik'] ?? old('nik') }}"
                    {{ $readonly ? 'readonly' : '' }}
                    class="{{ $readonly ? 'text-gray-800 dark:text-gray-400' : 'text-gray-900 dark:text-white' }} bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="">
                @error('nik')
                    <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="pob" class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('place of birth') }}
                </label>
                <input type="text" id="pob" name="pob" value="{{ $data['pob'] ?? old('pob') }}"
                    {{ $readonly ? 'readonly' : '' }}
                    class="{{ $readonly ? 'text-gray-800 dark:text-gray-400' : 'text-gray-900 dark:text-white' }} bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="">
            </div>
            <div>
                <label for="dob" class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('date of birth') }}
                </label>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input datepicker type="text" id="dob" name="dob" {{ $readonly ? 'readonly' : '' }}
                        value="{{ (isset($data['dob']) ? $carbon::parse($data['dob'])->format('d/m/Y') : '') ?? old('dob') }}"
                        class="{{ $readonly ? 'text-gray-800 dark:text-gray-400' : 'text-gray-900 dark:text-white' }} bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" autocomplete="off">
                </div>
            </div>
            {{-- <div>
                <label for="doe" class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('date of entry') }}
                </label>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input datepicker type="text" id="doe" name="doe" {{ $readonly ? 'readonly' : '' }}
                        value="{{ (isset($data['doe']) ? $carbon::parse($data['doe'])->format('d/m/Y') : '') ?? old('doe') }}"
                        class="{{ $readonly ? 'text-gray-800 dark:text-gray-400' : 'text-gray-900 dark:text-white' }} bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" autocomplete="off">
                </div>
            </div> --}}
            <div>
                <label for="yoe" class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('year of entry') }}
                </label>
                <select id="yoe" name="yoe" {{ $readonly ? 'disabled' : '' }}
                    class="{{ $readonly ? 'text-gray-800 dark:text-gray-400' : 'text-gray-900 dark:text-white' }} bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>Pilih Tahun Masuk</option>
                    @foreach (range(date('Y') - 8, date('Y')) as $yoe)
                        <option @selected($data->yoe == $yoe) value="{{ $yoe }}">
                            {{ __($yoe) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="dop" class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('date of pass') }}
                </label>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input datepicker type="text" id="dop" name="dop" {{ $readonly ? 'readonly' : '' }}
                        value="{{ (isset($data['dop']) ? $carbon::parse($data['dop'])->format('d/m/Y') : '') ?? old('dop') }}"
                        class="{{ $readonly ? 'text-gray-800 dark:text-gray-400' : 'text-gray-900 dark:text-white' }} bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" autocomplete="off">
                </div>
            </div>
            <div>
                <label for="gender" class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('gender') }}
                </label>
                <select id="gender" name="gender" {{ $readonly ? 'disabled' : '' }}
                    class="{{ $readonly ? 'text-gray-800 dark:text-gray-400' : 'text-gray-900 dark:text-white' }} bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>Pilih Jenis Kelamin</option>
                    @foreach (['male', 'female'] as $gender)
                        <option @selected($data->gender == $gender) value="{{ $gender }}">
                            {{ __($gender) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="faculty" class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('faculty') }}
                </label>
                <select id="faculty" name="faculty" {{ $readonly ? 'disabled' : '' }}
                    class="{{ $readonly ? 'text-gray-800 dark:text-gray-400' : 'text-gray-900 dark:text-white' }} bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>Pilih Fakultas</option>
                    @foreach ($faculties as $faculty)
                        <option @selected($data->faculty == $faculty->name) value="{{ $faculty->name }}">{{ $faculty->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="study_program"
                    class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('study program') }}
                </label>
                <select id="study_program" name="study_program" {{ $readonly ? 'disabled' : '' }}
                    class="{{ $readonly ? 'text-gray-800 dark:text-gray-400' : 'text-gray-900 dark:text-white' }} bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>Pilih Jurusan</option>
                    @if ($data->study_program)
                        <option selected value="{{ $data->study_program }}">{{ $data->study_program }}</option>
                    @endif
                </select>
            </div>
            <div>
                <label for="ipk"
                    class="capitalize block mb-2 text-sm font-medium text-gray-900 dark:text-white">IPK</label>
                <input type="number" id="ipk" name="ipk" step=".01" max="4" min="0"
                    value="{{ $data['ipk'] ?? old('ipk') }}" {{ $readonly ? 'readonly' : '' }}
                    class="bg-gray-50 border border-gray-300 {{ $readonly ? 'text-gray-800 dark:text-gray-400' : 'text-gray-900 dark:text-white' }} text-sm rounded-lg focus-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:dark:focus:border-blue-500"
                    placeholder="">
                @error('ipk')
                    <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="grid place-items-center w-1/2">
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
