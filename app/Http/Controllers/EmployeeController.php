<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;
use App\Models\Employee;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('admin-dashboard.employee-list');
    }

    public function datalist(Request $request){

        $data = Employee::with('company')->get();
        return DataTables::of($data)
        ->addColumn('action', function ($row) {
            $deleteUrl = route('employees.destroy', $row->id);
            $editUrl = route('employees.edit', $row->id);
            return '<a href="' . $editUrl . '">Edit</a> |<form action="' . $deleteUrl . '" method="POST">
            ' . csrf_field() . '
            ' . method_field('DELETE') . '
            <button type="submit" onclick="return confirm(\'Are you sure?\')">Delete</button>
        </form>';
        })
        ->addColumn('company', function ($row) {
            return $row->company->name;
        })->rawColumns(['company','action'])
        ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('admin-dashboard.add-employee',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $validator = Validator::make($request->all(), [
            'company' => 'required',
            'email' => 'required|email|unique:employees,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile_no' => 'required|unique:employees,phone|regex:/^[0-9]{10}$/',
        ]);

        if ($validator->fails()) {
             return back()->withErrors($validator)->withInput();
        }

           $employee = new Employee;
            $employee->first_name = $request->first_name;
            $employee->email = $request->email;
            $employee->last_name = $request->last_name;
            $employee->company_id = $request->company;
            $employee->phone =$request->mobile_no;        
            $employee->save();
            return back()->with('success', 'Employee added successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companies = Company::all();
        $employee = Employee::findOrFail($id);

        return view('admin-dashboard.edit-employee', compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'company' => 'required',
            'email' => 'required|email|unique:employees,email,'.$id,
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile_no' => 'required|regex:/^[0-9]{10}$/|unique:employees,phone,'.$id,
        ]);

        if ($validator->fails()) {
             return back()->withErrors($validator)->withInput();
        }

        $employee = Employee::findOrFail($id);
        $employee->first_name = $request->first_name;
        $employee->email = $request->email;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company;
        $employee->phone =$request->mobile_no;     
        $employee->save();
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Employee::findOrFail($id);
        $company->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
