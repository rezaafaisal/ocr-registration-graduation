@props([])
@section('head')
    @vite('resources/js/components/registrar/table.js')
@endsection
<div class="grid gap-4">
    <div class="flex gap-2 items-center">
        @can('create', App\Models\Registrar::class)
            <a href="{{ $create }}"
                class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
            </a>
        @endcan
        <button id="filter_btn" data-dropdown-toggle="filter" data-dropdown-placement="bottom-start"
            class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                </path>
            </svg>
        </button>
        <button id="columns_btn" data-dropdown-toggle="columns" data-dropdown-placement="bottom-start"
            class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
            </svg>
        </button>
        @can('import', App\Models\Registrar::class)
            <form id="import" class="contents" action="{{ route('resources.registrar.import') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <button id="import_btn" data-modal-target="dialog_import" data-modal-toggle="dialog_import" type="button"
                    class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                    </svg>
                </button>
            </form>
            <div id="dialog_import" tabindex="-1" @class([
                'fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full hidden',
                // 'hidden' => !$errors->any(),
                // 'fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full justify-center items-center flex' => $errors->any(),
            ])>
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-hide="dialog_import">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <div class="p-4 text-left">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Upload file</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="file_input_help" id="file_input" name="registrars" type="file"
                                    accept=".xlsx,.csv" form="import">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                                    XLSX, CSV File.
                                </p>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p class="text-sm text-red-600 dark:text-red-500">{{ $error }}</p>
                                    @endforeach
                                @endif
                            </div>
                            {{-- <div class="flex items-center justify-center w-full p-4">
                                <label for="import_file"
                                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            XLSX, CSV File
                                        </p>
                                    </div>
                                    <input id="import_file" type="file" name="source" form="import" class="hidden" />
                                </label>
                            </div> --}}
                            <button data-modal-hide="dialog_import" type="submit" form="import"
                                class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Import
                            </button>
                            <button data-modal-hide="dialog_import" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('export', App\Models\Registrar::class)
            <a href="{{ route('resources.registrar.export') }}" id="export_btn"
                class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
            </a>
        @endcan
        @if (request()->query('sort') || request()->query('filter') || request()->query('column'))
            <a href="/{{ request()->path() }}"
                class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
            </a>
        @endif
        @can('deleteAny', App\Models\Registrar::class)
            <form class="contents" id="delete_any" action="{{ route('resources.registrar.destroy') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                @if ($paginator->count() == $paginator->total())
                    <input type="hidden" name="all" value="1">
                @endif
                <button id="delete_any_btn" data-modal-target="delete_any_dialog" data-modal-toggle="delete_any_dialog"
                    type="button"
                    class="hidden items-center p-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                    </svg>
                    <span class="sr-only">Delete Item</span>
                </button>
            </form>
            <div id="delete_any_dialog" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-hide="delete_any_dialog">
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
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                Apakah anda yakin ingin menghapus data?
                            </h3>
                            <button data-modal-hide="delete_any_dialog" type="submit" form="delete_any"
                                class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Ya
                            </button>
                            <button data-modal-hide="delete_any_dialog" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        <form id="filter" action="" class="z-10 w-auto hidden bg-white rounded shadow dark:bg-gray-700">
            <input type="hidden" name="filter" value="on">
            <ul class="overflow-auto max-h-[50vh] p-3 space-y-2 text-sm text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600"
                aria-labelledby="filter_btn">
                @foreach ($fields as $key => $value)
                    @if (in_array($key, $columns))
                        <li>
                            @switch($key)
                                @case('ipk')
                                    <div class="flex flex-col gap-1">
                                        <label for="f_ipk"
                                            class="text-sm font-medium text-gray-900 dark:text-white capitalize">
                                            {{ __($value) }}
                                        </label>
                                        <input type="number" step=".1" max="4" min="0" id="f_ipk"
                                            name="f_ipk" value="{{ request()->query('f_' . $key) }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="{{ __('search ' . $value) }}...">
                                    </div>
                                @break

                                @case('faculty')
                                    <div class="flex flex-col gap-1">
                                        <label for="f_faculty"
                                            class="text-sm font-medium text-gray-900 dark:text-white capitalize">
                                            {{ __($value) }}
                                        </label>
                                        <select id="f_faculty" name="f_faculty"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected value="">{{ __('choose a ' . $value) }}</option>
                                            @foreach (App\Models\Faculty::all() as $faculty)
                                                <option @selected(request()->query('f_faculty') == $faculty->name) value="{{ $faculty->name }}">
                                                    {{ $faculty->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @break

                                @case('study_program')
                                    <div class="flex flex-col gap-1">
                                        <label for="f_study_program"
                                            class="text-sm font-medium text-gray-900 dark:text-white capitalize">
                                            {{ __($value) }}
                                        </label>
                                        <select id="f_study_program" name="f_study_program"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected value="">{{ __('choose a ' . $value) }}</option>
                                            @foreach (App\Models\Faculty::all() as $faculty)
                                                <optgroup label="{{ $faculty->name }}">
                                                    @foreach ($faculty->departments as $department)
                                                        <option @selected(request()->query('f_study_program') == $department) value="{{ $department }}">
                                                            {{ $department }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                @break

                                @case('status')
                                    <div class="flex flex-col gap-1">
                                        <label for="f_status"
                                            class="text-sm font-medium text-gray-900 dark:text-white capitalize">
                                            {{ __($value) }}
                                        </label>
                                        <select id="f_status" name="f_status"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @if (!request()->query('f_status'))
                                                <option selected>{{ __('choose a ' . $value) }}</option>
                                            @endif
                                            @php
                                                $registrar_statuses = collect(App\Models\Registrar::list_status());
                                                if (auth()->user()->is_faculty) {
                                                    $registrar_statuses = $registrar_statuses->except(App\Models\RegistrarStatus::Create->value);
                                                }
                                            @endphp
                                            @foreach ($registrar_statuses as $key => $value)
                                                <option @selected($key == request()->query('f_status')) value="{{ $key }}"
                                                    class="capitalize">
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @break

                                @default
                                    <div class="flex flex-col gap-1">
                                        <label for="f_{{ $key }}"
                                            class="text-sm font-medium text-gray-900 dark:text-white capitalize">
                                            {{ __($value) }}
                                        </label>
                                        <input type="text" id="f_{{ $key }}" name="f_{{ $key }}"
                                            value="{{ request()->query('f_' . $key) }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="{{ __('search ' . $value) }}...">
                                    </div>
                            @endswitch
                        </li>
                    @endif
                @endforeach
            </ul>
            <div class="grid px-4 py-2 w-full">
                <button
                    class="px-4 py-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 capitalize">
                    {{ __('filter') }}
                </button>
            </div>
        </form>
        <form id="columns" action="" class="z-10 w-auto hidden bg-white rounded shadow dark:bg-gray-700">
            <input type="hidden" name="column" value="on">
            <ul class="overflow-auto max-h-[50vh] p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600"
                aria-labelledby="columns_btn">
                @foreach ($fields as $key => $value)
                    <li>
                        <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <label class="relative inline-flex items-center w-full cursor-pointer">
                                <input type="checkbox" name="columns[]" value="{{ $key }}"
                                    @checked(in_array($key, $columns)) class="sr-only peer">
                                <div
                                    class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-blue-600">
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300 capitalize">
                                    {{ __($value) }}
                                </span>
                            </label>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="grid px-4 py-2 w-full">
                <button
                    class="px-4 py-2 text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 capitalize">
                    {{ __('apply') }}
                </button>
            </div>
        </form>
    </div>
    <div class="overflow-x-auto pb-2">
        <table id="registrar"
            class="w-full text-sm text-left text-gray-500 dark:text-gray-400 dark:border dark:border-separate dark:border-spacing-0 dark:border-gray-700 rounded-lg shadow-md dark:shadow-none">
            <thead>
                <tr class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <th scope="col" class="p-4 rounded-tl-lg">
                        <div class="flex items-center">
                            <input id="checkbox-all" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-600">
                            <label for="checkbox-all" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    @foreach ($fields as $key => $value)
                        @if (in_array($key, $columns))
                            <th scope="col" class="text-base py-3 px-6 capitalize">
                                <div class="flex items-center">
                                    {{ __($value) }}
                                    <a
                                        href="{{ request()->fullUrlWithQuery(['sort' => 'on', 's_' . $key => request()->query('s_' . $key, 'desc') == 'desc' ? 'asc' : 'desc']) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3.5 h-3.5"
                                            aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path
                                                d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg>
                                    </a>
                                </div>
                            </th>
                        @endif
                    @endforeach
                    <th scope="col" class="text-base text-center py-3 px-6 rounded-tr-lg capitalize">
                        {{ __('action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($paginator as $item)
                    <tr @class([
                        'bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-600 dark:border-gray-700',
                        'border-b' => !$loop->last,
                    ])>
                        <td class="p-4 w-4 {{ $loop->last ? 'rounded-bl-lg' : '' }}">
                            <div class="flex items-center">
                                <input id="" type="checkbox" name="id[]" form="delete_any"
                                    value="{{ $item->id }}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        @foreach ($fields as $key => $value)
                            @if (in_array($key, $columns))
                                <td class="py-4 px-6 text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $item->{$key} }}
                                </td>
                            @endif
                        @endforeach
                        <td
                            class="flex justify-center gap-2 py-4 px-6 capitalize {{ $loop->last ? 'rounded-br-lg' : '' }}">
                            <a id="edt_btn" href="{{ $validate($item) }}"
                                class="p-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                    </path>
                                </svg>
                                <span class="sr-only">Validate Item</span>
                            </a>
                            @can('update', $item)
                                <a id="edt_btn" href="{{ $edit($item) }}"
                                    class="p-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                    <span class="sr-only">Edit Item</span>
                                </a>
                            @endcan
                            @can('delete', $item)
                                <form id="item-delete-{{ $item->id }}" class="contents"
                                    action="{{ route('resources.registrar.delete', ['registrar' => $item]) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button id="del_btn" type="button"
                                        data-modal-target="dialog-delete-{{ $item->id }}"
                                        data-modal-toggle="dialog-delete-{{ $item->id }}"
                                        class="p-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 12H4"></path>
                                        </svg>
                                        <span class="sr-only">Delete Item</span>
                                    </button>
                                </form>
                                <div id="dialog-delete-{{ $item->id }}" tabindex="-1"
                                    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                    <div class="relative w-full h-full max-w-md md:h-auto">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                data-modal-hide="dialog-delete-{{ $item->id }}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-6 text-center">
                                                <svg aria-hidden="true"
                                                    class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                    Apakah anda yakin ingin menghapus item?
                                                </h3>
                                                <button data-modal-hide="dialog-delete-{{ $item->id }}"
                                                    type="submit" form="item-delete-{{ $item->id }}"
                                                    class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Ya
                                                </button>
                                                <button data-modal-hide="dialog-delete-{{ $item->id }}"
                                                    type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Batal
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="p-4 text-center text-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-b-lg capitalize"
                            colspan="{{ count($columns) + 2 }}">
                            {{ __('empty') }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <nav class="flex justify-between items-center" aria-label="Table navigation">
        <div class="flex items-center gap-2 text-sm font-normal text-gray-700 dark:text-gray-400">
            <div>
                <span class="capitalize">{{ __('showing') }}</span>
                @if ($paginator->onFirstPage())
                    <span class="font-semibold text-gray-900 dark:text-white">
                        {{ $paginator->firstItem() }}
                    </span>
                    <span> {{ __('to') }} </span>
                    <span class="font-semibold text-gray-900 dark:text-white">
                        {{ $paginator->lastItem() }}
                    </span>
                @else
                    <span class="font-semibold text-gray-900 dark:text-white">
                        {{ $paginator->count() }}
                    </span>
                @endif
                <span>{{ __('of') }}</span>
                <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->total() }}</span>
                <span>{{ __('results') }}</span>.
            </div>
            <form id="fperpage">
                <label for="perpage" class="capitalize">
                    {{ __('perpage') }}:
                </label>
                <select id="perpage" name="perpage"
                    class="text-gray-700 bg-white border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 capitalize">
                    @foreach (range(1, 3) as $per)
                        <option @selected($paginator->perPage() == $per * 5) value="{{ $per * 5 }}">{{ $per * 5 }}</option>
                    @endforeach
                    <option @selected($paginator->perPage() == $paginator->total()) value="{{ $paginator->total() }}">{{ __('all') }}
                    </option>
                </select>
            </form>
        </div>
        <ul class="hidden sm:flex items-center -space-x-px">
            <li>
                @if ($paginator->previousPageUrl())
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="block py-2 px-2 text-gray-700 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                @else
                    <button disabled
                        class="cursor-not-allowed py-2 px-2 rounded-l-lg border border-gray-300 bg-gray-200 text-gray-700 dark:bg-gray-600 dark:border-gray-700 dark:text-gray-400">
                        <span class="sr-only">Previous</span>
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                @endif
            </li>
            @php
                $count = (int) ceil($paginator->total() / $paginator->perPage());
            @endphp
            @if ($count && $count > 1)
                @php
                    $index = 1;
                    $limit = 5;
                    if ($count > $limit) {
                        $div = floor($limit / 2);
                        $start = $paginator->currentPage() - $div;
                        $percent = ($paginator->currentPage() / $count) * 100;
                        if ($start < 1) {
                            $start = 1;
                        } else {
                            if ($paginator->currentPage() + $div > $count) {
                                $start = $count - ($limit - 1);
                            }
                        }
                        $pages = range($start, $limit + ($start - 1));
                        if (in_array(1, $pages)) {
                            $elements = [$pages, '', [$count]];
                        } elseif (in_array($count, $pages)) {
                            $elements = [[1], '', $pages];
                        } else {
                            $elements = [[1], '', $pages, '', [$count]];
                        }
                    } else {
                        $elements = [range(1, $count)];
                    }
                @endphp
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <div
                            class="grid place-content-center p-2 w-5 h-5 aspect-square box-content text-base text-gray-700 bg-white border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                            ...
                        </div>
                    @else
                        @foreach ($element as $page)
                            @if ($paginator->currentPage() == $page)
                                <div
                                    class="grid place-content-center p-2 w-5 h-5 aspect-square box-content text-base text-blue-600 border border-blue-300 bg-blue-100 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">
                                    {{ $page }}
                                </div>
                            @else
                                <a href="{{ $paginator->url($page) }}"
                                    class="grid place-content-center p-2 w-5 h-5 aspect-square box-content text-base text-gray-700 bg-white border border-gray-300 hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endif
            <li>
                @if ($paginator->nextPageUrl())
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="block py-2 px-2 text-gray-700 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                @else
                    <button disabled
                        class="cursor-not-allowed py-2 px-2 rounded-r-lg border border-gray-300 bg-gray-200 text-gray-700 dark:bg-gray-600 dark:border-gray-700 dark:text-gray-400">
                        <span class="sr-only">Previous</span>
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                @endif
            </li>
        </ul>
    </nav>
</div>
<script>
    @if ($errors->any())
    setTimeout(() => {
        document.getElementById('import_btn').click();
    }, 1000);
    @endif
</script>
