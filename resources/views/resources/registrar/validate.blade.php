@extends($layout, ['content_card' => false])

@section('title', __('validate'))
@section('head')
    @vite('resources/js/admin/registrar/validate.js')
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
                            Validate
                        </span>
                    </div>
                </li>
            </ol>
        </nav>

        <form
            class="grid gap-4 px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
            action="{{ route('resources.registrar.perform_validate', ['registrar' => $data]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div class="grid gap-4">
                    <div class="flex flex-col gap-2">
                        <label for="name"
                            class="text-sm font-medium text-gray-900 dark:text-white capitalize">{{ __('name') }}</label>
                        <output id="name" name="name"
                            class="text-base text-gray-700 dark:text-gray-100">{{ $data->name }}</output>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="nim" class="text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                        <output id="nim" name="nim"
                            class="text-base text-gray-700 dark:text-gray-100">{{ $data->nim }}</output>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="nik" class="text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                        <output id="nik" name="nik"
                            class="text-base text-gray-700 dark:text-gray-100">{{ $data->nik }}</output>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="pob" class="text-sm font-medium text-gray-900 dark:text-white capitalize">
                            {{ __('place of birth') }}
                        </label>
                        <output id="pob" name="pob"
                            class="text-base text-gray-700 dark:text-gray-100">{{ $data->pob }}</output>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="dob" class="text-sm font-medium text-gray-900 dark:text-white capitalize">
                            {{ __('date of birth') }}
                        </label>
                        <output id="dob" name="dob"
                            class="text-base text-gray-700 dark:text-gray-100">{{ $data->dob }}</output>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="faculty"
                            class="text-sm font-medium text-gray-900 dark:text-white capitalize">{{ __('faculty') }}</label>
                        <output id="faculty" name="faculty"
                            class="text-base text-gray-700 dark:text-gray-100">{{ $data->faculty }}</output>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="study_program" class="text-sm font-medium text-gray-900 dark:text-white capitalize">
                            {{ __('study program') }}
                        </label>
                        <output id="study_program" name="study_program"
                            class="text-base text-gray-700 dark:text-gray-100">{{ $data->study_program }}</output>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="ipk" class="text-sm font-medium text-gray-900 dark:text-white">IPK</label>
                        <output id="ipk" name="ipk"
                            class="text-base text-gray-700 dark:text-gray-100">{{ $data->ipk }}</output>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white capitalize" for="photo">
                            {{ __('photo') }}
                        </label>
                        <output id="photo_url" name="photo_url"
                            class="w-20 h-20 text-base text-gray-700 dark:text-gray-100">
                            <button type="button" id="photo_btn"
                                class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                                <img id="photo_img" class="w-[9rem] aspect-square object-cover object-center"
                                    src="{{ $data->photo_url }}" alt="">
                            </button>
                        </output>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="munaqasyah">
                            SK Munaqasyah
                        </label>
                        <output id="munaqasyah_url" name="munaqasyah_url"
                            class="w-20 h-20 text-base text-gray-700 dark:text-gray-100">
                            <button type="button" id="munaqasyah_btn"
                                class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                                <img id="munaqasyah_img" class="w-[9rem] aspect-square object-cover object-center"
                                    src="{{ $data->munaqasyah_url }}" alt="">
                            </button>
                        </output>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="school_certificate">
                            Ijazah SMA/SMK/MA
                        </label>
                        <output id="school_certificate_url" name="school_certificate_url"
                            class="w-20 h-20 text-base text-gray-700 dark:text-gray-100">
                            <button type="button" id="school_certificate_btn"
                                class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                                <img id="school_certificate_img" class="w-[9rem] aspect-square object-cover object-center"
                                    src="{{ $data->school_certificate_url }}" alt="">
                            </button>
                        </output>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="kk">
                            Kartu Tanda Pengenal (KTP)
                        </label>
                        <output id="kk_url" name="kk_url"
                            class="w-20 h-20 text-base text-gray-700 dark:text-gray-100">
                            <button type="button" id="kk_btn"
                                class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                                <img id="kk_img" class="w-[9rem] aspect-square object-cover object-center"
                                    src="{{ $data->kk_url }}" alt="">
                            </button>
                        </output>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="ktp">
                            Kartu Keluarga (KK)
                        </label>
                        <output id="ktp_url" name="ktp_url"
                            class="w-20 h-20 text-base text-gray-700 dark:text-gray-100">
                            <button type="button" id="ktp_btn"
                                class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                                <img id="ktp_img" class="w-[9rem] aspect-square object-cover object-center"
                                    src="{{ $data->ktp_url }}" alt="">
                            </button>
                        </output>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="spukt">
                            Slip Pembayaran Uang Kuliah Tunggal
                        </label>
                        <output id="spukt_url" name="spukt_url"
                            class="w-20 h-20 text-base text-gray-700 dark:text-gray-100">
                            <button type="button" id="spukt_btn"
                                class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                                <img id="spukt_img" class="w-[9rem] aspect-square object-cover object-center"
                                    src="{{ $data->spukt_url }}" alt="">
                            </button>
                        </output>
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
                        <label for="comment"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white capitalize">
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
                <div class="w-full">
                    <div id="viewer" class="hidden sticky top-0 w-full p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                        <button type="button" id="view_close"
                            class="absolute top-2 right-2 p-1 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <span class="sr-only">Icon description</span>
                        </button>
                        <img id="view_img" class="m-auto" src="{{ $data->photo_url }}" alt="">
                    </div>
                </div>
            </div>
            <div class="flex gap-2 place-content-center">
                <button
                    class="w-full sm:w-1/2 lg:w-1/4 capitalize text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    {{ __('update') }}
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
