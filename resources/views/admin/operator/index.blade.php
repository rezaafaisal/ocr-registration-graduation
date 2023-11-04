@extends('layouts.admin.panel', ['content_card' => false])

@section('title', __('list of operator'))
@section('head')
    @vite('resources/js/admin/user/operator/index.js')
@endsection
@section('body')
@endsection

@section('content')
    <div class="pb-4">
        <div class="flex gap-2 items-center">
            <a href="{{ route('admin.user.operator.create') }}"
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
            @if (request()->query('sort') || request()->query('filter'))
                <a href="/{{ request()->path() }}"
                    class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </a>
            @endif
            <button id="columns_btn" data-dropdown-toggle="columns"
                class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                </svg>
            </button>
            <form id="columns" action="{{ route('admin.user.operator.index') }}"
                class="z-10 w-auto hidden bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600">
                <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="columns_btn">
                    @foreach (['name', 'department'] as $column)
                        <li>
                            <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <label class="relative inline-flex items-center w-full cursor-pointer">
                                    <input type="checkbox" name="columns[]" value="{{ $column }}"
                                        @checked(in_array($column, $columns)) class="sr-only peer">
                                    <div
                                        class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-blue-600">
                                    </div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300 capitalize">
                                        {{ __($column) }}
                                    </span>
                                </label>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="grid px-4 py-2 w-full">
                    <button
                        class="px-4 py-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 capitalize">
                        {{ __('apply') }}
                    </button>
                </div>
            </form>

        </div>
    </div>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    {{-- <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox_all" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-600">
                            <label for="checkbox_all" class="sr-only">checkbox</label>
                        </div>
                    </th> --}}
                    <th scope="col" class="text-base py-3 px-6 capitalize">
                        No.
                    </th>
                    @foreach ($columns as $column)
                        <th scope="col" class="text-base py-3 px-6 capitalize">
                            <div class="flex items-center">
                                {{ __($column) }}
                                <a
                                    href="{{ request()->fullUrlWithQuery(['sort' => 'on', 's_' . $column => request()->query('s_' . $column, 'desc') == 'desc' ? 'asc' : 'desc']) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true"
                                        fill="currentColor" viewBox="0 0 320 512">
                                        <path
                                            d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                    </svg>
                                </a>
                            </div>
                        </th>
                    @endforeach
                    <th scope="col" class="text-base text-center py-3 px-6 capitalize">
                        {{ __('action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($paginator as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        {{-- <td class="p-4 w-4">
                            <div class="flex items-center">
                                <input id="checkbox_{{ $loop->index }}" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox_{{ $loop->index }}" class="sr-only">checkbox</label>
                            </div>
                        </td> --}}
                        <td class="py-4 px-6 text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $loop->iteration }}
                        </td>
                        @foreach ($columns as $column)
                            <td class="py-4 px-6 text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $item[$column] }}
                            </td>
                        @endforeach
                        <td class="flex justify-center gap-2 py-4 px-6 capitalize">
                            <a id="edit_btn" href="{{ route('admin.user.operator.edit', ['operator' => $item]) }}"
                                class="p-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                <span class="sr-only">Validate Item</span>
                            </a>
                            <form id="item-delete-{{ $item->id }}" class="contents"
                                action="{{ route('admin.user.operator.destroy', ['operator' => $item]) }}" method="post">
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
                                            <button data-modal-hide="dialog-delete-{{ $item->id }}" type="submit"
                                                form="item-delete-{{ $item->id }}"
                                                class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Ya
                                            </button>
                                            <button data-modal-hide="dialog-delete-{{ $item->id }}" type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                Batal
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    <select id="perpage" name="perpage" onchange="document.forms.fperpage.submit()"
                        class="text-gray-700 bg-white border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 capitalize">
                        @foreach (range(1, 3) as $per)
                            <option @selected($paginator->perPage() == $per * 5) value="{{ $per * 5 }}">{{ $per * 5 }}</option>
                        @endforeach
                        <option @selected($paginator->perPage() == $paginator->total()) value="{{ $paginator->total() }}">{{ __('all') }}
                        </option>
                    </select>
                </form>
            </div>
            <ul class="inline-flex items-center -space-x-px">
                <li>
                    @if ($paginator->previousPageUrl())
                        <a href="{{ $paginator->previousPageUrl() }}"
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
                @if ($count = (int) floor($paginator->total() / $paginator->perPage()))
                    @foreach (range(1, $count) as $item)
                        <li>
                            <a href="{{ $paginator->url($loop->iteration) }}" @class([
                                'grid place-content-center p-2 w-5 h-5 aspect-square box-content text-base',
                                'text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' =>
                                    $paginator->currentPage() != $loop->iteration,
                                'text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white' =>
                                    $paginator->currentPage() == $loop->iteration,
                            ])>
                                {{ $loop->iteration }}
                            </a>
                        </li>
                    @endforeach
                @endif
                <li>
                    @if ($paginator->nextPageUrl())
                        <a href="{{ $paginator->nextPageUrl() }}"
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
            <form action="" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
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
                        <label for="f_department" class="text-sm font-medium text-gray-900 dark:text-white">
                            Department
                        </label>
                        <select id="f_department" name="f_department"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @if (!request()->query('f_department'))
                                <option selected>Choose a Department</option>
                            @endif
                            @foreach (App\Models\Operator::$list_department as $key => $value)
                                <option @selected($key == request()->query('f_department')) value="{{ $key }}" class="capitalize">
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                        @error('f_department')
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- <div class="flex flex-col gap-2">
                        <label for="f_email" class="text-sm font-medium text-gray-900 dark:text-white capitalize">
                            {{ __('email') }}
                        </label>
                        <input type="text" id="f_email" name="f_email" value="{{ request()->query('f_email') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your Email">
                        @error('f_email')
                            <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div> --}}
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
