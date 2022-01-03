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
                <div class="p-6">
                    <h4>Gallery images</h4>
                    <div class="flex mt-3">
                        @foreach ($property->gallery as $gallery)
                            <div style="min-width: 100px;" class="mr-r flex items-center justify-center relative">
                                <img style="max-width: 100px;" src="/uploads/{{ $gallery->name }}" alt="" />

                                <form action="{{ route('delete-media', $gallery->id) }}" method="post"
                                    class="absolute right-0 top-0"
                                    onsubmit="return confirm('Do you really want to delete the image?a')">@csrf
                                    <button type="submit"
                                        class="text-white bg-red-600 text-xs px-3 py-1">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
                <form action="{{ route('update-property', $property->id)}}" method="POST" class="p-6 bg-white border-b border-gray-200"
                    enctype="multipart/form-data">@csrf
                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="name">Title</label>
                            <input type="text" name="name" class="civanoglu-input" id="name"
                                value="{{ $property->name }}" required>
                            @error('name')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="name_tr">Title Turkish</label>
                            <input type="text" name="name_tr" class="civanoglu-input" id="name_tr"
                                value="{{ $property->name_tr }}" required>
                            @error('name_tr')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="pt-3">
                            <img src="/uploads/{{ $property->featured_image }}" alt="">
                        </div>
                        <label class="civanoglu-label" for="featured_image">Featured image</label>
                        <input type="file" name="featured_image" class="civanoglu-input" id="featured_image" >
                        @error('featured_image')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="civanoglu-label" for="gallery_image">Gallery image</label>
                        <input type="file" name="gallery_image[]" class="civanoglu-input" id="gallery_image" multiple
                            >
                        @error('gallery_image')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="location_id">Location</label>
                            <select class="civanoglu-label" name="location_id" id="location_id" required>
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
                            <input type="number" name="price" class="civanoglu-input" id="price"
                                value="{{ $property->price }}" required>
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
                            <label class="civanoglu-label" for="drawing_rooms">Drawing rooms</label>
                            <select class="civanoglu-input" name="drawing_rooms" id="drawing_rooms">
                                <option value="">Select one</option>

                                @for ($x = 1; $x <= 3; $x++)
                                    <option {{ $property->drawing_rooms == $x ? 'selected="selected"' : '' }}
                                        value="{{ $x }}">{{ $x }}</option>
                                @endfor
                            </select>

                            @error('drawing_rooms')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="bedrooms">Bedrooms</label>
                            <select class="civanoglu-input" name="bedrooms" id="bedrooms">
                                <option value="">Select bedrooms</option>
                                @for ($x = 0; $x <= 8; $x++)
                                    <option {{ $property->bedrooms == $x ? 'selected="selected"' : '' }}
                                        value="{{ $x }}">{{ $x }}</option>
                                @endfor
                            </select>

                            @error('bedrooms')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="bathrooms">Bathrooms</label>
                            <select class="civanoglu-input" name="bathrooms" id="bathrooms">
                                <option value="">Select bathrooms</option>
                                @for ($x = 1; $x <= 6; $x++)
                                    <option {{ $property->bathrooms == $x ? 'selected="selected"' : '' }}
                                        value="{{ $x }}">{{ $x }}</option>
                                @endfor
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
                            <textarea class="civanoglu-label" name="overview" id="overview" cols="30" rows="10"
                                required>{{ $property->overview }}</textarea>
                            @error('overview')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="overview_tr">Overview TR</label>
                            <textarea class="civanoglu-label" name="overview_tr" id="overview_tr" cols="30" rows="10"
                                required>{{ $property->overview_tr }}</textarea>
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
                            <textarea class="civanoglu-label" name="description" id="description" cols="30" rows="10"
                                required>{{ $property->description }}</textarea>
                            @error('description')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="description_tr">Description TR</label>
                            <textarea class="civanoglu-label" name="description_tr" id="description_tr" cols="30"
                                rows="10" required>{{ $property->description_tr }}</textarea>
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
