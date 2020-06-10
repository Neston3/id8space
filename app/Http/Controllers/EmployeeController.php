<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);
        $companies = Company::all();
        return view('employee.employee_index',compact('employees','companies'));
    }

    public function store(Request $request)
    {

        $employee = new Employee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->employee_email;
        $employee->phone = $request->employee_phone;
        $employee->company_id = $request->company_id;
        $employee->save();
        return back();
    }

    public function update(Request $request)
    {
        $employee = Employee::find($request->employee_id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->employee_email;
        $employee->phone = $request->employee_phone;
        $employee->company_id = $request->company_id;
        $employee->save();
        return back();

    }

    public function destroy(Request $request)
    {
        Employee::destroy($request->employee_id);
        return back();
    }
}
