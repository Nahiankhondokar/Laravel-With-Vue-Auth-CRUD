<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index (): JsonResponse
    {
        $employee = Employee::query()->with('department', 'achievement')->get();
        return $this->apiSuccessResponse('Employee list', $employee);
    }

    public function store (EmployeeRequest $request): JsonResponse
    {
        $employee = Employee::create($request->validated());
        $employeeIds = Employee::query()->pluck('id');
        $employee->achievement()->attach($employeeIds);
        
        return $this->apiSuccessResponse('Employee is created', $employee);
    }
}
