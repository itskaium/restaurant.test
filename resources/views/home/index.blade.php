<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                <a href="{{url('mycart')}}">
                   Cart [ {{$count}}]
                </a>
                <a href="{{url('myorder')}}">
                   My Order
                </a>
                @auth
                <a
                {{-- {{$current_user->role}} --}}
                href="/"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <h1>Welcome To Shawarma'z</h1>

    <h3>Food Menu</h3>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card m-4">
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                        {{-- <a href="{{ url('/product_details', $product->id) }}" class="">View Details</a> --}}
                        <a class="m-2" href="{{url('add_cart', $product->id)}}">
                            Add to cart
                          </a>
                        {{-- <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success">Add to Cart</button>
                        </form> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>