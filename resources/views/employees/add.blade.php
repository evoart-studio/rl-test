@extends('layouts.app')

@section('title', 'Добавить сотрудника - ' . config('app.name'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <livewire:add-employee :employee="false" />
        </div>
    </div>
@endsection
