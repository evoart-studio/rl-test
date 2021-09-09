@extends('layouts.app')

@section('title', 'Изменить сотрудника - ' . config('app.name'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <livewire:add-employee :employee="$employee" />
        </div>
    </div>
@endsection
