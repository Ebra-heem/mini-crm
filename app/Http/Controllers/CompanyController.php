<?php

namespace App\Http\Controllers;

use App\Helper\Media;
use App\Models\Company;
use App\Mail\CompanyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    /**
     * Custom Helper Class for Image Processing
     */
    use Media;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $companies = Company::all();
        return view('admin.company.index',compact('companies'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('admin.company.create');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
        ]);
        try {

            // return $request;
            if($file = $request->file('logo')) {
                $fileData = $this->uploads($file,'company/images/');
                $company = Company::create([
                           'name' => $request->name,
                           'email' => $request->email,
                           'logo' => $fileData['filePath'],
                           'website' =>  $request->website
                        ]);
            }
            \Mail::to('webebrahim@gmail.com')->send(new \App\Mail\CompanyMail($company));
            return redirect()->route('companies.index')
                            ->with('success','Company created successfully');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        
        try {
            return view('admin.company.edit',compact('company'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
        ]);
        try {
            
            if($file = $request->file('logo')) {
                unlink($company->logo);
                $fileData = $this->uploads($file,'company/images/');
                $company->update([
                           'name' => $request->name,
                           'email' => $request->email,
                           'logo' => $fileData['filePath'],
                           'website' =>  $request->website
                        ]);
            }
            
            return redirect()->route('companies.index')
                            ->with('success','Company Updated Successfully');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        try {
            $company->delete();
        unlink($company->logo);
        return redirect()->route('companies.index')
                        ->with('success','Product deleted successfully');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
