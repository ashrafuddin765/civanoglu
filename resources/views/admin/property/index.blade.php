<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Properties') }}
            </h2>
            <div class="min-w-max">
                <a class="fullwidth-btn" href="{{ route('add-property') }}">Add new property</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Location</th>
                                <th class="border px-4 py-2">Price</th>
                                <th style="width:250px" class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $property)
                                
                            <tr>
                                <td class=" border px-4 py-2">{{$property->name}}</td>
                                <td class=" border px-4 py-2">{{$property->location->city}}</td>
                                <td class=" border px-4 py-2">{{ $property->price }}</td>
                                <td class=" border px-4 py-2 text-center ">
                                    <a href="{{ route('edit-property', $property->id) }}" class="bg-blue-500 py-2 px-4 text-sm rounded text-white">Edit</a>
                                    <a href="{{ route('single-property', $property->id) }}" target="__blank" class="bg-green-500 py-2 px-4 text-sm rounded text-white">View</a>
                                    <form class="inline-block" action="{{route('delete-property', $property->id)}}" method="post" onsubmit="return confirm('Do you want to delete this property?')">
                                        @csrf
                                        <button style="line-height:1" type="submit" class="bg-red-500 inline py-2 px-4 text-sm rounded text-white">Delete</button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$properties->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
