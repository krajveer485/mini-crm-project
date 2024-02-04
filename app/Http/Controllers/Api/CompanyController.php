<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function companies(Request $request)
    {
        
        $id = $request->company_id;
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['message' => 'Company not found'], 404);
        }
        $imageUrl = 'storage/logos/'.$company->logo;
        $company['logo'] = $imageUrl;

        return response()->json(['data' => $company], 200);
    }

    public function addCompany(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies,email',
            'website' => 'required',
            'logo' => 'required',
        ]);

        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        $directory = 'public/logos';
        $image = explode('base64,',$request->logo);
        $image = end($image);
        $image = str_replace(' ', '+', $image);
        $logoPath=  uniqid() . '.png';
        $file = "public/logos/" . $logoPath;
        $permissions = 0755;
        if (!Storage::exists($directory)) {
            Storage::makeDirectory($directory, $permissions);
        }
       Storage::put($file,base64_decode($image));

        $company->logo = $logoPath;

        $company->save();
        

        return response()->json(['data' => $company], 200);
    }

}
