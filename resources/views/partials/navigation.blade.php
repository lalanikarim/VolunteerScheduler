<div class="card">
    <div class="card-header">Menu</div>

    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            Volunteers<br/>
            <a href="{{route('volunteer-list')}}">List</a><br/>
            <a href="{{route('volunteer-new')}}">New</a><br/>
        </li>
    </ul>
</div>

<div class="card mt-4">
    <div class="card-header">Admin</div>

    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            Teams<br/>
            <a href="{{route('team-list')}}">List</a><br/>
            <a href="{{route('team-new')}}">New</a><br/>
            <br/>
            Event Types<br/>
            <a href="{{route('event-type-list')}}">List</a><br/>
            <a href="{{route('event-type-new')}}">New</a><br/>
        </li>
    </ul>
</div>
