@extends('main')

    @section('stylesheets')

    @endsection

    @section('title', ' | About')

    @section('content')
        <div class="row" style="padding: 20px">
            <div class="col-md-12"> 
                <h1>Login Please</h1>
                <hr>
                <div class="lead" style="text-align: center">
                     <br><br><br>
                   <a href="login">로그인</a>
                    <br><br><br> 
       
                    <img src="{{url('/images/1.jpg')}}" alt="Image"/>
                    {{-- <img src="{{ asset('/images/2.jpg') }}">  --}}
                </div>
            </div> 
        </div>
    @endsection

    @section('scripts')

    @endsection