<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Employees;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $employees = Employees::all();
        $departments = Departments::all();
        return view('home', compact('employees', 'departments'));
    }

    public function employees()
    {
        $employees = Employees::all();
        return view('employees.index', compact('employees'));
    }

    public function editEmployee($id)
    {
        $employee = Employees::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function departments()
    {
        $departments = Departments::all();
        return view('departments.index', compact('departments'));
    }

    public function editDepartment($id)
    {
        $department = Departments::findOrFail($id);
        return view('departments.edit', compact('department'));
    }
}
