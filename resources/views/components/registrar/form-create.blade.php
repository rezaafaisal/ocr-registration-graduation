@section('head')
    @vite('resources/js/admin/registrar/create.js')
    <script>
        var faculties = @json($faculties)
    </script>
@endsection
<form
    class="grid gap-4 px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
    action="{{ route('resources.registrar.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="index" value="{{ $index }}">
    <div class="grid sm:grid-cols-2 gap-4">
        <div class="flex flex-col gap-2">
            <label for="quota_id" class="text-sm font-medium text-gray-900 dark:text-white">
                Quota
            </label>
            <input type="text" list="quota_id_list" id="quota_id" name="quota_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Quota" value="{{ old('quota_id') }}">
            <datalist id="quota_id_list">
                @foreach ($quotas as $quota)
                    <option value="{{ $quota->id }}">{{ $quota->name }}</option>
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
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">
                        {{ $student->nim }}
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
                    placeholder="Your Date of Birth" autocomplete="off">
            </div>
            @error('dob')
                <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col gap-2">
            <label for="doe" class="text-sm font-medium text-gray-900 dark:text-white">
                Date of Entry
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
                <input datepicker type="text" id="doe" name="doe" value="{{ old('doe') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Your Date of Entry" autocomplete="off">
            </div>
            @error('doe')
                <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col gap-2">
            <label for="dop" class="text-sm font-medium text-gray-900 dark:text-white">
                Date of Pass
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
                <input datepicker type="text" id="dop" name="dop" value="{{ old('dop') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Your Date of Pass" autocomplete="off">
            </div>
            @error('dop')
                <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col gap-2">
            <label for="faculty" class="text-sm font-medium text-gray-900 dark:text-white">Faculty</label>
            <select id="faculty" name="faculty"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected>Choose a Faculty</option>
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
                <option value="" selected>Choose a Study Program</option>
            </select>
            @error('study_program')
                <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col gap-2">
            <label for="ipk" class="text-sm font-medium text-gray-900 dark:text-white">IPK</label>
            <input type="number" id="ipk" name="ipk" step=".01" max="4" min="0"
                value="{{ old('ipk') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Your IPK">
            @error('ipk')
                <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col gap-2">
            <label for="gender" class="text-sm font-medium text-gray-900 dark:text-white">Gender</label>
            <select id="gender" name="gender"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected>Choose a Gender</option>
                @foreach (['male', 'female'] as $gender)
                    <option value="{{ $gender }}">{{ $gender }}</option>
                @endforeach
            </select>
            @error('gender')
                <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div></div>
        <div class="flex items-end gap-2">
            <div
                class="flex-[30%_0_0] aspect-square bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" id="photo_placeholder"
                    class="p-4 aspect-square text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <img id="photo_preview" class="hidden object-cover object-center" src="" alt="photo">
            </div>
            <div class="flex flex-col gap-2 flex-[70%_0_0]">
                <label for="photo" class="block text-sm font-medium text-gray-900 dark:text-white capitalize">
                    {{ __('photo') }}
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
        </div>
        <div class="flex items-end gap-2">
            <div
                class="flex-[30%_0_0] aspect-square bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" id="munaqasyah_placeholder"
                    class="p-4 aspect-square text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <img id="munaqasyah_preview" class="hidden object-cover object-center" src=""
                    alt="munaqasyah">
            </div>
            <div class="flex flex-col gap-2 flex-[70%_0_0]">
                <label for="munaqasyah" class="block text-sm font-medium text-gray-900 dark:text-white capitalize">
                    {{ 'judiciary news' }}
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
        </div>
        <div class="flex items-end gap-2">
            <div
                class="flex-[30%_0_0] aspect-square bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" id="school_certificate_placeholder"
                    class="p-4 aspect-square text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <img id="school_certificate_preview" class="hidden object-cover object-center" src=""
                    alt="school_certificate">
            </div>
            <div class="flex flex-col gap-2 flex-[70%_0_0]">
                <label for="school_certificate" class="block text-sm font-medium text-gray-900 dark:text-white capitalize">
                    {{ __('school certificate') }}
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
        </div>
        <div class="flex items-end gap-2">
            <div
                class="flex-[30%_0_0] aspect-square bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" id="ktp_placeholder"
                    class="p-4 aspect-square text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <img id="ktp_preview" class="hidden object-cover object-center" src=""
                    alt="ktp">
            </div>
            <div class="flex flex-col gap-2 flex-[70%_0_0]">
                <label for="ktp" class="block text-sm font-medium text-gray-900 dark:text-white capitalize">
                    {{ __('KTP') }}
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
        </div>
        {{-- <div class="flex items-end gap-2">
            <div
                class="flex-[30%_0_0] aspect-square bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" id="kk_placeholder"
                    class="p-4 aspect-square text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <img id="kk_preview" class="hidden object-cover object-center" src=""
                    alt="kk">
            </div>
            <div class="flex flex-col gap-2 flex-[70%_0_0]">
                <label for="kk" class="block text-sm font-medium text-gray-900 dark:text-white capitalize">
                    {{ __('KK') }}
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
        </div> --}}
        <div class="flex items-end gap-2">
            <div
                class="flex-[30%_0_0] aspect-square bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" id="spukt_placeholder"
                    class="p-4 aspect-square text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <img id="spukt_preview" class="hidden object-cover object-center" src=""
                    alt="spukt">
            </div>
            <div class="flex flex-col gap-2 flex-[70%_0_0]">
                <label for="spukt" class="block text-sm font-medium text-gray-900 dark:text-white capitalize">
                    {{ __('SPUKT') }}
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
        </div>
        <div></div>
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
