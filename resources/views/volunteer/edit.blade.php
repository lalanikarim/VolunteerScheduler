@extends('layouts.main')

@section('body')
    <div class="card">
        <div class="card-header">Volunteers</div>
        <div class="card-body">
            <x-form method="post"
                    routeNew="volunteer-store"
                    routeEdit="volunteer-update"
                    :paramsEdit="isset($volunteer) ? ['volunteer' => $volunteer->id]:[]"
                    :mode="$mode">
                <div class="form-group row">
                    <label for="id_bar_code" class="col-sm-2 col-form-label">Barcode</label>
                    <div class="col-sm-10">
                        <x-input type="text" :model='$volunteer ?? ""' name="bar_code" :mode="$mode"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                        <x-input type="text" :model='$volunteer ?? ""' name="first_name" :mode="$mode"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputMiddleName" class="col-sm-2 col-form-label">Middle Name</label>
                    <div class="col-sm-10">
                        <x-input type="text" :model='$volunteer ?? ""' name="middle_name" :mode="$mode"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                        <x-input type="text" :model='$volunteer ?? ""' name="last_name" :mode="$mode"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPhone" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                        <x-input type="text" :model='$volunteer ?? ""' name="phone_number" :mode="$mode"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <x-input type="email" :model='$volunteer ?? ""' name="email" :mode="$mode"/>
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
                        <a class="btn btn-primary" href="{{ isset($volunteer) ? route('volunteer-edit',['volunteer' => $volunteer->id]) : ""}}">Edit</a>
                    </div>
                </div>
                </x-slot>
            </x-form>

        </div>
    </div>
@endsection
