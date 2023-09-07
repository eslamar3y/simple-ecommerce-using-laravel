{{-- display message --}}
@if(session()->has('success'))
    <div class="alert alert-success" style="position: absolute;
    z-index: 10;
    right: 1%;
    top: 10%;">
        {{ session()->get('success') }}
    </div>
    {{-- make it disappear after 3 sec --}}
    <script>
        setTimeout(() => {
            document.querySelector('.alert').remove();
        }, 3000);
    </script>
@endif


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="/bootstrap-5.3.1-dist/css/bootstrap.css">
        <link rel="stylesheet" href="/style/index.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand" href="/home">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>

            </ul>

                <a href="{{ route('cart.index') }}" class="btn btn-outline-success">Cart <span class="badge bg-success"></span></a>
          </div>
        </div>
      </nav>
<div class="container mt-5">
    <table class="table table-striped" style="vertical-align: middle">
        <thead>
            <tr>
                {{-- <th>image</th>
                <th>Product name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>total price</th>
                <th>delete</th> --}}
                <th></th>
                <th> </th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @if($cartItems->count() > 0)
            @foreach ($cartItems as $item)
            @php
            $total += $item->total
            @endphp
            <tr>
                <td><img src="{{ $item->product->image }}" alt="" width="100px" height="100px"></td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->total }}</td>
                <td>
                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">delete</button>
                    </form>
                </td>

            </tr>
            @endforeach
            <tr>
                <td  class="text-end">Total</td>
                <td colspan="2"> {{$total}} </td>
                <td colspan="2" class="text-end">
                    <a href="#" class="btn btn-primary">Checkout</a>
                    {{-- <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Checkout</a> --}}
                </td>
                <td></td>
            </tr>
            @else
            <tr>
                <td colspan="6" class="text-center">No items in cart</td>
            </tr>

            @endif
        </tbody>
    </table>
</div>
<script src="/bootstrap-5.3.1-dist/js/bootstrap.js"></script>
</body>
</html>
