<form action="{{ route('properties') }}" method="GET" class="property-searchform flex justify-between">

    <div class="search-wrapper flex w-6/12 justify-between items-center">
        <div class="field-wrap flex flex-col mx-3">
            <label for="sale">Buy or Rent</label>
            <select name="sale" class="border-0 focus:ring-0">
                <option value="">Buy or Rent</option>
                <option value="1">Buy</option>
                <option value="0">Rent</option>
            </select>
        </div>
        <div class="py-3 self-center border-gray-500 border field-border"></div>
        <div class="field-wrap flex flex-col mx-3">
            <label for="type">Type</label>
            <select name="type" class="border-0 focus:ring-0">
                <option value="">Type</option>
                <option {{ request('type') == '0' ? 'selected' : '' }}  value="0">Land</option>
                <option {{ request('type') == '1' ? 'selected' : '' }} value="1">Apertment</option>
                <option {{ request('type') == '2' ? 'selected' : '' }} value="2">Villa</option>
            </select>
        </div>
        <div class="py-3 self-center border-gray-500 border field-border"></div>
        <div class="field-wrap flex flex-col mx-3">

            <label for="location">Location</label>
            <select name="location" class="border-0 focus:ring-0">
                <option value="">Location</option>
                @foreach ($locations as $location)
                <option {{ request('location') == $location->id ? 'selected' : '' }} value="{{$location->id}}">{{ $location->city }}</option>
                @endforeach

                <option value="1">Apertment</option>
                <option value="2">Villa</option>
            </select>
        </div>
        <div class="py-3 self-center border-gray-500 border field-border"></div>
        <div class="field-wrap flex flex-col mx-3">
            <label for="price">Price</label>
            <select name="price" class="border-0 focus:ring-0">
                <option value="">Price</option>
                <option {{ request('price') == 100000 ? 'selected' : '' }} value="100000">0 - 100000</option>
                <option {{ request('price') == 200000 ? 'selected' : '' }} value="200000">100000 - 200000</option>
                <option {{ request('price') == 300000 ? 'selected' : '' }} value="300000">200000 - 300000</option>
                <option {{ request('price') == 400000 ? 'selected' : '' }} value="400000">300000 - 400000</option>
                <option {{ request('price') == 500000 ? 'selected' : '' }} value="500000">400000 - 500000</option>
                <option {{ request('price') == '500000+' ? 'selected' : '' }} value="500000+">500000+</option>


            </select>
        </div>
        <div class="py-3 self-center border-gray-500 border field-border"></div>
        <div class="field-wrap flex flex-col mx-3">
            <label for="bedrroms">Bedrooms</label>
            <select name="bedrooms" class="border-0 focus:ring-0">
                <option value="">Bedrooms</option>
                <option {{ request('bedrooms') == 1 ? 'selected' : '' }} value="1">1</option>
                <option {{ request('bedrooms') == 2 ? 'selected' : '' }} value="2">2</option>
                <option {{ request('bedrooms') == 4 ? 'selected' : '' }} value="3">3</option>
                <option {{ request('bedrooms') == 4 ? 'selected' : '' }} value="4">4</option>
                <option {{ request('bedrooms') == 5 ? 'selected' : '' }} value="5">5</option>
                <option {{ request('bedrooms') == 6 ? 'selected' : '' }} value="6">6</option>
            </select>
        </div>
    </div>
    <div class="field-wrap search-input-wrap flex justify-between items-center w-5/12 ml-5">
        <input value="{{  request('search') }}" type="search" name='search' placeholder="Try to search for something"
            class="search-input rounded-lg px-4 py-2 w-full mr-4 focus:border-gray-700 focus:ring-0">
        <button type="submit" class="btn">Search</button>
    </div>
</form>
