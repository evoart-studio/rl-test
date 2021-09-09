<?php

namespace App\Http\Livewire;

use App\Models\Departments;
use Livewire\Component;

class AddDepartment extends Component
{
    public string $name = "";

    public string $mode = "add";

    public int $department_id = 0;

    protected $listeners = [
        '$refresh'
    ];

    public function mount($department)
    {
        if ( $department ) {
            $this->name = $department->name;
            $this->department_id = $department->id;
            $this->mode = "edit";
        }
    }

    protected array $rules = [
        'name' => 'required|unique:departments'
    ];

    protected array $validationAttributes = [
        'name' => 'Название отдела'
    ];

    protected array $messages = [
        'name.required' => 'Название отдела обязательно к заполнению',
        'name.unique' => 'Такой отдел уже существует',
    ];

    public function save()
    {
        $validatedData = $this->validate();

        if ( $this->mode == 'add' ) {
            Departments::create($validatedData);
            $this->emitTo('alerts', 'alert', 'success', 'Отдел успешно добавлен');
            $this->reset();
        } else {
            $department = Departments::find($this->department_id);
            $department->update($validatedData);
            $this->emitTo('alerts', 'alert', 'info', 'Отдел успешно изменен');
        }
        //return redirect()->to(route('departments.index'));
    }

    public function render()
    {
        return view('livewire.add-department');
    }
}
