<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct ()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $data = ([
            'company' => Company::paginate(10)
        ]);

        return view('companies.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'dimensions:min_width=100,min_height=100'
        ]);

        // Logo File Name storage/app/public
        if($request->hasFile('logo'))
        {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->storeAs('public', $filename);
        }

        $company = new Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->logo = $filename;
        $company->website = $request->input('website');
        $company->save();

        return redirect('/companies')->with('status', 'Company added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
        $company = Company::Find($company->id);

        return view('companies.show', [
            'company' => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        $company = Company::Find($company->id);

        return view('companies.edit', [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'update_logo' => 'dimensions:min_width=100,min_height=100'
        ]);

        // Logo File Name storage/app/public
        if($request->hasFile('update_logo'))
        {
            $file = $request->file('update_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->storeAs('public', $filename);
        }

        $company = Company::Find($company->id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->logo = $filename;
        $company->website = $request->input('website');
        $company->save();
        
        return redirect("/companies/{$company->id}")->with('status', 'Company updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
        $company = Company::Find($company->id);

        $image_path =  public_path('/storage/'.$company->logo);
        unlink($image_path);

        $company->delete();
        return redirect('/companies')->with('status', 'Company was deleted successfully!');
    }
}
