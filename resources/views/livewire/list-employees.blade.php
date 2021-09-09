<div class="bg-light">
    <div class="row p-3 my-1 bg-light">
        <div class="col-2 d-flex align-self-center">
            Имя
        </div>
        <div class="col-2 d-flex align-self-center">
            Фамилия
        </div>
        <div class="col-2 d-flex align-self-center">
            Отчество
        </div>
        <div class="col-1 d-flex align-self-center justify-content-center">
            Пол
        </div>
        <div class="col-1 d-flex align-self-center justify-content-center">
            ЗП
        </div>
        <div class="col-2 d-flex align-self-center justify-content-center">
            Отделы
        </div>
        <div class="col-2 d-flex align-self-center justify-content-center">
            Действия
        </div>
    </div>
    @foreach( $employees as $employee )
        <div class="row p-3 my-1 rounded @if ($loop->odd) bg-light @else bg-white @endif">
            <div class="col-2 d-flex align-self-center">
                <a class="text-decoration-none text-dark text-uppercase fw-bold fs-6" href="{{ route('employees.edit', $employee['id']) }}">
                    {{ $employee['name'] }}
                </a>
            </div>
            <div class="col-2 d-flex align-self-center">
                <a class="text-decoration-none text-dark text-uppercase fw-bold fs-6" href="{{ route('employees.edit', $employee['id']) }}">
                    {{ $employee['surname'] }}
                </a>
            </div>
            <div class="col-2 d-flex align-self-center">
                <a class="text-decoration-none text-dark text-uppercase fw-bold fs-6" href="{{ route('employees.edit', $employee['id']) }}">
                    {{ $employee['patronymic'] }}
                </a>
            </div>
            <div class="col-1 d-flex align-self-center justify-content-center">
                <a class="text-decoration-none text-info text-uppercase fw-bold fs-6" href="{{ route('employees.edit', $employee['id']) }}">
                    {{ \App\Models\Employees::gender($employee['gender']) }}
                </a>
            </div>
            <div class="col-1 d-flex align-self-center justify-content-center">
                <a class="text-decoration-none text-warning text-uppercase fw-bold fs-6" href="{{ route('employees.edit', $employee['id']) }}">
                    {{ $employee['salary'] }}
                </a>
            </div>
            <div class="col-2 d-flex align-self-center justify-content-center">
                @foreach( \App\Models\Employees::find($employee['id'])->departments as $department )
                    @if ( $loop->last)
                        {{ $department->name }}
                    @else
                        {{ $department->name }},
                    @endif
                @endforeach
            </div>
            <div class="col-2 d-flex align-self-center justify-content-center">
                <a class="btn btn-sm btn-info p-2 m-1" href="{{ route('employees.edit', $employee['id']) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                    </svg>
                </a>
                <button wire:click="delete({{$employee['id']}})" class="btn btn-sm btn-danger p-2 m-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </button>
            </div>
        </div>
    @endforeach
</div>