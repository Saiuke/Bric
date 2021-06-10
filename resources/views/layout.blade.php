<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Bric</title>
   <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Bric</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="btn btn-outline-primary" href="{{ route('reviews.index')}}">List Reviews</a>
    <a class="btn btn-outline-primary" href="{{ route('reviews.create')}}">Submit new review</a>
  </nav>
</div>
   <div class="container">
      @yield('content')
   </div>
   <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>