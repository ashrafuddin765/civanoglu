<x-guest-layout>
    {{-- Breadcrumb --}}
    <div class="shadow-md border-2 border-gray-300 py-2 bg-white mt-28">
        <div class="container mx-auto">
            <ul class="flex items-center">
                <li><a class="text-base text-red-800" href="{{ route('home') }}">Property</a></li>
                <li class="mx-3"><i class="fa fa-angle-right"></i></li>
                <li>Properties</li>
            </ul>
        </div>
    </div>

    <!-- Title & Share -->

    <div class="bg-white py-8">
        <div class="container mx-auto">
            <div class="flex justify-between">
                <div class="w-8/12">
                    <h2 class="text-3xl text-gray-600">Properties
                        @if ('0' == request('type'))
                            - Land
                        @elseif('1' == request('type'))
                            - Apertment
                        @elseif('2' == request('type'))
                            - Villa
                        @endif

                    </h2>

                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container mx-auto py-10">
        <div class="flex justify-between">

            {{-- Left Content --}}
            <div class="w-9/12">
                <div class="flex -mx-2 justify-between flex-wrap mt-10">

                    @foreach ($latest_properties as $property)

                        @include('components.single-property-card', ['property', $property])

                    @endforeach

                </div>

                {{ $latest_properties->links() }}

            </div>{{-- Left Content End --}}



            {{-- Sidebar --}}
            <div class="w-3/12 ml-6 vertical-searchform">
                @include('components.property-search-form')

            </div>


        </div>

    </div>
</x-guest-layout>
