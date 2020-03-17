@php
    if(!isset($eventType)) {
        $eventType = null;
    }
@endphp
@extends('layouts.main')

@section('body')
    <div class="card">
        <div class="card-header">Event Types</div>
        <div class="card-body">
            <x-form method="post"
                    routeNew="event-type-store"
                    routeEdit="event-type-update"
                    :paramsEdit="isset($eventType) ? ['eventType' => $eventType->id]:[]"
                    :mode="$mode">
                <div class="form-group row">
                    <label for="id_name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <x-input type="text" :model='$eventType' name="name" :mode="$mode"/>
                    </div>
                </div>

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
                            <a class="btn btn-primary" href="{{ isset($eventType) ? route('event-type-edit',['eventType' => $eventType->id] ) : "" }}">Edit</a>
                        </div>
                    </div>
                </x-slot>
            </x-form>
        </div>
    </div>
@endsection
