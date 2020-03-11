@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('partials.navigation')
            </div>

            <div class="col-md-9">
                @include('partials.toaster')
                @yield('body')
            </div>
        </div>
    </div>
@endsection
