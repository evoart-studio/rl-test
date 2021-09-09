<?php

namespace App\Http\Livewire;

use App\Models\Employees;
use Livewire\Component;

class ListEmployees extends Component
{
    public array $employees;

    public function mount()
    {
        $this->employees = Employees::all()->toArray();
    }

    public function delete($id)
    {
        $employee = Employees::find($id);
        $employee->departments()->detach();
        $employee->delete();

        $this->employees = Employees::all()->toArray();
        $this->emitTo('alerts', 'alert', 'info', 'Сотрудник удален успешно');
    }

    public function render()
    {
        return view('livewire.list-employees');
    }
}
