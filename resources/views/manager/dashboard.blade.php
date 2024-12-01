<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <a class="btn btn-success" href="/category">Category</a>
    <a class="btn btn-success" href="/products">Product</a>
    <a class="btn btn-success" href="/orders">Order</a>
</x-app-layout>
