<?php

namespace App\Http\Controllers;

use App\Http\Requests\company\CompanyStoreRequest;
use App\Http\Requests\company\CompanyUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index() {
        $companies = Company::all();
        return view('admin.company.company', compact('companies'));
    }

    public function addCompany() {
        return view('admin.company.company-form');
    }

    public function editCompany($id) {
        $company = Company::findOrFail($id);

        return view('admin.company.edit-company', compact('company'));
    }

    public function storeCompany(CompanyStoreRequest $request) {

        if ($request->hasFile('hero_image')) {
            $path = $request->file('hero_image')->store('images/hero', 'public');
        }

        Company::create([
            'general' => $request->general,
            'about_us' => $request->about_us,
            'contact' => $request->contact,
            'location' => $request->location,
            'hero_image' => $path
        ]);

        return redirect()->route('admin.company');
    }

    public function updateCompany(CompanyUpdateRequest $request,Company $company) {
        if($request->hasFile('hero_image')){

            dd($company->hero_image);
            if ($company->hero_image) {
                Storage::disk('public')->delete($company->hero_image);
            }

            $path = $request->file('hero_image')->store('images/hero', 'public');
            $company->hero_image = $path;
         }

           $company->update([
                'general' => $request->general,
                'about_us' => $request->about_us,
                'contact' => $request->contact,
                'location' => $request->location,
                'hero_image' => $company->hero_image
           ]);
   

        return redirect()->route('admin.company');
    }
}
