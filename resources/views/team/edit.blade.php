@php
    if(!isset($team)) {
        $team = null;
    }
@endphp
@extends('layouts.main')

@section('body')
    <div class="card">
        <div class="card-header">Teams</div>
        <div class="card-body">
            <x-form method="post"
                    routeNew="team-store"
                    routeEdit="team-update"
                    :paramsEdit="isset($team) ? ['team' => $team->id]:[]"
                    :mode="$mode">
                <div class="form-group row">
                    <label for="id_name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <x-input type="text" :model='$team' name="name" :mode="$mode"/>
                    </div>
                </div>
                @if(($mode == 'show' && isset($team->lead_id)) || ($mode != 'show' && $volunteers->count() > 0))
                <div class="form-group row">
                    <label for="sel_lead_id" class="col-sm-2 col-form-label">Lead</label>
                    <div class="col-sm-10">
                        <x-select
                            property="lead_id"
                            :items="$volunteers"
                            idprop="id"
                            valueprop="fullName"
                            :valueisfunction="true"
                            :model="isset($team) && isset($team->lead_id)?$team->lead:null"
                            :mode="$mode"
                        />
                    </div>
                </div>
                @endif
                <x-slot name="formButtons">
                    <div class="form-group row">
                        <div class="col-sm-10 offset-2">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-danger" type="reset">Reset</button>
                        </div>
                    </div>
                </x-slot>
                <x-slot name="buttons">
                    <div class="form-group row">
                        <div class="col-sm-10 offset-2">
                            <a class="btn btn-primary" href="{{ isset($team) ? route('team-edit',['team' => $team->id]) : ""}}">Edit</a>
                        </div>
                    </div>
                </x-slot>
            </x-form>

            @if($mode == 'show' && $volunteers->count() > 0)
                <x-list-selector
                    :left="$volunteers"
                    :right="$team->volunteers"
                    idProp="id"
                    showProp="fullName"
                    :isShowMethod="true"
                    size="20"
                    :addRoute="route('team-volunteers',['team'=>$team->id])"
                    :addRouteParams='"\"_token\":\"" . csrf_token() . "\",\"action\":\"add\""'
                    :removeRoute="route('team-volunteers',['team'=>$team->id])"
                    :removeRouteParams='"\"_token\":\"" . csrf_token() . "\",\"action\":\"remove\""'
                    itemsParamName="volunteers"
                />
            @endif
        </div>
    </div>
@endsection
