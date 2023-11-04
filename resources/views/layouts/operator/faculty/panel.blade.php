<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', App::getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <title>@yield('title', 'Panel')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/js/layouts/panel/index.js')

    @yield('head')
</head>

<body
    class="grid w-max-[100vw] min-h-screen overflow-hidden text-black bg-gray-100 dark:text-white dark:bg-gray-900 transition-colors content-start">
    <div class="flex min-h-screen">
        <aside id="drawer-main" class="bg-white dark:bg-gray-800 shadow transition-colors" tabindex="-1">
            <header
                class="flex gap-4 items-center justify-center sticky top-0 bg-white dark:bg-gray-800 text-xl font-semibold h-[56px] shadow transition-colors">
                <div><img src="{{ env('APP_LOGO') }}" alt="Bladerlaiga" class="w-8 h-8 object-contain rounded-md"></div>
                <div class="text-green-700 dark:text-green-500">{{ env('APP_NAME') }}</div>
            </header>
            <nav
                class="flex flex-col h-[calc(100vh_-_56px)] p-4 overflow-auto bg-white dark:bg-gray-800 shadow transition-colors">
                <ul class="space-y-2 capitalize">
                    <li>
                        <a href="{{ route('operator.faculty.dashboard') }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                request()->url() != route('operator.faculty.dashboard'),
                            'text-white bg-green-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                request()->url() == route('operator.faculty.dashboard'),
                        ])>
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' =>
                                    request()->url() != route('operator.faculty.dashboard'),
                                '' => request()->url() == route('operator.faculty.dashboard'),
                            ]) fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                            </svg>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        @php
                            $link = route('operator.faculty.registrar');
                        @endphp
                        <button type="button" @class([
                            'flex items-center w-full p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' => !str(
                                request()->url())->startsWith($link),
                            'text-white bg-green-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' => str(
                                request()->url())->startsWith($link),
                        ]) aria-controls="menu_registrar"
                            data-collapse-toggle="menu_registrar">
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' => !str_starts_with(
                                    request()->url(),
                                    $link),
                                '' => str_starts_with(request()->url(), $link),
                            ]) fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap capitalize"
                                sidebar-toggle-item>{{ __('registrar') }}</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="menu_registrar"
                            class="py-2 space-y-2 {{ str_starts_with(request()->url(), $link) ? '' : 'hidden' }}">
                            @foreach (App\Models\Registrar::operator_list_status() as $key => $value)
                                <li>
                                    @php
                                        $link = route("operator.faculty.registrar.$key");
                                    @endphp
                                    <a href="{{ $link }}" @class([
                                        'flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition group',
                                        'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                            request()->url() != $link,
                                        'text-white bg-green-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                            request()->url() == $link,
                                    ])>
                                        {{ $value }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700 capitalize">
                    <li>
                        @php
                            $link = route('operator.faculty.student.index');
                        @endphp
                        <a href="{{ $link }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                request()->url() != $link,
                            'text-white bg-green-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                request()->url() == $link,
                        ])>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" @class([
                                    'w-6 h-6 transition',
                                    'text-gray-700 dark:text-white' => request()->url() != $link,
                                    '' => request()->url() == $link,
                                ])>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                            <span class="ml-3">{{ __('student') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('operator.logout.perform') }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700',
                        ])>
                            <svg @class(['w-6 h-6 transition text-gray-700 dark:text-white']) fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            <span class="ml-3">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <div id="content" class="flex-grow grid h-screen grid-rows-[56px,auto,56px]">
            <header id="header"
                class="flex items-center h-[56px] sticky top-0 bg-white dark:bg-gray-800 shadow transition-colors z-10">
                <div class="flex-grow flex gap-4 items-center px-4">
                    <button id="drawer-btn"
                        class="text-sm p-2 text-gray-700 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800">
                        <svg class="w-6 h-6" focusable="false" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 24 24" data-testid="MenuOpenIcon">
                            <path
                                d="M3 18h13v-2H3v2zm0-5h10v-2H3v2zm0-7v2h13V6H3zm18 9.59L17.42 12 21 8.41 19.59 7l-5 5 5 5L21 15.59z">
                            </path>
                        </svg>
                    </button>
                    <h1 class="text-base font-medium capitalize">@yield('title', 'Panel')</h1>
                </div>
                <div class="flex relative gap-2 items-center pr-4">
                    {{-- <button id="notif-btn" data-dropdown-toggle="notif-ddw"
                        class="text-sm p-2 text-gray-700 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800">
                        @empty($user->unreadNotifications->all())
                        @else
                            <div class="flex absolute">
                                <div class="inline-flex relative w-3 h-3 left-3 bg-green-500 rounded-full">
                                </div>
                            </div>
                        @endempty
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                    </button> --}}
                    <div id="notif-ddw"
                        class="hidden z-20 w-full max-w-sm bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                        aria-labelledby="notif-btn">
                        <div
                            class="block py-2 px-4 font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-white rounded-t-md">
                            Notifications
                        </div>
                        <div class="divide-y divide-gray-100 dark:divide-gray-700">
                            @forelse ($user->unreadNotifications as $notification)
                                <a href="{{ route($notification->data['route'], ['notification' => $notification]) }}"
                                    class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <div class="flex-shrink-0">
                                        <img class="w-11 h-11 rounded-full" src="{{ asset('logo.png') }}"
                                            alt="">
                                    </div>
                                    <div class="pl-3 w-full">
                                        <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">
                                            {{ $notification->data['message'] }}
                                        </div>
                                        <div class="text-xs text-green-600 dark:text-green-500">
                                            {{ $notification->created_at->timespan() }}
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center py-4 text-gray-500 text-lg dark:text-gray-400">
                                    Empty
                                </div>
                            @endforelse
                        </div>
                    </div>

                    {{-- <button id="theme-btn"
                    class="text-sm p-2 text-gray-700 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                        </path>
                    </svg>
                </button> --}}

                    {{-- <button id="LangButton" data-dropdown-toggle="Lang"
                    class="grid place-content-center gap-2 h-10 aspect-square text-sm text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-600 hover:text-green-600 dark:hover:text-green-500 rounded-lg">
                    <span class="sr-only">Open language menu</span>
                    <div class="p-2.5">
                        <div class="font-medium uppercase">{{ App::getLocale() }}</div>
                    </div>
                </button>
                <div id="Lang"
                    class="hidden z-10 w-auto bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="LangDefault">
                        @foreach (['en' => 'English', 'id' => 'Indonesia'] as $key => $value)
                            <li>
                                <a href="{{ route('language.set', ['locale' => $key]) }}"
                                    @class([
                                        'block py-2 px-4 hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white',
                                        'text-white bg-green-500 hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white' =>
                                            $key == App::getLocale(),
                                    ])>
                                    {{ $value }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div> --}}

                    <button id="ProfileButton" data-dropdown-toggle="Profile"
                        class="flex items-center gap-2 text-sm font-medium text-gray-900 rounded-lg hover:text-green-600 dark:hover:text-green-500 md:mr-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white">
                        <span class="sr-only">Open user menu</span>
                        <div class="bg-gray-100 p-2 rounded-lg dark:bg-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="text-left font-medium dark:text-white">
                            <div class="text-base">{{ $user->name }}</div>
                            <div class="text-xs opacity-70">{{ $user->department }}</div>
                        </div>
                        <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div id="Profile"
                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        {{-- <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownInformProfileButtonationButton">
                        <li>
                            <a href="{{ route('operator.faculty.empty') }}"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('operator.faculty.empty') }}"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Notifications</a>
                        </li>
                        <li>
                            <a href="{{ route('operator.faculty.empty') }}"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                    </ul> --}}
                        <div class="py-1">
                            <a href="{{ route('operator.logout.perform') }}"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Logout
                            </a>
                        </div>
                    </div>

                </div>
            </header>
            <main class="flex-grow p-4 overflow-auto">
                @if (isset($content_card) && $content_card)
                    <div class="grid gap-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow transition-colors">
                        @yield('content')
                    </div>
                @else
                    @yield('content')
                @endif
            </main>
            <footer
                class="flex items-center justify-center h-[56px] bg-white dark:bg-gray-800 shadow transition-colors">
                <div class="text-sm">Copyright &copy; 2022 Bladerlaiga, All Right Reserved.</div>
            </footer>
        </div>
    </div>
</body>

</html>
