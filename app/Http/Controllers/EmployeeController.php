<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Http\Controllers\Controller;
use App\UseCases\EmployeeService;
use App\Http\Resources\Employee\EmployeeResourceCollection;
use Illuminate\Http\Request;
use App\Http\Requests\Employee\UpdateRequest;
use App\Http\Requests\Employee\CreateRequest;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class EmployeeController extends Controller
{
    private $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index()
    {
        $employees = Employee::all();
        return view('api.employee.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();

        return view('api.employee.create', compact('departments'));
    }

    public function store(CreateRequest $createRequest)
    {
//        $this->validate($request, [
//            'first_name' => 'required|string',
//            'surname' => 'required|string',
//            'patronymic' => 'required|string',
//            'sex' => 'nullable|string',
//            'wage' => 'required|integer',
//            'department_ids' => 'required|array',
//            'department_ids.*' => 'required|integer',
//        ]);
        $this->employeeService->create($createRequest);
        return redirect()->route('employee.index');

    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();

        return view('api.employee.edit', compact('employee', 'departments'));
    }

    public function update(UpdateRequest $updateRequest, Employee $employee)
    {
//        $this->validate($request, [
//            'first_name' => 'required|string',
//            'surname' => 'required|string',
//            'patronymic' => 'required|string',
//            'sex' => 'nullable|string',
//            'wage' => 'required|integer',
//            'department_ids' => 'required|array',
//            'department_ids.*' => 'required|integer',
//        ]);
        $this->employeeService->update($employee, $updateRequest);
        return redirect()->route('employee.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return back();
    }
}
