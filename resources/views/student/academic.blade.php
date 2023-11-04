@extends('layouts.student.panel', ['content_card' => true])

@section('title', 'Biodata')
@section('head')
    @vite('resources/js/student/biodata.js')
@endsection

@inject('carbon', 'Illuminate\Support\Carbon')
@section('content')
    {{-- @dd($data) --}}
    <form class="grid gap-4" action="{{ route('student.data.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex items-end gap-2">
            <div class="grid place-content-center w-[10rem] aspect-square bg-gray-100 rounded-lg dark:bg-gray-600">
                @if ($data['photo'])
                    <img id="photo_preview" class="w-[9rem] aspect-square object-cover object-center text-gray-400"
                        src="{{ Storage::url($data['photo']) }}" alt="">
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
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="photo">Upload
                    photo</label>
                <input aria-describedby="photo_help" id="photo" name="photo" type="file"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="photo_help">SVG, PNG, JPG (BG. Red, MAX.
                    2MB).
                </p>
                @error('photo')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="grid sm:grid-cols-2 gap-4">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" id="name" name="name" value="{{ $data['name'] ?? old('name') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Your Name">
            </div>
            <div>
                <label for="nim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                <input type="text" id="nim" name="nim" value="{{ $data['nim'] ?? old('nim') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Your NIM">
            </div>
            <div>
                <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                <input type="text" id="nik" name="nik" value="{{ $data['nik'] ?? old('nik') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Your NIK">
            </div>
            <div>
                <label for="pob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Place of
                    Birth</label>
                <input type="text" id="pob" name="pob" value="{{ $data['pob'] ?? old('pob') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Your Place of Birth">
            </div>
            <div>
                <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of
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
                        value="{{ $carbon::parse($data['dob'])->format('d/m/Y') ?? old('dob') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your Date of Birth">
                </div>
            </div>
            {{-- <div>
                <input type="text" id="dob" name="dob"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Your Date of Birth">
            </div> --}}
            <div>
                <label for="faculty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Faculty</label>
                <select id="faculty" name="faculty"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a Faculty</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="FR">France</option>
                    <option value="DE">Germany</option>
                </select>
            </div>
            <div>
                <label for="study_program" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Study Program
                </label>
                <select id="study_program" name="study_program"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a Study Program</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="FR">France</option>
                    <option value="DE">Germany</option>
                </select>
            </div>
            <div>
                <label for="ipk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">IPK</label>
                <input type="number" id="ipk" name="ipk" step=".1" max="4" min="0"
                    value="{{ $data['ipk'] ?? old('ipk') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Your IPK">
            </div>
        </div>
        <div class="grid place-items-center">
            <button
                class="w-full sm:w-1/2 lg:w-1/4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
        </div>
        @env('local')
        <div>
            @foreach ($errors->all() as $item)
                <div>{{ $item }}</div>
            @endforeach
        </div>
        @endenv
    </form>
@endsection
