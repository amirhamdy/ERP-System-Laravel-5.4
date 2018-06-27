<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Customer;
use App\Project;
use Illuminate\Http\Request;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index')->with(['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::pluck('name', 'id');
        $currencies = Currency::pluck('name', 'id');
        return view('projects.create', compact('customers', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'start_date' => 'required|max:255|date',
            'end_date' => 'required|max:255|date',
            'po_number' => 'max:255',
            'customer_id' => 'required',
            'productline_id' => 'required',
            /*            'currency_id' => 'required',*/
        ]);
        $input = $request->only('name', 'start_date', 'end_date', 'po_number',
            'industry_id', 'country_id', 'region_id', 'fax', 'website',
            'customer_id', 'productline_id');
        $result = Project::create($input);
        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Project::find($id);
        return view('projects.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully');
    }

    public function getProjects(Request $request)
    {
        return Project::where('productline_id', $request->productline_id)->pluck('name', 'id');
    }
}
