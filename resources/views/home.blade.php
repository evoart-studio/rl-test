@extends('layouts.app')

@section('title', 'Главная страница - ' . config('app.name'))

@section('content')
<div class="container">
    <div class="row">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Сотрудник</th>
                    @foreach( $departments as $department )
                        <th class="text-center" scope="col">{{ $department->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach( $employees as $employee )
                    <tr>
                        <td>{{ $employee->name }} {{ $employee->surname }} {{ $employee->patronymic }}</td>
                        @foreach( $departments as $department )
                            <td class="text-center">
                                @if ( $employee->departments->contains($department->id) )
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-square" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
                                    </svg>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">{{ $employees->count() }}</th>
                    @foreach( $departments as $department )
                        <th class="text-center" scope="col">{{ $department->employees->count() }}</th>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
