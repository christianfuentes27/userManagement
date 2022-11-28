@extends('layouts.app')

@section('content')
    <div>
    <form action="{{ url('admin') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input value="{{ old('name') }}" required type="text" minlength="2" maxlength="100" class="form-control" id="nombre" name="name" placeholder="Name">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input value="{{ old('email') }}" required type="text" minlength="2" maxlength="100" class="form-control" id="precio" name="email" placeholder="Email">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input required type="text" class="form-control" id="password" name="password" placeholder="Password">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
        &nbsp;
        <a href="{{ url('admin') }}" class="btn btn-primary">Back</a>
    </form>
</div>
@endsection