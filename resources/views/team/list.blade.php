@extends('layouts.main')

@section('body')
    <div class="card">
        <div class="card-header">Teams</div>
        <div class="card-body">
            {{ $teams->links() }}
            <table class="table">
                <thead>
                <tr>
                    <th>Team</th>
                    <th>Lead</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                    <tr>
                        <th><a href="{{ route('team-show',['team' => $team->id]) }}">{{$team->name}}</a></th>
                        <td><a href="{{ route('volunteer-show', ['volunteer' => $team->lead_id]) }}">{{$team->lead->fullName()}}</a></td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
