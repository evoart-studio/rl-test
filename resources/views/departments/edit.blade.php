@extends('layouts.app')

@section('title', 'Добавить отдел - ' . config('app.name'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <livewire:add-department :department="$department" />
        </div>
    </div>
@endsection
