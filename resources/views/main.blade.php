<!DOCTYPE html>
<html lang="en">

  <head>
    @include('partials._head')
  </head>

  <body>
    {{-- 검색--}}

    <form action="{{ route('search') }}" method="get" class="navbar-form navbar-left">
        <input type="text" name="search" class="form-control" required maxlength="200">&nbsp
        <input type="submit" value="전송" class="btn btn-primary openbutton">
    </form><br>
{{-- 세션'success' --}}
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