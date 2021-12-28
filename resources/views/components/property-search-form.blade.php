<form action="{{ route('properties') }}" method="GET" class="property-searchform flex justify-between">

    <div class="search-wrapper flex w-7/12 justify-between items-center">
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
                <option value="0">Land</option>
                <option value="1">Apertment</option>
                <option value="2">Villa</option>
            </select>
        </div>
        <div class="py-3 self-center border-gray-500 border field-border"></div>
        <div class="field-wrap flex flex-col mx-3">
            <label for="price">Price</label>
            <select name="price" class="border-0 focus:ring-0">
                <option value="">Price</option>
                <option value="100000">0 - 100000</option>
                <option value="200000">100000 - 200000</option>
                <option value="300000">200000 - 300000</option>
                <option value="400000">300000 - 400000</option>
                <option value="500000">400000 - 500000</option>
                <option value="500000">500000+</option>


            </select>
        </div>
        <div class="py-3 self-center border-gray-500 border field-border"></div>
        <div class="field-wrap flex flex-col mx-3">
            <label for="bedrroms">Bedrooms</label>
            <select name="bedrooms" class="border-0 focus:ring-0">
                <option value="">Bedrooms</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>
    </div>
    <div class="field-wrap search-input-wrap flex justify-between items-center w-5/12 ml-5">
        <input type="search" name='search' placeholder="Try to search for something"
            class="search-input rounded-lg px-4 py-2 w-full mr-4 focus:border-gray-700 focus:ring-0">
        <button type="submit" class="btn">Search</button>
    </div>
</form>
