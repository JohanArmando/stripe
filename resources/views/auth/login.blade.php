@extends('template')
    @section('content')
    <div class="container" style="margin : 10%;">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3 class="col-md-offset-4">Login Payment</h3>
                <form method="POST" action="{{ url('/auth/login') }}">
                {!! csrf_field() !!}

                <div>
                    Email
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>

                <div>
                    Password
                    <input type="password" class="form-control"name="password" id="password">
                </div>

                <div>
                    <input type="checkbox" name="remember"> Remember Me
                </div>
 
                <div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
            </div>
        </div>
    </div>

@endsection