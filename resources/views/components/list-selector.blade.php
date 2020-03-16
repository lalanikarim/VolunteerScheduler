<div class="row">
    <div class="col-sm-5">
        <label for="sel_left">Available</label>
    </div>
    <div class="col-sm-2">

    </div>
    <div class="col-sm-5">
        <label for="sel_right">Selected</label>
    </div>
</div>
<div class="row">
    <div class="col-sm-5">
        <select class="form-control" multiple name="" id="sel_left" size="{{ $size }}">
            @foreach($left as $item)
                @if(!in_array($item->$idProp, $rightIds))
                <option value="{{ $item->$idProp }}">{{ $isShowMethod ? $item->$showProp() : $item->$showProp }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-sm-2 align-self-center text-center">
        <div class="btn-group-vertical w-75" role="group">
            <button class="btn btn-primary" onclick="listaction('{{$addRoute}}','{{$itemsParamName}}', $.map($('#sel_left :selected'),function(item){ return item.value;}),'{{ $addRouteParams }}')">&gt;&gt;</button>
            <button class="btn btn-primary" onclick="listaction('{{$removeRoute}}','{{$itemsParamName}}',$.map($('#sel_right :selected'),function(item){ return item.value;}),'{{ $removeRouteParams }}')">&lt;&lt;</button>
        </div>
    </div>
    <div class="col-sm-5">
        <select class="form-control" multiple name="" id="sel_right" size="{{ $size }}">
            @foreach($right as $item)
                <option value="{{ $item->$idProp }}">{{ $isShowMethod ? $item->$showProp() : $item->$showProp }}</option>
            @endforeach
        </select>
    </div>
</div>
