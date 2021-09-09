@extends('layouts.app')

@section('title', 'Сотрудники - ' . config('app.name'))

@section('content')
    <div class="container">
        <div class="row my-2 justify-content-end">
            <div class="col-1 text-end">
                <a href="{{ route('employees.add') }}" class="btn btn-success btn-sm">+</a>
            </div>
        </div>

        <livewire:list-employees />
    </div>
@endsection
