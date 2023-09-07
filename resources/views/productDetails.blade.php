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

          <div class="main">
            <div class="container">
                <div class="row">

                      <div class="col-4">
                        <img src="{{ $product->image }}" class="card-img-top" alt="...">
                      </div>
                      <div class="col-6">
                        <h2 class="mt-5">
                            {{ $product->name }}
                        </h2>
                        <p class="fw-bolder mt-5">
                            {{ $product->price }}$
                        </p>
                        <p class="mt-5">

                            {{ $product->description }}
                        </p>
                        <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="post">
                            @csrf
                            <input type="number" name="quantity" value="1">
                            <button class="btn btn-primary m-5">Add to Cart</button>
                        </form>
                      </div>


                    </div>
            </div>
          </div>
        <script src="/bootstrap-5.3.1-dist/js/bootstrap.js"></script>
    </body>
</html>












