<form class="row g-3 text-center" wire:submit.prevent="save">
    <div class="col-md-4">
        <div class="form-floating my-3">
            <input wire:model="name" type="text" class="form-control" id="name" value="{{ $name }}" placeholder="Имя">
            <label for="name">Имя</label>
        </div>
        @error('name')
        <div class="invalid-feedback d-flex">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <div class="form-floating my-3">
            <input wire:model="surname" type="text" class="form-control" id="surname" value="{{ $surname }}" placeholder="Фамилия">
            <label for="surname">Фамилия</label>
        </div>
        @error('surname')
        <div class="invalid-feedback d-flex">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <div class="form-floating my-3">
            <input wire:model="patronymic" type="text" class="form-control" id="patronymic" value="{{ $patronymic }}" placeholder="Отчество">
            <label for="patronymic">Отчество</label>
        </div>
        @error('patronymic')
        <div class="invalid-feedback d-flex">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <div class="my-3">
            <label for="gender">Пол</label>
            <select wire:model="gender" id="gender" class="form-select form-select-lg">
                <option selected>Выберите пол</option>
                <option value="male">Мужской</option>
                <option value="female">Женский</option>
            </select>
        </div>
        @error('gender')
        <div class="invalid-feedback d-flex">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <div class="my-3">
            <label for="salary">Заработная плата</label>
            <input wire:model="salary" type="number" class="form-control form-control-lg" id="salary" value="{{ $salary }}" placeholder="Заработная плата">
        </div>
        @error('salary')
        <div class="invalid-feedback d-flex">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <div class="my-3">
            <label for="departments">Отделы</label>
            <select wire:model="departments" id="departments" class="form-select form-select-lg" multiple>
                @foreach( \App\Models\Departments::all() as $department )
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        @error('departments')
        <div class="invalid-feedback d-flex">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-success mt-5 w-25 mx-auto" type="submit">Сохранить</button>
</form>
