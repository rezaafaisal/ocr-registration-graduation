@extends('layouts.admin.panel', ['content_card' => false])

@section('title', 'Dashboard')

@section('content')
    <div class="grid gap-4">
        <div class="grid grid-cols-3 gap-4">
            @if ($quota)
                <div
                    class="flex gap-2 p-4 bg-[#31C3B1] dark:bg-gray-800 items-center rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="flex-grow">
                        <div class="text-base text-white dark:text-gray-200 font-medium capitalize">
                            Kuota Wisuda
                        </div>
                        <div class="text-4xl text-white dark:text-gray-50 font-semibold">
                            {{ $quota['total'] }}
                        </div>
                    </div>
                    <div class="grid place-items-center p-3 border border-gray-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" class="w-10 h-10 fill-white">
                            <path
                                d="m800 922 28-28-75-75V707h-40v128l87 87Zm-620 14q-24.75 0-42.375-17.625T120 876V276q0-24.75 17.625-42.375T180 216h600q24.75 0 42.375 17.625T840 276v329q-14-8-29.5-13t-30.5-8V276H180v600h309q4 16 9.023 31.172Q503.045 922.345 510 936H180Zm0-107v47-600 308-4 249Zm100-53h211q4-16 9-31t13-29H280v60Zm0-170h344q14-7 27-11.5t29-8.5v-40H280v60Zm0-170h400v-60H280v60Zm452.5 579q-77.5 0-132.5-55.5T545 828q0-78.435 54.99-133.718Q654.98 639 733 639q77 0 132.5 55.282Q921 749.565 921 828q0 76-55.5 131.5t-133 55.5Z" />
                        </svg>
                    </div>
                </div>
                <div
                    class="flex gap-2 p-4 bg-[#3A9FCA] dark:bg-gray-800 items-center rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="flex-grow">
                        <div class="text-base text-white dark:text-gray-200 font-medium capitalize">
                            Total Pendaftar
                        </div>
                        <div class="text-4xl text-white dark:text-gray-50 font-semibold">
                            {{ $quota['remaining'] }}
                        </div>
                    </div>
                    <div class="grid place-items-center p-3 border border-gray-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" class="w-10 h-10 fill-white">
                            <path
                                d="M733 827q27.917 0 47.458-19.559Q800 787.882 800 759.941T780.458 713Q760.917 694 733 694q-27.5 0-46.75 19.353t-19.25 47Q667 788 686.25 807.5T733 827Zm-.214 133Q766 960 795 944.5t47-42.5q-26-14-53-22.5t-56-8.5q-29 0-56 8.5T624 902q18 27 46.786 42.5 28.785 15.5 62 15.5ZM180 936q-24.75 0-42.375-17.625T120 876V276q0-24.75 17.625-42.375T180 216h600q24.75 0 42.375 17.625T840 276v329q-14-8-29.5-13t-30.5-8V276H180v600h309q4 16 9.023 31.172Q503.045 922.345 510 936H180Zm0-107v47-600 308-4 249Zm100-53h211q4-16 9-31t13-29H280v60Zm0-170h344q14-7 27-11.5t29-8.5v-40H280v60Zm0-170h400v-60H280v60Zm452.5 579q-77.5 0-132.5-55.5T545 828q0-78.435 54.99-133.718Q654.98 639 733 639q77 0 132.5 55.282Q921 749.565 921 828q0 76-55.5 131.5t-133 55.5Z" />
                        </svg>
                    </div>
                </div>
                <div
                    class="flex gap-2 p-4 bg-green-500 dark:bg-gray-800 items-center rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="flex-grow">
                        <div class="text-base text-white dark:text-gray-200 font-medium capitalize">
                            Total Wisudawan
                        </div>
                        <div class="text-4xl text-white dark:text-gray-50 font-semibold">
                            {{ $quota['filled'] }}
                        </div>
                    </div>
                    <div class="grid place-items-center p-3 border border-gray-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" class="w-10 h-10 fill-white">
                            <path
                                d="M479 936 189 777V537L40 456l439-240 441 240v317h-60V491l-91 46v240L479 936Zm0-308 315-172-315-169-313 169 313 172Zm0 240 230-127V573L479 696 249 571v170l230 127Zm1-240Zm-1 74Zm0 0Z" />
                        </svg>
                    </div>
                </div>
            @endif
        </div>
        <div class="grid grid-cols-3 gap-4">
            @if ($registrar)
                <div
                    class="flex gap-2 p-4 bg-[#31C3B1] dark:bg-gray-800 items-center rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="flex-grow">
                        <div class="text-base text-white dark:text-gray-200 font-medium capitalize">
                            {{ __('validate') }}
                        </div>
                        <div class="text-4xl text-white dark:text-gray-50 font-semibold">
                            {{ $registrar['validate'] }}
                        </div>
                    </div>
                    <div class="grid place-items-center p-3 border border-gray-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" class="w-10 h-10 fill-white">
                            <path
                                d="M448 762q20 0 40.5-5.5T528 739l110 110 40-40-111-111q11-17 15.5-36.151Q587 642.698 587 623q0-59-40-99t-99-40q-59 0-99 40t-40 99q0 59 40 99t99 40Zm0-60q-34 0-56.5-22.5T369 623q0-34 22.5-56.5T448 544q34 0 56.5 22.5T527 623q0 34-22.5 56.5T448 702ZM220 976q-24 0-42-18t-18-42V236q0-24 18-42t42-18h361l219 219v521q0 24-18 42t-42 18H220Zm331-554V236H220v680h520V422H551ZM220 236v186-186 680-680Z" />
                        </svg>
                    </div>
                </div>
                <div
                    class="flex gap-2 p-4 bg-[#3A9FCA] dark:bg-gray-800 items-center rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="flex-grow">
                        <div class="text-base text-white dark:text-gray-200 font-medium capitalize">
                            {{ __('not yet revision') }}
                        </div>
                        <div class="text-4xl text-white dark:text-gray-50 font-semibold">
                            {{ $registrar['revision'] }}
                        </div>
                    </div>
                    <div class="grid place-items-center p-3 border border-gray-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" class="w-10 h-10 fill-white">
                            <path
                                d="M220 236v186-186 680-11.5V916 236Zm0 740q-24 0-42-18t-18-42V236q0-24 18-42t42-18h361l219 219v227q-14-6-29-9.5t-31-5.5V422H551V236H220v680h316q10 17 22 32t27 28H220Zm416-34-42-42 84-84-84-84 42-42 84 84 84-84 42 42-83 84 83 84-42 42-84-83-84 83Z" />
                        </svg>
                    </div>
                </div>
                <div
                    class="flex gap-2 p-4 bg-green-500 dark:bg-gray-800 items-center rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="flex-grow">
                        <div class="text-base text-white dark:text-gray-200 font-medium capitalize">
                            {{ __('revalidate') }}
                        </div>
                        <div class="text-4xl text-white dark:text-gray-50 font-semibold">
                            {{ $registrar['revalidate'] }}
                        </div>
                    </div>
                    <div class="grid place-items-center p-3 border border-gray-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" class="w-10 h-10 fill-white">
                            <path
                                d="M482 805q78 0 132-54t54-132q0-78-54-132t-132-54q-45 0-82 19t-61 45v-69h-45v152h154v-45h-75q16-23 46.5-37.5T482 483q60 0 98 38t38 98q0 60-38 98.5T482.402 756q-48.561 0-84.981-26Q361 704 347 663h-51q18 65 68 103.5T482 805ZM220 976q-24 0-42-18t-18-42V236q0-24 18-42t42-18h341l239 239v501q0 24-18 42t-42 18H220Zm0-60h520V442L534 236H220v680Zm0 0V236v680Z" />
                        </svg>
                    </div>
                </div>
                <div
                    class="flex gap-2 p-4 bg-[#31C3B1] dark:bg-gray-800 items-center rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="flex-grow">
                        <div class="text-base text-white dark:text-gray-200 font-medium capitalize">
                            {{ __('validated') }}
                        </div>
                        <div class="text-4xl text-white dark:text-gray-50 font-semibold">
                            {{ $registrar['validated'] }}
                        </div>
                    </div>
                    <div class="grid place-items-center p-3 border border-gray-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" class="w-10 h-10 fill-white">
                            <path
                                d="m434 801 229-229-39-39-190 190-103-103-39 39 142 142ZM220 976q-24 0-42-18t-18-42V236q0-24 18-42t42-18h361l219 219v521q0 24-18 42t-42 18H220Zm331-554V236H220v680h520V422H551ZM220 236v186-186 680-680Z" />
                        </svg>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
