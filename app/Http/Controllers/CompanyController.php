<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.company_index',compact('companies'));
    }

    public function store(Request $request)
    {

        $logo = $request->file('logo');

        $company = new Company;
        $company->name = $request->company_name;
        $company->email = $request->company_email;
        $company->website = $request->company_website;

        if ($logo) {
            $logoExtension = $logo->getClientOriginalExtension();
            $logoStore = base_path() . '/storage/app/public/logo/';
            $logoName = $logo->getFilename() . '.' . $logoExtension;
            $logo->move($logoStore, $logoName);
            $company->logo = $logoName;
        } else {
            $company->logo = 'null';
        }
        $company->save();
        return back();
    }

    public function update(Request $request)
    {
        $logo = $request->file('logo');

        $company = Company::find($request->company_id);
        $company->name = $request->company_name;
        $company->email = $request->company_email;
        $company->website = $request->company_website;
        if ($logo) {
            File::delete(public_path() . '/storage/app/public/logo/php7227.tmp.PNG');
            $logoExtension = $logo->getClientOriginalExtension();
            $logoStore = base_path() . '/storage/app/public/logo/';
            $logoName = $logo->getFilename() . '.' . $logoExtension;
            $logo->move($logoStore, $logoName);
            $company->logo = $logoName;
        } else {
            $company->logo = 'null';
        }
        $company->save();
        return back();

    }

    public function destroy(Request $request)
    {
        Company::destroy($request->company_id);
        return back();
    }
}
