<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="py-3">
        <table class="table table-dark text-center">
            <thead>
              <tr>
                <th scope="col">Person Name</th>
                <th scope="col">Product Name</th>
                <th scope="col">Place</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->product->title}}</td>
                        <td>
                            {{$order->place}}
                        </td>
                        <td>
                            {{$order->status}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>