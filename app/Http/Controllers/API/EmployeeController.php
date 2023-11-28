<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(): JsonResponse
    {
        $employee = Employee::query()->with('department', 'achievement')->get();
        return $this->apiSuccessResponse('Employee list', $employee);
    }

    public function show(Employee $employee): JsonResponse
    {
        $employee->load('department', 'achievement');
        return $this->apiSuccessResponse('Employee list', $employee);
    }

    public function store(EmployeeRequest $request): JsonResponse
    {
        $employee = Employee::create($request->validated());
        $employeeIds = $request->achievement_id;
        $employee->achievement()->attach($employeeIds);
        
        return $this->apiSuccessResponse('Employee is created', $employee);
    }

    public function update(Request $request, Employee $employee): JsonResponse
    {
        $employee->update($request->except('achievement_id'));
        $employeeIds = $request->achievement_id;
        $employee->achievement()->sync($employeeIds);
        
        return $this->apiSuccessResponse('Employee is updated', $employee);
    }

    public function delete(Employee $employee): JsonResponse
    {
        $employee->achievement()->detach();
        $employee->delete();
        
        return $this->apiSuccessResponse('Employee is deleted');
    }
}
