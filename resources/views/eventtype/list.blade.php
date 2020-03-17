@extends('layouts.main')

@section('body')
    <div class="card">
        <div class="card-header">Event Types</div>
        <div class="card-body">
            {{ $eventTypes->links() }}
            <table class="table table-borderless table-sm">
                <thead>
                <tr>
                    <th>Event Type</th>
                </tr>
                </thead>
                <tbody>
                @foreach($eventTypes as $eventType)
                    <tr>
                        <th><a href="{{ route('event-type-show',['eventType' => $eventType->id]) }}">{{$eventType->name}}</a></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
