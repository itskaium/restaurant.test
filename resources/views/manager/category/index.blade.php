<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <h1 class="text-white">
        Add Category
    </h1>

    <div class="dev_deg">
        <form action="{{url('category')}}" method="POST">
            @csrf
            <div>
                <input type="text" name="category" placeholder="Category Name">
                <input class="btn btn-primary" type="submit" value="Add Category">
            </div>
        </form>
    </div>

    <br>
    <br>

    <div class="py-3">
        <table class="table table-dark text-center">
            <thead>
              <tr>
                <th scope="col">Category Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($category as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>
                            <a class="btn btn-success" href="{{url('/edit_category', $category->id)}}">Edit</a>
                        </td>
                        <td>
                            <a href="{{url('/delete_category', $category->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>