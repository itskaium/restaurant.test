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
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Remove</th>
              </tr>
            </thead>
            <tbody>
    
                <?php
                    $value = 0
                ?>
                
    
                @foreach ($cart as $cart)
                    <tr>
                        <td>{{$cart->product->title}}</td>
                        <td>
                            {{$cart->product->price}}
                        </td>
                        <td>
                            <a href="{{url('delete_cart', $cart->id)}}" class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                    <?php
                        $value = $value + $cart->product->price
                    ?>
                    
                @endforeach
            </tbody>
        </table>
    </div>
    
    <h3 class="text-center">Total Value of your product : ${{$value}}</h3>


    <div class="text-center">
        <form action="{{url('confirm_order')}}" method="POST">
          @csrf
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter Name" name="name">
          </div>
          <div class="form-group">
            <select name="place">
                <option>Dine In</option>
                <option>Take Away</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Confirm Order</button>
        </form>
      </div>
</body>
</html>