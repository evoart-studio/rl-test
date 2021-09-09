<?php

namespace App\Http\Livewire;

use App\Models\Employees;
use Livewire\Component;

class AddEmployee extends Component
{
    public string $name = "";
    public string $surname = "";
    public string $patronymic = "";
    public string $gender = "";
    public int $salary = 0;
    public array $departments = [];

    public string $mode = "add";

    public int $employee_id = 0;

    protected $listeners = [
        '$refresh'
    ];

    public function mount($employee)
    {
        if ( $employee ) {
            $this->name = $employee->name;
            $this->surname = $employee->surname;
            $this->patronymic = $employee->patronymic;
            $this->gender = $employee->gender;
            $this->salary = $employee->salary;
            $this->employee_id = $employee->id;
            $this->mode = "edit";

            $this->departments = $employee->departments()->pluck('id')->toArray();
        }
    }

    protected array $rules = [
        'name' => 'required|alpha_dash',
        'surname' => 'required|alpha_dash',
        'patronymic' => 'alpha_dash',
        'salary' => 'numeric|min:0',
        'departments' => 'required',
    ];

    protected array $validationAttributes = [
        'surname' => 'Фамилия',
        'patronymic' => 'Отчество',
        'salary' => 'Заработная плата',
        'departments' => 'Отделы',
    ];

    protected array $messages = [
        'departments.required' => 'Нужно выбрать хоть один отдел',
    ];

    public function save()
    {
        $validatedData = $this->validate();

        if ( $this->mode == 'add' ) {
            $employee = Employees::create([
                'name' => $this->name,
                'surname' => $this->surname,
                'patronymic' => $this->patronymic,
                'gender' => $this->gender,
                'salary' => $this->salary
            ]);
            $employee->departments()->attach($this->departments);
            $this->emitTo('alerts', 'alert', 'success', 'Сотрудник успешно добавлен');
            $this->reset();
        } else {
            $employee = Employees::find($this->employee_id);
            $employee->update([
                'name' => $this->name,
                'surname' => $this->surname,
                'patronymic' => $this->patronymic,
                'gender' => $this->gender,
                'salary' => $this->salary
            ]);
            $employee->departments()->sync($this->departments);
            $this->emitTo('alerts', 'alert', 'info', 'Сотрудник успешно изменен');
        }
        //return redirect()->to(route('employees.index'));
    }

    public function render()
    {
        return view('livewire.add-employee');
    }
}
