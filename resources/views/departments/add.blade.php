@extends('layouts.app')

@section('title', 'Изменить отдел - ' . config('app.name'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <livewire:add-department :department="false" />
        </div>
    </div>
@endsection
