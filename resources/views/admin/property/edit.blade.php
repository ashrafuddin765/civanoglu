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
                <form action="create-property" method="POST" class="p-6 bg-white border-b border-gray-200">@csrf
                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="name">Title</label>
                            <input type="text" name="name" class="civanoglu-input" id="name"
                                value="{{ $property->name }}">
                            @error('name')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="name_tr">Title Turkish</label>
                            <input type="text" name="name_tr" class="civanoglu-input" id="name_tr"
                                value="{{ $property->name_tr }}">
                            @error('name_tr')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="civanoglu-label" for="featured_image">Featured image</label>
                        <input type="file" name="featured_image" class="civanoglu-input" id="featured_image">
                        @error('featured_image')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="location_id">Location</label>
                            <select class="civanoglu-label" name="location_id" id="location_id">
                                <option value="">Select location</option>
                                @foreach ($locations as $location)
                                    <option {{ $property->location->id == $location->id ? 'selected' : '' }}
                                        value="{{ $location->id }}">{{ $location->city }}</option>
                                @endforeach
                            </select>
                            @error('location_id')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="price">Price</label>
                            <input type="text" name="price" class="civanoglu-input" id="price"
                                value="{{ $property->price }}">
                            @error('price')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="sale">Buy or Rent</label>
                            <select class="civanoglu-label" name="sale" id="sale">
                                <option value="">Select</option>
                                <option {{ $property->sale == '0' ? 'selected' : '' }} value="0">Rent</option>
                                <option {{ $property->sale == '1' ? 'selected' : '' }} value="1">Sale</option>
                            </select>
                            @error('sale')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="type">Property type</label>
                            <select class="civanoglu-label" name="type" id="type">
                                <option value="">Select</option>
                                <option {{ $property->sale == '0' ? 'selected' : '' }} value="0">land</option>
                                <option {{ $property->sale == '1' ? 'selected' : '' }} value="1">Apertment </option>
                                <option {{ $property->sale == '2' ? 'selected' : '' }} value="2">Villa </option>
                            </select>
                            @error('type')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="bedrooms">Bedrooms</label>
                            <select class="civanoglu-input" name="bedrooms" id="bedrooms">
                                <option value="">Select bedrooms</option>
                                <option {{ $property->sale == '1+1' ? 'selected' : '' }} value="1+1">1+1</option>
                                <option {{ $property->sale == '2+1' ? 'selected' : '' }} value="2+1">2+1</option>
                                <option {{ $property->sale == '3+1' ? 'selected' : '' }} value="3+1">3+1</option>
                                <option {{ $property->sale == '4+1' ? 'selected' : '' }} value="4+1">4+1</option>
                                <option {{ $property->sale == '5+1' ? 'selected' : '' }} value="5+1">5+1</option>
                                <option {{ $property->sale == '6+1' ? 'selected' : '' }} value="6+1">6+1</option>
                            </select>

                            @error('bedrooms')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="bathrooms">Bathrooms</label>
                            <select class="civanoglu-input" name="bathrooms" id="bathrooms">
                                <option value="">Select bedrooms</option>
                                <option {{ $property->sale == '1' ? 'selected' : '' }} value="1">1</option>
                                <option {{ $property->sale == '2' ? 'selected' : '' }} value="2">2</option>
                                <option {{ $property->sale == '3' ? 'selected' : '' }} value="3">3</option>
                                <option {{ $property->sale == '4' ? 'selected' : '' }} value="4">4</option>
                                <option {{ $property->sale == '5' ? 'selected' : '' }} value="5">5</option>
                                <option {{ $property->sale == '6' ? 'selected' : '' }} value="6">6</option>
                            </select>

                            @error('bathrooms')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="net_sqm">Net square meeter</label>
                            <input class="civanoglu-input" type="number" id="net_sqm" name="net_sqm"
                                value="{{ $property->net_sqm }}">

                            @error('net_sqm')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="gross_sqm">Gross square meeter</label>
                            <input class="civanoglu-input" type="number" id="gross_sqm" name="gross_sqm"
                                value="{{ $property->gross_sqm }}">

                            @error('gross_sqm')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="pool">Pool</label>
                            <select class="civanoglu-input" name="pool" id="pool">
                                <option value="">Select pool</option>
                                <option {{ $property->sale == '0' ? 'selected' : '' }} value="0">No</option>
                                <option {{ $property->sale == '1' ? 'selected' : '' }} value="1">Private</option>
                                <option {{ $property->sale == '2' ? 'selected' : '' }} value="2">Public</option>
                                <option {{ $property->sale == '3' ? 'selected' : '' }} value="3">Both</option>
                            </select>

                            @error('pool')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="overview">Overview</label>
                            <textarea class="civanoglu-label" name="overview" id="overview" cols="30"
                                rows="10">{{ $property->overview }}</textarea>
                            @error('overview')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="overview_tr">Overview TR</label>
                            <textarea class="civanoglu-label" name="overview_tr" id="overview_tr" cols="30"
                                rows="10">{{ $property->overview_tr }}</textarea>
                            @error('overview_tr')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="why_buy">why buy</label>
                            <textarea class="civanoglu-label" name="why_buy" id="why_buy" cols="30"
                                rows="10"> {{ $property->why_buy }}</textarea>
                            @error('why_buy')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="why_buy_tr">why buy TR</label>
                            <textarea class="civanoglu-label" name="why_buy_tr" id="why_buy_tr" cols="30"
                                rows="10">{{ $property->why_buy_tr }}</textarea>
                            @error('why_buy_tr')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="description">Description</label>
                            <textarea class="civanoglu-label" name="description" id="description" cols="30"
                                rows="10">{{ $property->description }}</textarea>
                            @error('description')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="description_tr">Description TR</label>
                            <textarea class="civanoglu-label" name="description_tr" id="description_tr" cols="30"
                                rows="10">{{ $property->description_tr }}</textarea>
                            @error('description_tr')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn">Save property</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
