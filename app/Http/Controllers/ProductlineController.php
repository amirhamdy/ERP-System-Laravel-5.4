<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Customer;
use App\Productline;
use App\Project;
use Illuminate\Http\Request;

class ProductlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Productline::all();
        return view('productlines.index')->with(['productlines' => $all]);
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
        return view('productlines.create', compact('customers', 'currencies'));
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
            'customer_id' => 'required',
            'pricebook_id' => 'required',
        ]);
        $input = $request->only('name', 'customer_id', 'pricebook_id');
        $result = Productline::create($input);
        return redirect()->route('productlines.index')
            ->with('success', 'Productline created successfully');
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
     */
    public function destroy($id)
    {
        //
    }


    public function getProductlines(Request $request)
    {
        return Productline::where('customer_id', $request->customer_id)->pluck('name', 'id');
    }


}
