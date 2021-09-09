@extends('layouts.app')

@section('title', 'Отделы - ' . config('app.name'))

@section('content')
    <div class="container">
        <div class="row my-2 justify-content-end">
            <div class="col-1 text-end">
                <a href="{{ route('departments.add') }}" class="btn btn-success btn-sm">+</a>
            </div>
        </div>

        <livewire:list-departments />
    </div>
@endsection
