<?php

namespace App\Http\Livewire;

use App\Models\Departments;
use Livewire\Component;

class ListDepartments extends Component
{
    public array $departments;

    public function mount()
    {
        $this->departments = Departments::all()->toArray();
    }

    public function delete($id)
    {
        $department = Departments::find($id);

        if( $department->employees->count() > 0 ) {
            $this->emitTo('alerts', 'alert', 'warning', 'Нельзя удалить отдел, в котором есть сотрудники');
        } else {
            $department->delete();
            $this->departments = Departments::all()->toArray();
            $this->emitTo('alerts', 'alert', 'info', 'Отдел удален успешно');
        }


    }

    public function render()
    {
        return view('livewire.list-departments');
    }
}
