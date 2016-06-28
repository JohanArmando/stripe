
@extends('template')
    @section('content')
    <div class="container" style="margin : 10%;">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3 class="col-md-offset-4">Register Payment</h3>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ url('/auth/register') }}">
                {!! csrf_field() !!}

                <div>
                    Name
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>

                <div>
                    Email
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>

                <div>
                    Password
                    <input type="password"  class="form-control" name="password">
                </div>

                <div>
                    Confirm Password
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-success">Register</button>
                </div>
            </form>
        </div>
    </div>

@endsection