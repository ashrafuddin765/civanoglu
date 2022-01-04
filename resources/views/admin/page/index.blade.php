<x-app-layout>
    @flasher_render
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Pages') }}
            </h2>
            <div class="min-w-max">
                <a class="fullwidth-btn" href="{{ route('add-location') }}">Add new Page</a>
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
                                </th>
                                <th style="width:250px" class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)

                                <tr>
                                    <td class=" border px-4 py-2">{{ $page->name }}</td>
                                    <td class=" border px-4 py-2 text-center ">
                                        <a href="{{ route('dashboard-page.edit', $page->id) }}"
                                            class="bg-blue-500 py-2 px-4 text-sm rounded text-white">Edit</a>
                                        <a href="{{ route('page', $page->slug) }}" target="__blank"
                                            class="bg-green-500 py-2 px-4 text-sm rounded text-white">View</a>
                                        <form class="inline-block"
                                            action="{{ route('dashboard-page.destroy', $page->id) }}" method="post"
                                            onsubmit="return confirm('Do you want to delete this page?')">
                                            @csrf @method('DELETE')
                                            <button style="line-height:1" type="submit"
                                                class="bg-red-500 inline py-2 px-4 text-sm rounded text-white">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $pages->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
