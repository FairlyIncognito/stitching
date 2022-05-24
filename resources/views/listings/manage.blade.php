<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                xStitch Manager
            </h1>
        </header>

        <form method="POST" action="/listings" class="flex justify-center w-full space-x-6">
            @csrf
            <div class="inline">
                <label
                    for="number"
                    class="inline-block text-lg mb-2"
                    >Number</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="number"
                    value="{{ old('number') }}"
                />
                
                @error('number')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="inline">
                <label
                    for="name"
                    class="inline-block text-lg mb-2"
                    >Name</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name"
                    value="{{ old('name') }}"
                />
                
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="inline">
                <label
                    for="color"
                    class="inline-block text-lg mb-2"
                    >Color</label
                >
                <input
                    type="color"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="color"
                    value="{{ old('color') }}"
                />
                
                @error('color')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="inline-block">
                <label
                    for="in_stock"
                    class="inline text-lg mb-2"
                >
                    In Stock?
                </label>

                <select name="in_stock" class="border border-gray-200 rounded p-2 w-full">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                
                @error('in_stock')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-7">
                <button
                    type="submit"
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black inline flex-end"
                >
                    Add
                </button>
            </div>
        </form>

        <div class="table w-full p-2">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-50 border-b">
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Number
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Name
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Color
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Stock
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Actions
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @unless($listings->isEmpty())
                        

                        @foreach ($listings as $listing)
                            <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r">{{ $listing->number }}</td>
                                <td class="p-2 border-r">{{ $listing->name }}</td>
                                <td class="p-2 border-r"><input type="color" value="{{ $listing->color }}" /></td>
                                
                                <td class="p-2 border-r">
                                    @if($listing->in_stock == 1)
                                        Yes
                                    @elseif($listing->in_stock == 0)
                                        No
                                    @endif
                                </td>
                   
                                <td>
                                    <a href="/listings/{{ $listing->id }}/edit" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                                    <a href="/listings/{{ $listing->id }}/delete" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else  
                            <tr>
                                <td>
                                    <p>
                                        Nothing was found.
                                    </p>
                                </td>
                            </tr>
                    @endunless
                </tbody>
            </table>
        </div>
    </x-card>
</x-layout>