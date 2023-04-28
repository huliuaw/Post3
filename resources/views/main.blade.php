<!DOCTYPE html>
<html lang="en">

  <head>
    @include('partials._head')
  </head>

  <body>

    <div class="container">
      
        @if (Session::has('success'))

        <div class="alert alert-success" role="alert">
            <strong>Success!!!</strong> {{ Session::get('success') }}
        </div>
    
    @endif
    
    @if (count($errors) > 0)
    
        <div class="alert alert-danger" role="alert">
            <strong>Errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    
    @endif
{{-- 여기가 컨텐츠 --}}
      @yield('content')

      <br><br><br><br><br><br><br>
      <hr> 
      <p class="text-center">Copyright &copy Tree&Saw</p>
  
  </div>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      @yield('scripts')

  </body>
</html>