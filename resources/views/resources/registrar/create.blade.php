@extends($layout, ['content_card' => false])

@section('title', 'Create Registrar')
@section('head')
    @vite('resources/js/admin/registrar/create.js')
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
                            Create
                        </span>
                    </div>
                </li>
            </ol>
        </nav>

        <form
            class="grid gap-4 px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
            action="{{ route('resources.registrar.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid sm:grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    <label for="quota_id" class="text-sm font-medium text-gray-900 dark:text-white">
                        Quota
                    </label>
                    <input type="text" list="quota_id_list" id="quota_id" name="quota_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Quota" value="{{ old('quota_id') }}">
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
                        placeholder="Student" value="{{ old('student_id') }}">
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
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your Name">
                    @error('name')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="nim" class="text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                    <input type="text" id="nim" name="nim" value="{{ old('nim') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your NIM">
                    @error('nim')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="nik" class="text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                    <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your NIK">
                    @error('nik')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="pob" class="text-sm font-medium text-gray-900 dark:text-white">Place of
                        Birth</label>
                    <input type="text" id="pob" name="pob" value="{{ old('pob') }}"
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
                        <input datepicker type="text" id="dob" name="dob" value="{{ old('dob') }}"
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
                            <option value="{{ $faculty->name }}">{{ $faculty->name }}</option>
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
                    </select>
                    @error('study_program')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="ipk" class="text-sm font-medium text-gray-900 dark:text-white">IPK</label>
                    <input type="number" id="ipk" name="ipk" step=".1" max="4" min="0"
                        value="{{ old('ipk') }}"
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
                            <img id="photo_preview" class="w-[9rem] aspect-square object-cover object-center text-gray-400"
                                src="{{ $data['photo_url'] }}" alt="">
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
                    <div
                        class="grid place-content-center h-full aspect-square bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                        @isset($data['munaqasyah'])
                            <img id="photo_preview" class="w-[9rem] aspect-square object-cover object-center text-gray-400"
                                src="{{ $data['munaqasyah_url'] }}" alt="">
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
                            <img id="photo_preview" class="w-[9rem] aspect-square object-cover object-center text-gray-400"
                                src="{{ $data['school_certificate_url'] }}" alt="">
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
                            <img id="photo_preview" class="w-[9rem] aspect-square object-cover object-center text-gray-400"
                                src="{{ $data['ktp_url'] }}" alt="">
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
                            <img id="photo_preview" class="w-[9rem] aspect-square object-cover object-center text-gray-400"
                                src="{{ $data['kk_url'] }}" alt="">
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
                            <img id="photo_preview" class="w-[9rem] aspect-square object-cover object-center text-gray-400"
                                src="{{ $data['spukt_url'] }}" alt="">
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
            </div>
            <div class="grid place-items-center">
                <button
                    class="w-full sm:w-1/2 lg:w-1/4 capitalize text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    {{ __('create') }}
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
