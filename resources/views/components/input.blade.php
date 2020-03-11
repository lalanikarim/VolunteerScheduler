<input name="{{$property}}"
       type="{{ $type }}"
       @if($editable)
       class="form-control"
       @else
       readonly class="form-control-plaintext"
       @endif
       id="id_{{$property}}"
       value="{{isset($model) && strlen(trim($model)) > 0 ? $model->$property : ''}}"
>
