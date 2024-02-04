<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;
use Yajra\DataTables\DataTables;
use App\Models\Employee;

class CompanyController extends Controller
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
        
        return view('admin-dashboard.companie-list');
    }

    public function datalist(Request $request){

        $data = Company::all();
        return DataTables::of($data)
        ->addColumn('action', function ($row) {
            $deleteUrl = route('companies.destroy', $row->id);
            $editUrl = route('companies.edit', $row->id);
            return '<a href="' . $editUrl . '">Edit</a> |<form action="' . $deleteUrl . '" method="POST">
            ' . csrf_field() . '
            ' . method_field('DELETE') . '
            <button type="submit" onclick="return confirm(\'Are you sure?\')">Delete</button>
        </form>';
        })
        ->addColumn('image', function ($row) {
            $imageUrl = 'storage/logos/'.$row->logo;
            return '<img src="' . $imageUrl . '" alt="Company Logo" width="60" height="50">';
        })->rawColumns(['image','action'])
        ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin-dashboard.add-companie');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:companies,email',
                'website' => 'required',
                'logo' => 'required|image|mimes:jpeg,png,jpg|dimensions:max_width=100,max_height=100',
            ]);

            //
            // https://docs.google.com/document/d/17vUC_eKxoR6HJlv92wByi9lNbB4X8ylcrEYRY4f77bw/edit?pli=1

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $company = new Company;
            $company->name = $request->input('name');
            $company->email = $request->input('email');
            $company->website = $request->input('website');

            $logo = $request->file('logo');
            $directory = 'public/logos';
            $permissions = 0755;
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory, $permissions);
            }
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->storeAs($directory, $logoName);
            $company->logo = $logoName;

            $company->save();

            return back()->with('success', 'Company added successfully!');
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
        $company = Company::findOrFail($id);

        return view('admin-dashboard.edit-companie', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:companies,email,'.$id,
            'website' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $company = Company::findOrFail($id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->website = $request->input('website');

        
        if ($request->hasFile('logo')) {
            
            $logo = $request->file('logo');
            $directory = 'public/logos';
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->storeAs($directory, $logoName);
            $company->logo = $logoName;

        }
        $company->save();
        return redirect()->route('companies.index')->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
    }
}
