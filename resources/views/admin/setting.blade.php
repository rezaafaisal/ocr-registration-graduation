@extends('layouts.admin.panel', ['content_card' => true])

@section('title', 'Command')
@section('head')
    @vite('resources/js/layouts/panel/command.js')
    <script>
        var command = @json(env('APP_COMMAND'));
        var output = @json(session()->get('output', 'Empty'));
    </script>
@endsection

@section('content')
    <div class="w-fit flex flex-col gap-4">
        {{-- <form action="{{ route('admin.setting.seeder.perform') }}" method="POST">
            @csrf
            <button
                class="w-auto px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Seeder
            </button>
        </form> --}}
        @if (!app()->maintenanceMode()->active())
            <form class="flex flex-col gap-2" action="{{ route('admin.setting.down.perform') }}" method="post">
                @csrf
                <label for="secret">Maintenance</label>
                <div class="flex gap-2">
                    <input type="text" id="secret" name="secret"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="secret">
                    <button
                        class="w-auto px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Down
                    </button>
                </div>
            </form>
        @else
            <form class="flex gap-2" action="{{ route('admin.setting.up.perform') }}" method="POST">
                @csrf
                <button
                    class="w-auto px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Up
                </button>
            </form>
        @endif
        {{-- <form action="{{ route('admin.setting.pull.perform') }}" method="post">
            @csrf
            <button
                class="w-auto px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Git Pull
            </button>
        </form>
        <form action="{{ route('admin.setting.build.perform') }}" method="post">
            @csrf
            <button
                class="w-auto px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                npm run build
            </button>
        </form> --}}
        <form class="flex flex-col gap-2" action="{{ route('admin.setting.cwd.perform') }}" method="post">
            @csrf
            <label for="cwd">cwd</label>
            <div class="flex gap-2">
                <input type="text" id="cwd" name="__cwd__" value="{{ session()->get('__cwd__') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="cwd">
                    <button name="set"
                    class="w-auto px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Set
                </button>
            </div>
        </form>
        <div class="flex flex-col gap-2">
            <label for="output" class="flex items-center gap-2">
                <div>Command</div>
                <form action="{{ route('admin.setting.clear.perform') }}" method="POST">
                    @csrf
                    <button
                        class="w-auto px-5 py-1 text-xs text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Clear
                    </button>
                </form>
            </label>
            <form class="flex gap-2" action="{{ route('admin.setting.command.perform') }}" method="post">
                @csrf
                <div>
                    <input type="text" id="command" name="command"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="php artisan inspire">
                </div>
                <button
                    class="w-auto px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Run
                </button>
            </form>
            <output id="output" class="bg-gray-100 dark:bg-gray-700 p-2 rounded-lg whitespace-pre-line">

            </output>
        </div>
    </div>
@endsection
