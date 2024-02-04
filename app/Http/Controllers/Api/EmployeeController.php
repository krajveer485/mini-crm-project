<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function employees(Request $request)
    {
        
        $id = $request->company_id;
        $employee = Employee::with('company')->get();

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        return response()->json(['data' => $employee], 200);
    }

    public function addEmployees(Request $request)
    {
    
        $request->validate([
            'first_name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'last_name' => 'required',
            'company_id' => 'required',
            'phone' => 'required|unique:employees,phone|regex:/^[0-9]{10}$/',
        ]);
        
        $employee = new Employee;
        $employee->first_name = $request->first_name;
        $employee->email = $request->email;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->phone =$request->phone;        
        $employee->save();

        $employee->save();
        
        return response()->json(['data' => $employee], 200);
    }

}
