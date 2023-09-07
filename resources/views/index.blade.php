{{-- <x-app-layout> --}}
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
                  @if(Auth::check())

                  <li>
                    <a href="{{route('logout')}}" class="nav-link"> Logout</a>
                  </li>
                    @else
                    <li>
                        <a href="{{route('login')}}" class="nav-link"> Login</a>
                      </li>
                      <li>
                        <a href="{{route('register')}}" class="nav-link"> Register</a>
                      </li>
                      @endif
                </ul>
                <form class="d-flex" role="search" action="{{ route('product.search') }}" method="GET">
                    <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                    <a href="{{ route('cart.index') }}" class="btn btn-outline-success">Cart <span class="badge bg-success"></span></a>
              </div>
            </div>
          </nav>
          {{-- <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot> --}}

          <div class="main">
            <div class="container">
                <div class="row">
                    @if($products->count() == 0)
                        <h1>No products found</h1>
                    @else
                    @foreach($products as $product)
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $product->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">
                            {{
                                strlen($product->name) > 20 ?
                                substr($product->name, 0, 20) . '...' :
                                $product->name
                             }}
                        </h5>
                          <p class="card-text">
                            {{
                                strlen($product->description) > 50 ?
                                substr($product->description, 0, 50) . '...' :
                                $product->description
                             }}
                        </p>
                          <a href="product/{{ $product->id }}" class="btn btn-primary">Details</a>
                        </div>
                      </div>
                    @endforeach
                    @endif
                </div>
            </div>
          </div>
        <script src="/bootstrap-5.3.1-dist/js/bootstrap.js"></script>
    </body>
</html>


{{-- </x-app-layout> --}}









