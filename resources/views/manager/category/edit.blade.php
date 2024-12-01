<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <h1 class="text-white">
        Update Category
    </h1>
    
    <div>
        <form action="{{url('/update_category',$data->id)}}" method="POST">
            @csrf
            <div>
                <input type="text" name="category" value="{{$data->name}}">
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
        </form>
    </div>

</x-app-layout>
