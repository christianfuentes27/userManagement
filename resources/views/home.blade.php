@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <br>
                <form action="{{ url('logout') }}" method="post">
                    @csrf
                    <input class="btn btn-primary m-3" type="submit" value="Logout"/>
                </form>
                <br>
                @if(!Auth::user()->hasVerifiedEmail())
                    You are not verified, please
                    <a href="{{ url('email/verify') }}">verify</a> your email.
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
