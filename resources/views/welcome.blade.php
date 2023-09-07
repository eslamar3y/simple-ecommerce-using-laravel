<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="/bootstrap-5.3.1-dist/css/bootstrap.css">
        <link rel="stylesheet" href="/style/index.css">

    </head>
    <body >
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
              <a class="navbar-brand" href="/">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/dashboard">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/dashboard/products">products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/dashboard/users">users</a>
                  </li>
                  <li>
                    <a href="{{route('logout')}}" class="nav-link"> Logout</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <div class="container">
            <h3 class="text-center mt-5">
                welcome to dashboard, {{ Auth::user()->name }}
            </h3>
          </div>

        <script src="/bootstrap-5.3.1-dist/js/bootstrap.js"></script>
    </body>
</html>
