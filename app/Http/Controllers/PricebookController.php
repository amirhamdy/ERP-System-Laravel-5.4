<?php

namespace App\Http\Controllers;

use App\Currency;
use App\JobType;
use App\Language;
use App\Pricebook;
use App\SubjectMatter;
use App\Unit;
use Illuminate\Http\Request;

class PricebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Pricebook::all();
        return view('pricebooks.index')->with(['pricebooks' => $all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::pluck('name', 'id');
        $jobTypes = JobType::pluck('name', 'id');
        $units = Unit::pluck('name', 'id');
        $subjectMatters = SubjectMatter::pluck('name', 'id');
        $currencies = Currency::pluck('name', 'id');

        return view('pricebooks.create', compact('languages', 'jobTypes', 'units', 'subjectMatters', 'currencies'));
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
            'currency_id' => 'required',
            'source_language_id' => 'required|array|min:1',
            'target_language_id' => 'required|array|min:1',
            'subject_matter' => 'required|array|min:1',
            'job_type_id' => 'required|array|min:1',
            'unit_id' => 'required|array|min:1',
            'unit_price' => 'required|array|min:1',
            'minimum_charge' => 'required|array|min:1',
        ]);

        print_r($request);
        if ($request['subject_matter']) {
            echo "sssssss";
        } else {
            echo "sdeee0";
        }
        die();
        $input = $request->only('name', 'currency_id');
        $result = Pricebook::create($input);
        return redirect()->route('pricebooks.index')
            ->with('success', 'Pricebook created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Pricebook::find($id)->delete();
        return redirect()->route('pricebooks.index')
            ->with('success', 'Pricebook deleted successfully');
    }

    public function getPricebooks(Request $request)
    {
        return Pricebook::where('currency_id', $request->currency_id)->pluck('name', 'id');
    }

}
