<?php

namespace App\Http\Controllers;

use App\Http\Resources\Department\DepartmentResourceCollection;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use App\Models\Department;
use App\UseCases\DepartmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DepartmentController extends Controller
{

    /**
     * @var DepartmentService
     */
    private $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    public function index()
    {
        $departments = Department::all();
        return view('api.department.index', compact('departments'));
    }

    public function create()
    {
        return view('api.department.create');
    }

    public function store(Request $request)
    {
        $this->departmentService->create($request);
        return redirect()->route('department.index');
    }

    public function edit(Department $department)
    {
        return view('api.department.edit', compact('department'));
    }

    public function update(Department $department ,Request $request)
    {
        $this->departmentService->update($department, $request);
        return redirect()->route('department.index');

    }

    public function destroy(Department $department)
    {
        if($department->employee->count() <= 0) {
            $department->delete();
            return back();
        }else {
            return back()->withErrors(['department_error'.$department->id => 'Не возможно удалить, т.к. есть мастер']);
        }

    }

}
