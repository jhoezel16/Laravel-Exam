
@extends('layouts.app')
@section('content')
   
            <div id="header" class = "text-center">
                <div class="row">
                    <div class="col-md-8">
                        <div class="p-3 text-center"> <h4>Your Random Jokes!</h5></div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 ">
                            <div class="btn-group" role="group" aria-label="buttons">
                                <button type="button" class="btn btn-primary" id="refresh-jokes">Refresh</button>
                                <button type="button" class="btn btn-warning" id="logout">Logout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="jokes-display">

            </div>
@endsection
@section('scripts')
    @vite(['resources/js/exam.js'])
@endsection