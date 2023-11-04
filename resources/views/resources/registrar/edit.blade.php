@extends($layout, ['content_card' => false])

@section('title', 'Edit Registrar')
@section('head')
    @vite('resources/js/admin/registrar/edit.js')
    <script>
        var faculties = @json($faculties)
    </script>
@endsection

@section('content')
    <div class="grid gap-4">

        <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.show') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Admin
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('resources.registrar.index') }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                            Registrar
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">
                            Edit
                        </span>
                    </div>
                </li>
            </ol>
        </nav>

        <form
            class="grid gap-4 px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
            action="{{ route('resources.registrar.update', ['registrar' => $data]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="grid sm:grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    <label for="quota_id" class="text-sm font-medium text-gray-900 dark:text-white">
                        Quota
                    </label>
                    <input type="text" list="quota_id_list" id="quota_id" name="quota_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Quota" value="{{ $data['quota_id'] ?? old('quota_id') }}">
                    <datalist id="quota_id_list">
                        @foreach ($quota as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </datalist>
                    @error('quota_id')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="student_id" class="text-sm font-medium text-gray-900 dark:text-white">
                        Student
                    </label>
                    <input type="text" list="student_id_list" id="student_id" name="student_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Student" value="{{ $data['student_id'] ?? old('student_id') }}">
                    <datalist id="student_id_list">
                        @foreach ($student as $item)
                            <option value="{{ $item->id }}">
                                <div>{{ $item->name }}</div>
                                <div>{{ $item->nim }}</div>
                            </option>
                        @endforeach
                    </datalist>
                    @error('student_id')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="name" class="text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" id="name" name="name" value="{{ $data['name'] ?? old('name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your Name">
                    @error('name')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="nim" class="text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                    <input type="text" id="nim" name="nim" value="{{ $data['nim'] ?? old('nim') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your NIM">
                    @error('nim')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="nik" class="text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                    <input type="text" id="nik" name="nik" value="{{ $data['nik'] ?? old('nik') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your NIK">
                    @error('nik')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="pob" class="text-sm font-medium text-gray-900 dark:text-white">Place of
                        Birth</label>
                    <input type="text" id="pob" name="pob" value="{{ $data['pob'] ?? old('pob') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your Place of Birth">
                    @error('pob')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="dob" class="text-sm font-medium text-gray-900 dark:text-white">Date of
                        Birth</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input datepicker type="text" id="dob" name="dob"
                            value="{{ $data['dob'] ?? old('dob') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your Date of Birth">
                    </div>
                    @error('dob')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="faculty" class="text-sm font-medium text-gray-900 dark:text-white">Faculty</label>
                    <select id="faculty" name="faculty"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a Faculty</option>
                        @foreach ($faculties as $faculty)
                            <option @selected($data->faculty == $faculty->name) value="{{ $faculty->name }}">{{ $faculty->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('faculty')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="study_program" class="text-sm font-medium text-gray-900 dark:text-white">
                        Study Program
                    </label>
                    <select id="study_program" name="study_program"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a Study Program</option>
                        @if ($data->study_program)
                            <option selected value="{{ $data->study_program }}">{{ $data->study_program }}</option>
                        @endif
                    </select>
                    @error('study_program')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="ipk" class="text-sm font-medium text-gray-900 dark:text-white">IPK</label>
                    <input type="number" id="ipk" name="ipk" step=".1" max="4" min="0"
                        value="{{ $data['ipk'] ?? old('ipk') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your IPK">
                    @error('ipk')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex gap-2">
                    <div class="flex flex-col gap-2 flex-grow">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="photo">
                            Photo
                        </label>
                        <p class="text-sm text-gray-500 dark:text-gray-300" id="photo_help">
                            SVG, PNG, JPG or GIF (Size 2MB).
                        </p>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="photo" type="file" name="photo">
                        @error('photo')
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div
                        class="grid place-content-center h-full aspect-square bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                        @isset($data['photo'])
                            <button type="button" data-modal-toggle="photo_preview_modal"
                                class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                                <img id="photo_preview" class="w-[9rem] aspect-square object-cover object-center"
                                    src="{{ $data['photo_url'] }}" alt="">
                            </button>
                            <div id="photo_preview_modal" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 w-full h-modal">
                                <div class="relative md:w-[50vw] md:h-[80vh]">
                                    <div class="w-full h-full p-6 bg-white dark:bg-gray-700 rounded-lg shadow">
                                        <img id="photo_img_preview_modal" class="m-auto max-h-full"
                                            src="{{ $data['photo_url'] }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @else
                            <svg id="photo_preview" class="w-full aspect-square text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        @endisset
                    </div>
                </div>
                <div class="flex gap-2">
                    <div class="flex flex-col gap-2 flex-grow">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="munaqasyah">
                            Munaqasyah
                        </label>
                        <p class="text-sm text-gray-500 dark:text-gray-300" id="munaqasyah_help">
                            SVG, PNG, JPG or GIF (Size 2MB).
                        </p>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="munaqasyah" type="file" name="munaqasyah">
                        @error('munaqasyah')
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid place-content-center h-full aspect-square">
                        @isset($data['munaqasyah'])
                            <button type="button" data-modal-toggle="munaqasyah_preview_modal"
                                class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                                <img id="munaqasyah_preview" class="w-[9rem] aspect-square object-cover object-center"
                                    src="{{ $data['munaqasyah_url'] }}" alt="">
                            </button>
                            <div id="munaqasyah_preview_modal" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 w-full h-modal">
                                <div class="relative md:w-[50vw] md:h-[80vh]">
                                    <div class="w-full h-full p-6 bg-white dark:bg-gray-700 rounded-lg shadow">
                                        <img id="munaqasyah_img_preview_modal" class="m-auto max-h-full"
                                            src="{{ $data['munaqasyah_url'] }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                                <svg id="photo_preview" class="w-full aspect-square text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd">
                                    </path>
                                </svg>
                            </div>
                        @endisset
                    </div>
                </div>
                <div class="flex gap-2">
                    <div class="flex flex-col gap-2 flex-grow">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="school_certificate">
                            Ijazah SMA/SMK/MA
                        </label>
                        <p class="text-sm text-gray-500 dark:text-gray-300" id="school_certificate_help">
                            SVG, PNG, JPG or GIF (Size 2MB).
                        </p>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="school_certificate" type="file" name="school_certificate">
                        @error('school_certificate')
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div
                        class="grid place-content-center h-full aspect-square bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                        @isset($data['school_certificate'])
                            <button type="button" data-modal-toggle="school_certificate_preview_modal"
                                class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                                <img id="school_certificate_preview" class="w-[9rem] aspect-square object-cover object-center"
                                    src="{{ $data['school_certificate_url'] }}" alt="">
                            </button>
                            <div id="school_certificate_preview_modal" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 w-full h-modal">
                                <div class="relative md:w-[50vw] md:h-[80vh]">
                                    <div class="w-full h-full p-6 bg-white dark:bg-gray-700 rounded-lg shadow">
                                        <img id="school_certificate_img_preview_modal" class="m-auto max-h-full"
                                            src="{{ $data['school_certificate_url'] }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @else
                            <svg id="photo_preview" class="w-full aspect-square text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        @endisset
                    </div>
                </div>
                <div class="flex gap-2">
                    <div class="flex flex-col gap-2 flex-grow">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="ktp">
                            Kartu Tanda Pengenal (KTP)
                        </label>
                        <p class="text-sm text-gray-500 dark:text-gray-300" id="ktp_help">
                            SVG, PNG, JPG or GIF (Size 2MB).
                        </p>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="ktp" type="file" name="ktp">
                        @error('ktp')
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div
                        class="grid place-content-center h-full aspect-square bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                        @isset($data['ktp'])
                            <button type="button" data-modal-toggle="ktp_preview_modal"
                                class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                                <img id="ktp_preview" class="w-[9rem] aspect-square object-cover object-center"
                                    src="{{ $data['ktp_url'] }}" alt="">
                            </button>
                            <div id="ktp_preview_modal" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 w-full h-modal">
                                <div class="relative md:w-[50vw] md:h-[80vh]">
                                    <div class="w-full h-full p-6 bg-white dark:bg-gray-700 rounded-lg shadow">
                                        <img id="ktp_img_preview_modal" class="m-auto max-h-full"
                                            src="{{ $data['ktp_url'] }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @else
                            <svg id="photo_preview" class="w-full aspect-square text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        @endisset
                    </div>
                </div>
                <div class="flex gap-2">
                    <div class="flex flex-col gap-2 flex-grow">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="kk">
                            Kartu Tanda Pengenal (KTP)
                        </label>
                        <p class="text-sm text-gray-500 dark:text-gray-300" id="kk_help">
                            SVG, PNG, JPG or GIF (Size 2MB).
                        </p>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="kk" type="file" name="kk">
                        @error('kk')
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div
                        class="grid place-content-center h-full aspect-square bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                        @isset($data['kk'])
                            <button type="button" data-modal-toggle="kk_preview_modal"
                                class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                                <img id="kk_preview" class="w-[9rem] aspect-square object-cover object-center"
                                    src="{{ $data['kk_url'] }}" alt="">
                            </button>
                            <div id="kk_preview_modal" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 w-full h-modal">
                                <div class="relative md:w-[50vw] md:h-[80vh]">
                                    <div class="w-full h-full p-6 bg-white dark:bg-gray-700 rounded-lg shadow">
                                        <img id="kk_img_preview_modal" class="m-auto max-h-full" src="{{ $data['kk_url'] }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        @else
                            <svg id="photo_preview" class="w-full aspect-square text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        @endisset
                    </div>
                </div>
                <div class="flex gap-2">
                    <div class="flex flex-col gap-2 flex-grow">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="spukt">
                            Slip Pembayaran Uang Kuliah Tunggal
                        </label>
                        <p class="text-sm text-gray-500 dark:text-gray-300" id="spukt_help">
                            SVG, PNG, JPG or GIF (Size 2MB).
                        </p>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="spukt" type="file" name="spukt">
                        @error('spukt')
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div
                        class="grid place-content-center h-full aspect-square bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                        @isset($data['spukt'])
                            <button type="button" data-modal-toggle="spukt_preview_modal"
                                class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                                <img id="spukt_preview" class="w-[9rem] aspect-square object-cover object-center"
                                    src="{{ $data['spukt_url'] }}" alt="">
                            </button>
                            <div id="spukt_preview_modal" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 w-full h-modal">
                                <div class="relative md:w-[50vw] md:h-[80vh]">
                                    <div class="w-full h-full p-6 bg-white dark:bg-gray-700 rounded-lg shadow">
                                        <img id="spukt_img_preview_modal" class="m-auto max-h-full"
                                            src="{{ $data['spukt_url'] }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @else
                            <svg id="photo_preview" class="w-full aspect-square text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        @endisset
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="status" class="text-sm font-medium text-gray-900 dark:text-white">
                        Status
                    </label>
                    <select id="status" name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($data::list_status() as $key => $value)
                            <option value="{{ $key }}" @selected($key == $data->status) class="capitalize">
                                {{ $value }}</option>
                        @endforeach
                    </select>
                    @error('status')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white capitalize">
                        {{ __('message') }}
                    </label>
                    <textarea id="comment" rows="4" name="comment"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your message...">{{ $data->comment }}</textarea>
                    @error('comment')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex gap-2 place-content-center">
                <button
                    class="w-full sm:w-1/2 lg:w-1/4 capitalize text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    {{ __('update') }}
                </button>
                <button id="reset_btn" type="reset"
                    class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                        </path>
                    </svg>
                </button>
            </div>
            @env('local')
            @empty($errors->all())
            @else
                <div>
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endempty
            @endenv
        </form>

    </div>
@endsection
