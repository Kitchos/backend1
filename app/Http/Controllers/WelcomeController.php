<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;

class WelcomeController extends Controller
{

    public function index()
    {
        $employees = Employee::all();
        $departments = Department::all();
        return view('welcome', compact('employees', 'departments'));
    }
}
