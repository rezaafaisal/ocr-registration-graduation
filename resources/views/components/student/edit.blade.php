@props([
    'index' => route('resources.student.index'),
])
@section('head')
    {{-- // FIXME - input photo --}}
    @vite('resources/js/components/student/create.js')
@endsection
<form
    class="grid gap-4 px-5 py-3 lg:w-1/2 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
    action="{{ route('resources.student.update', ['student' => $student]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <input type="hidden" name="_id" value="{{ $student['id'] }}">
    <input type="hidden" name="_index" value="{{ $index }}">
    <div class="grid gap-4">
        {{-- <div class="flex items-end gap-4">
            <div
                class="flex-[30%] sm:flex-[20%]  grid place-content-center h-full aspect-square bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                <svg id="photo_placeholder" @class([
                    'w-full aspect-square text-gray-400',
                    'hidden' => $student->photo,
                ]) fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                        clip-rule="evenodd">
                    </path>
                </svg>
                <img id="photo_preview" @class(['hidden' => !$student->photo]) src="{{ $student->photo }}" alt="photo">
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
            <input type="text" id="name" name="name" value="{{ $student['name'] ?? old('name') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Your Name">
            @error('name')
                <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div> --}}
        <div>
            <label for="nim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
            <input type="text" id="nim" name="nim" value="{{ $student['nim'] ?? old('nim') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Your NIM">
            @error('nim')
                <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        {{-- <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" id="email" name="email" value="{{ $student['email'] ?? old('email') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Your Email">
            @error('email')
                <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div> --}}
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="text" id="password" name="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Your Password">
            @error('password')
                <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
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
    <div class="grid place-items-center">
        <button
            class="w-full sm:w-1/2 lg:w-1/4 capitalize text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
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
