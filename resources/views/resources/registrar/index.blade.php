@extends($layout, ['content_card' => false])

@section('title', __('list of registrar'))

@section('content')
    <div class="pb-4">
        <div class="flex gap-2 items-center">
            <a href="{{ route('resources.registrar.create') }}"
                class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
            </a>
            <button id="filter_btn" data-modal-toggle="filter_modal"
                class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                    </path>
                </svg>
            </button>
            @if (request()->query('filter'))
                <a href="{{ route('resources.registrar.index') }}"
                    class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </a>
            @endif
            <button id="column_btn"
                class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 4.5v15m6-15v15m-10.875 0h15.75c.621 0 1.125-.504 1.125-1.125V5.625c0-.621-.504-1.125-1.125-1.125H4.125C3.504 4.5 3 5.004 3 5.625v12.75c0 .621.504 1.125 1.125 1.125z" />
                </svg>
            </button>
        </div>
    </div>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-600">
                            <label for="checkbox-all" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="text-base py-3 px-6 capitalize">
                        <div class="flex items-center">
                            {{ __('name') }}
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true"
                                    fill="currentColor" viewBox="0 0 320 512">
                                    <path
                                        d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="text-base py-3 px-6 capitalize">
                        <div class="flex items-center">
                            {{ __('NIM') }}
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true"
                                    fill="currentColor" viewBox="0 0 320 512">
                                    <path
                                        d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="flex justify-center text-base text-center py-3 px-6 capitalize">
                        <div class="flex items-center">
                            {{ __('study program') }}
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true"
                                    fill="currentColor" viewBox="0 0 320 512">
                                    <path
                                        d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="text-base py-3 px-6 capitalize">
                        <div class="flex items-center justify-center">
                            {{ __('status') }}
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true"
                                    fill="currentColor" viewBox="0 0 320 512">
                                    <path
                                        d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="text-base text-center py-3 px-6 capitalize">
                        {{ __('action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="p-4 w-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-1" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $item['name'] }}
                        </td>
                        <td class="py-4 px-6 text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $item['nim'] }}
                        </td>
                        <td class="py-4 px-6 text-center text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $item['study_program'] }}
                        </td>
                        <td class="py-4 px-6 text-gray-900 dark:text-white whitespace-nowrap">
                            <div class="flex justify-center w-full">
                                <div
                                    class="px-2.5 py-1.5 bg-gray-200 text-gray-900 text-sm font-medium mr-2 rounded dark:bg-gray-700 dark:text-gray-50">
                                    {{ __($item['status']) }}
                                </div>
                            </div>
                        </td>
                        <td class="flex justify-center gap-2 py-4 px-6 capitalize">
                            <a id="edt_btn"
                                href="{{ route('resources.registrar.show_validate', ['registrar' => $item]) }}"
                                class="p-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                    </path>
                                </svg>
                                <span class="sr-only">Edit Item</span>
                            </a>
                            <a id="edt_btn" href="{{ route('resources.registrar.edit', ['registrar' => $item]) }}"
                                class="p-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                <span class="sr-only">Validate Item</span>
                            </a>
                            <form class="contents"
                                action="{{ route('resources.registrar.destroy', ['registrar' => $item]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button id="del_btn"
                                    class="p-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 12H4"></path>
                                    </svg>
                                    <span class="sr-only">Delete Item</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="p-4 text-center text-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 capitalize"
                            colspan="6">
                            {{ __('empty') }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pt-4">
        <nav class="flex justify-between items-center" aria-label="Table navigation">
            <div class="flex items-center gap-2 text-sm font-normal text-gray-700 dark:text-gray-400">
                <div>
                    <span class="capitalize">{{ __('showing') }}</span>
                    @if ($data->onFirstPage())
                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{ $data->firstItem() }}
                        </span>
                        <span> {{ __('to') }} </span>
                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{ $data->lastItem() }}
                        </span>
                    @else
                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{ $data->count() }}
                        </span>
                    @endif
                    <span>{{ __('of') }}</span>
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $data->total() }}</span>
                    <span>{{ __('results') }}</span>.
                </div>
                <form id="fperpage">
                    <label for="perpage" class="capitalize">
                        {{ __('perpage') }}:
                    </label>
                    <select id="perpage" name="perpage" onchange="document.forms.fperpage.submit()"
                        class="text-gray-700 bg-white border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 capitalize">
                        @foreach (range(1, 3) as $per)
                            <option @selected($data->perPage() == $per * 5) value="{{ $per * 5 }}">{{ $per * 5 }}</option>
                        @endforeach
                        <option @selected($data->perPage() == $data->total()) value="{{ $data->total() }}">{{ __('all') }}</option>
                    </select>
                </form>
            </div>
            <ul class="inline-flex items-center -space-x-px">
                <li>
                    @if ($data->previousPageUrl())
                        <a href="{{ $data->previousPageUrl() }}"
                            class="block py-2 px-2 text-gray-700 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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
                            class="cursor-not-allowed py-2 px-2 rounded-l-lg border border-gray-300 bg-gray-100 text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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
                {{-- @dump((int) floor($data->total() / $data->perPage())) --}}
                @if ($count = (int) floor($data->total() / $data->perPage()))
                    @foreach (range(1, $count) as $item)
                        <li>
                            <a href="{{ $data->url($loop->iteration) }}" @class([
                                'grid place-content-center p-2 w-5 h-5 aspect-square box-content text-base',
                                'text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' =>
                                    $data->currentPage() != $loop->iteration,
                                'text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white' =>
                                    $data->currentPage() == $loop->iteration,
                            ])>
                                {{ $loop->iteration }}
                            </a>
                        </li>
                    @endforeach
                @endif
                <li>
                    @if ($data->nextPageUrl())
                        <a href="{{ $data->nextPageUrl() }}"
                            class="block py-2 px-2 text-gray-700 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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
                            class="cursor-not-allowed py-2 px-2 rounded-r-lg border border-gray-300 bg-gray-100 text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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
    <div id="filter_modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center p-4 w-full md:inset-0 h-modal md:h-full">
        <div class="relative w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <form action="{{ route('resources.registrar.index') }}"
                class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-center px-6 py-3 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Filter
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="filter_modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="grid sm:grid-cols-2 gap-4 p-6">
                    <div class="flex flex-col gap-2">
                        <label for="f_name" class="text-sm font-medium text-gray-900 dark:text-white capitalize">
                            {{ __('name') }}
                        </label>
                        <input type="text" id="f_name" name="f_name" value="{{ request()->query('f_name') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your Name">
                        @error('f_name')
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="f_nim" class="text-sm font-medium text-gray-900 dark:text-white capitalize">
                            {{ __('NIM') }}
                        </label>
                        <input type="text" id="f_nim" name="f_nim" value="{{ request()->query('f_nim') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your NIM">
                        @error('f_nim')
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="f_faculty" class="text-sm font-medium text-gray-900 dark:text-white capitalize">
                            {{ __('faculty') }}
                        </label>
                        <select id="f_faculty" name="f_faculty"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @if (!request()->query('f_faculty'))
                                <option selected>Choose a Faculty</option>
                            @endif
                            @foreach (App\Models\Faculty::all() as $faculty)
                                <option @selected(request()->query('f_faculty') == $faculty->name) value="{{ $faculty->name }}">
                                    {{ $faculty->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('f_faculty')
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="f_study_program" class="text-sm font-medium text-gray-900 dark:text-white capitalize">
                            {{ __('study program') }}
                        </label>
                        <select id="f_study_program" name="f_study_program"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @if (!request()->query('f_study_program'))
                                <option selected>Choose a Study Program</option>
                            @endif
                            @foreach (App\Models\Faculty::all() as $faculty)
                                @foreach ($faculty->departments as $department)
                                    <option @selected(request()->query('f_study_program') == $department) value="{{ $department }}">
                                        {{ $department }}
                                    </option>
                                @endforeach
                            @endforeach
                        </select>
                        @error('f_study_program')
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="f_status" class="text-sm font-medium text-gray-900 dark:text-white">
                            Status
                        </label>
                        <select id="f_status" name="f_status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @if (!request()->query('f_status'))
                                <option selected value="">Choose a Status</option>
                            @endif
                            @foreach (App\Models\Registrar::list_status() as $key => $value)
                                <option @selected($key == request()->query('f_status')) value="{{ $key }}" class="capitalize">
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                        @error('f_status')
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center px-6 py-3 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="submit" name="filter" value="on"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Filter
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
