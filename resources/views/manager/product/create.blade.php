<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="w-full max-w-xs">
        <h1>Create Product</h1>
        <form action="{{url('/products')}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Product Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="title" type="text" placeholder="Food Name" required>
            </div>
    
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Price
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="price" type="number" placeholder="Price" required>
            </div>
    
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Stock
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="number" name="stock" placeholder="Stock" required>
            </div>
    
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" placeholder="Description" required></textarea>
            </div>
    
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-state">
                Category
                </label>
                <div class="relative">
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="grid-state" name="category_id" required>
                        @foreach($category as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            <div class="mb-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Product Image</label>
                <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="image">
            </div>
            
            <div class="flex items-center justify-between">
                <input type="submit" value="Add Product">
            </div>
        </form>
    </div>
    
</x-app-layout>

