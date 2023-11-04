@props([
])
@section('head')
@vite('resources/js/admin/registrar/view.js')
@endsection
<div
    class="grid gap-4 px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700">
    @csrf
    <div class="grid grid-cols-2 gap-4">
        <div class="grid gap-4">
            <div class="flex flex-col gap-2">
                <label class="block text-base font-semibold text-gray-900 dark:text-white capitalize" for="photo">
                    {{ __('photo') }}
                </label>
                <output id="photo_url" name="photo_url" class="w-20 h-20 text-base text-gray-700 dark:text-gray-100">
                    <button type="button" id="photo_btn"
                        class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                        <img id="photo_img" class="w-[9rem] aspect-square object-cover object-center"
                            src="{{ $registrar->photo_url }}" alt="">
                    </button>
                </output>
            </div>
            <div class="flex flex-col gap-2">
                <label for="name"
                    class="text-base font-semibold text-gray-900 dark:text-white capitalize">{{ __('name') }}</label>
                <output id="name" name="name"
                    class="text-base text-gray-700 dark:text-gray-100">{{ $registrar->name }}</output>
            </div>
            <div class="flex flex-col gap-2">
                <label for="nim" class="text-base font-semibold text-gray-900 dark:text-white">NIM</label>
                <output id="nim" name="nim"
                    class="text-base text-gray-700 dark:text-gray-100">{{ $registrar->nim }}</output>
            </div>
            <div class="flex flex-col gap-2">
                <label for="nik" class="text-base font-semibold text-gray-900 dark:text-white">NIK</label>
                <output id="nik" name="nik"
                    class="text-base text-gray-700 dark:text-gray-100">{{ $registrar->nik }}</output>
            </div>
            <div class="flex flex-col gap-2">
                <label for="pob" class="text-base font-semibold text-gray-900 dark:text-white capitalize">
                    {{ __('place of birth') }}
                </label>
                <output id="pob" name="pob"
                    class="text-base text-gray-700 dark:text-gray-100">{{ $registrar->pob }}</output>
            </div>
            <div class="flex flex-col gap-2">
                <label for="dob" class="text-base font-semibold text-gray-900 dark:text-white capitalize">
                    {{ __('date of birth') }}
                </label>
                <output id="dob" name="dob"
                    class="text-base text-gray-700 dark:text-gray-100">{{ $registrar->dob }}</output>
            </div>
            <div class="flex flex-col gap-2">
                <label for="doe" class="text-base font-semibold text-gray-900 dark:text-white capitalize">
                    {{ __('date of entry') }}
                </label>
                <output id="doe" name="doe"
                    class="text-base text-gray-700 dark:text-gray-100">{{ $registrar->doe }}</output>
            </div>
            <div class="flex flex-col gap-2">
                <label for="dop" class="text-base font-semibold text-gray-900 dark:text-white capitalize">
                    {{ __('date of pass') }}
                </label>
                <output id="dop" name="dop"
                    class="text-base text-gray-700 dark:text-gray-100">{{ $registrar->dop }}</output>
            </div>
            <div class="flex flex-col gap-2">
                <label for="faculty"
                    class="text-base font-semibold text-gray-900 dark:text-white capitalize">{{ __('faculty') }}</label>
                <output id="faculty" name="faculty"
                    class="text-base text-gray-700 dark:text-gray-100">{{ $registrar->faculty }}</output>
            </div>
            <div class="flex flex-col gap-2">
                <label for="study_program" class="text-base font-semibold text-gray-900 dark:text-white capitalize">
                    {{ __('study program') }}
                </label>
                <output id="study_program" name="study_program"
                    class="text-base text-gray-700 dark:text-gray-100">{{ $registrar->study_program }}</output>
            </div>
            <div class="flex flex-col gap-2">
                <label for="ipk" class="text-base font-semibold text-gray-900 dark:text-white">IPK</label>
                <output id="ipk" name="ipk"
                    class="text-base text-gray-700 dark:text-gray-100">{{ $registrar->ipk }}</output>
            </div>
            <div class="flex flex-col gap-2">
                <label for="gender"
                    class="text-base font-semibold text-gray-900 dark:text-white capitalize">{{ __('gender') }}</label>
                <output id="gender" name="gender"
                    class="text-base text-gray-700 dark:text-gray-100">{{ __($registrar->gender) }}</output>
            </div>
            <div class="flex flex-col gap-2">
                <label class="block text-base font-semibold text-gray-900 dark:text-white" for="munaqasyah">
                    Berita Acara Yudisium
                </label>
                <output id="munaqasyah_url" name="munaqasyah_url"
                    class="w-20 h-20 text-base text-gray-700 dark:text-gray-100">
                    <button type="button" id="munaqasyah_btn"
                        class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                        <img id="munaqasyah_img" class="w-[9rem] aspect-square object-cover object-center"
                            src="{{ $registrar->munaqasyah_url }}" alt="">
                    </button>
                </output>
            </div>
            <div class="flex flex-col gap-2">
                <label class="block text-base font-semibold text-gray-900 dark:text-white" for="school_certificate">
                    Ijazah SMA/SMK/MA
                </label>
                <output id="school_certificate_url" name="school_certificate_url"
                    class="w-20 h-20 text-base text-gray-700 dark:text-gray-100">
                    <button type="button" id="school_certificate_btn"
                        class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                        <img id="school_certificate_img" class="w-[9rem] aspect-square object-cover object-center"
                            src="{{ $registrar->school_certificate_url }}" alt="">
                    </button>
                </output>
            </div>
            <div class="flex flex-col gap-2">
                <label class="block text-base font-semibold text-gray-900 dark:text-white" for="kk">
                    Kartu Tanda Pengenal (KTP)
                </label>
                <output id="kk_url" name="kk_url" class="w-20 h-20 text-base text-gray-700 dark:text-gray-100">
                    <button type="button" id="kk_btn"
                        class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                        <img id="kk_img" class="w-[9rem] aspect-square object-cover object-center"
                            src="{{ $registrar->kk_url }}" alt="">
                    </button>
                </output>
            </div>
            <div class="flex flex-col gap-2">
                <label class="block text-base font-semibold text-gray-900 dark:text-white" for="ktp">
                    Kartu Keluarga (KK)
                </label>
                <output id="ktp_url" name="ktp_url" class="w-20 h-20 text-base text-gray-700 dark:text-gray-100">
                    <button type="button" id="ktp_btn"
                        class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                        <img id="ktp_img" class="w-[9rem] aspect-square object-cover object-center"
                            src="{{ $registrar->ktp_url }}" alt="">
                    </button>
                </output>
            </div>
            <div class="flex flex-col gap-2">
                <label class="block text-base font-semibold text-gray-900 dark:text-white" for="spukt">
                    Slip Pembayaran Uang Kuliah Tunggal
                </label>
                <output id="spukt_url" name="spukt_url" class="w-20 h-20 text-base text-gray-700 dark:text-gray-100">
                    <button type="button" id="spukt_btn"
                        class="text-sm p-1 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-blue-500 dark:border-gray-600">
                        <img id="spukt_img" class="w-[9rem] aspect-square object-cover object-center"
                            src="{{ $registrar->spukt_url }}" alt="">
                    </button>
                </output>
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
                <img id="view_img" class="m-auto" src="{{ $registrar->photo_url }}" alt="">
            </div>
        </div>
    </div>
</div>
