<td>
<form class="form-inline"
      action="{{ route('volunteer-team',['volunteer'=>$volunteer->id]) }}"
      method="post">
    <div class="col-sm-5">
    @csrf
    <input type="hidden" name="action" value="{{ $action }}">
    @if($action == 'remove')

            <label class="col-form-label justify-content-start">{{ $team->name }}</label>
            <input type="hidden" name="team_id" value="{{ $team->id }}">

    @else
    <select name="team_id" class="custom-select">
        <option></option>
        @foreach($teams as $team)
            <option value="{{ $team->id }}">{{ $team->name }}</option>
        @endforeach
    </select>
    @endif
    </div>
    <div class="col-sm-2">
    <button class="btn btn-primary" type="submit">
        {{ $action == "add" ? "+" : "X" }}
    </button>
    </div>
</form>
</td>


