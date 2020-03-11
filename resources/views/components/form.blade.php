@if($mode == 'new')
<form action="{{ route($routeNew) }}" method="{{ $method }}">
@elseif($mode == 'edit')
<form action="{{ route($routeEdit,$paramsEdit) }}" method="{{ $method }}">
@endif
@if($isForm)
    @csrf
@endif
    {{ $slot }}
@if($isForm)
    {{ $formButtons }}
@else
    {{ $buttons }}
@endif
@if($isForm)
</form>
@endif
