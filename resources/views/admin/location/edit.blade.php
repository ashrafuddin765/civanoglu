<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit property') }}
            </h2>
            <div class="min-w-max">
                <a class="fullwidth-btn" href="{{ route('dash-properties') }}">Back </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('update-location', $location->id) }}" method="POST"
                    class="p-6 bg-white border-b border-gray-200" enctype="multipart/form-data">@csrf
                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="name">Address</label>
                            <input type="text" name="name" class="civanoglu-input" id="name" value="{{ $location->name }}"
                                required>
                            @error('name')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="city">City</label>
                            <input type="text" name="city" class="civanoglu-input" id="city"
                                value="{{ $location->city }}" required>
                            @error('city')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <button type="submit" class="btn">Update location</button>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
