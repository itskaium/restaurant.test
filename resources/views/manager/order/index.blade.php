<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <h1>Order Management</h1>

    <div class="py-3">
        <table class="table table-dark text-center">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Person Name</th>
                <th scope="col">Product Name</th>
                <th scope="col">Place</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Change Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $orders)
                    <tr>
                        <th>{{$orders->id}}</th>
                        <td>{{$orders->name}}</td>
                        <td>{{$orders->product->title}}</td>
                        <td>{{$orders->place}}</td>
                        <td>{{$orders->product->price}}</td>
                        <td>{{$orders->status}}</td>
                        <td>
                            <a href="{{url('onTheWay', $orders->id)}}">On The Way</a>
                            <a href="{{url('delivered', $orders->id)}}">Delivered</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</x-app-layout>