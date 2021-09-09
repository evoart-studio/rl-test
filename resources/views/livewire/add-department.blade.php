<form class="g-3 text-center" wire:submit.prevent="save">
    <div class="form-floating my-3">
        <input wire:model="name" type="text" class="form-control" id="name" value="{{ $name }}" placeholder="Название отдела">
        <label for="name">Название отдела</label>
    </div>
    @error('name')
        <div class="invalid-feedback d-flex">{{ $message }}</div>
    @enderror
    <button class="btn btn-success mt-5" type="submit">Сохранить</button>
</form>
