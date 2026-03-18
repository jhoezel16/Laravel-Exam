
@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div class="w-90 p-4 rounded text-start bg-primary text-white" style="max-width: 400px;">
        <h3 class="fw-bold mb-3">Login and Smile!</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </ul>
            </div>
        @endif

            <button type="submit" class="btn btn-light fw-bold w-100">Login</button>
        </form>
    </div>
</div>
@endsection