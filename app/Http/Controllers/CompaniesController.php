<?php

namespace App\Http\Controllers;

use App\Events\Company\CompanyCreatedEvent;
use App\Events\Company\CompanyDeletedEvent;
use App\Events\Company\CompanyUpdatedEvent;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return response()->json($companies);
    }

    public function show($id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        return response()->json($company);
    }

    public function store(Request $request)
    {
        $company = new Company();
        $company->fill($request->all());

        $company->save();

        event(new CompanyCreatedEvent($company));

        return response()->json($company, 201);
    }

    public function update(Request $request, $id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $company->fill($request->all());

        $company->save();

        event(new CompanyUpdatedEvent($company));

        return response()->json($company);
    }

    public function destroy($id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $company->delete();

        event(new CompanyDeletedEvent($company));

        return response()->json($company);
    }
}
