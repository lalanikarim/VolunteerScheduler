<input name="{{$name}}"
    type="text"
    @if($editable)
       class="form-control"
   @else
       readonly class="form-control-plaintext"
   @endif
   id="id_{{$name}}"
   value="{{$value}}"
>
