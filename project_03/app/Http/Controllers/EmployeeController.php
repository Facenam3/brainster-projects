<?php

namespace App\Http\Controllers;

use App\Http\Requests\employee\EmployeeStoreRequest;
use App\Http\Requests\employee\EmployeeUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{
    public function index() {

        $employees = Employee::paginate(10);

        return view('admin.employees.employees' , compact('employees'));
    }

    public function addEmployee() {
        $companies = Company::all();
        return view('admin.employees.employee-form', compact('companies'));
    }

    public function editEmployee($id) {
        $employee = Employee::findOrFail($id);
        $companies = Company::all();

        return view('admin.employees.employee-edit', compact(['employee', 'companies']));
    }

    public function storeEmployee(EmployeeStoreRequest $request) {

        Employee::create([
            'full_name' => $request->full_name,
            'title' => $request->title,
            'company_id' => $request->company_id
        ]);

        return redirect()->route('admin.employees');
    }

    public function updateEmployee(EmployeeUpdateRequest $request, Employee $employee) {
        $employee->update($request->all());

        return redirect()->route('admin.employees');
    }

    public function destroyEmployee($id) {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        return redirect()->route('admin.employees');
    }
}
