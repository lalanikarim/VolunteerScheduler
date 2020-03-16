@if($mode != "show")
<select class="custom-select"
        name="{{ $property }}"
        id="sel_{{ $property }}">
    <option value=""></option>
    @foreach($items as $item)
        <option value="{{$item->$idprop}}"
            @if(isset($model) && $model->$idprop == $item->$idprop)
                selected
            @endif
        >{{ $valueisfunction ? $item->$valueprop() : $item->$valueprop }}</option>
    @endforeach
</select>
@else
    @if(isset($model) && strlen(trim($model)) > 0)
    <input type="text"
           readonly class="form-control-plaintext"
           value="{{$valueisfunction ? $model->$valueprop() : $model->$valueprop}}"
    >
    @endif
@endif
