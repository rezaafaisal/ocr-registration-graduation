@props([
    'index' => route('resources.student.index'),
    'password' => Illuminate\Support\Str::random(8),
    'send_mail' => true,
])
@section('head')
    @vite('resources/js/components/student/create.js')
@endsection
<form
    class="grid gap-4 px-5 py-3 lg:w-1/2 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
    action="{{ route('resources.student.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_index" value="{{ $index }}">
    <div class="grid gap-4">
        {{-- <div class="flex items-end gap-4">
            <div
                class="flex-[30%] sm:flex-[20%]  grid place-content-center h-full aspect-square bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                <svg id="photo_placeholder" class="w-full aspect-square text-gray-400" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                        clip-rule="evenodd">
                    </path>
                </svg>
                <img id="photo_preview" class="hidden" src="" alt="">
            </div>
            <div class="flex flex-col gap-2 flex-grow">
                <label class="block text-sm font-medium text-gray-900 dark:text-white" for="photo">
                    Photo
                </label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="photo" type="file" name="photo">
                @error('photo')
                    <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div> --}}
        {{-- <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Your Name">
            @error('name')
                <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div> --}}
        <div>
            <label for="nim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
            <input type="text" id="nim" name="nim" value="{{ old('nim') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Your NIM">
            @error('nim')
                <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        {{-- <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Your Email">
            @error('email')
                <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div> --}}
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="text" id="password" name="password" value="{{ old('password') ?? $password }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Your Password">
            @error('password')
                <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center">
            <input id="send_mail" name="send_mail" type="checkbox" @checked($send_mail)
                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="send_mail" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Send to
                Mail</label>
        </div>
        {{-- <div>
            <label for="password_confirmation"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Your Password">
            @error('password_confirmation')
                <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div> --}}
    </div>
    <div class="flex gap-2 justify-center">
        <button
            class="w-full sm:w-1/2 lg:w-1/4 capitalize text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            {{ __('create') }}
        </button>
        {{-- <button type="button"
            class="text-sm p-1.5 text-gray-700 bg-white border dark:bg-gray-800 border-gray-300 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800 dark:border-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
            </svg>
        </button> --}}
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
