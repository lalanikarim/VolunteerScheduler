@extends('layouts.main')

@section('body')
    <div class="card">
        <div class="card-header">Volunteers</div>
        <div class="card-body">
            {{ $volunteers->links() }}
            <table class="table">
                <thead>
                <tr>
                    <th>Barcode</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($volunteers as $volunteer)
                <tr>
                    <th><a href="{{ route('volunteer-show',['volunteer' => $volunteer->id]) }}">{{$volunteer->bar_code}}</a></th>
                    <td>{{$volunteer->first_name}} {{$volunteer->middle_name}} {{ $volunteer->last_name }}</td>
                    <td>{{$volunteer->phone_number}}</td>
                    <td></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
