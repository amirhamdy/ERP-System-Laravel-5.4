<?php

namespace App\Http\Controllers;

use App\Country;
use App\Currency;
use App\Customer;
use App\Industry;
use App\Pricebook;
use App\Productline;
use App\Region;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index')->with(['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $industries = Industry::pluck('name', 'id');
        $countries = Country::pluck('name', 'id');
        $regions = Region::pluck('name', 'id');
        $currencies = Currency::pluck('name', 'id');
        return view('customers.create', compact('industries', 'countries', 'regions', 'currencies'));
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
            'email' => 'required|email|max:255|unique:customers',
            'status' => 'required|max:255',
            'rating' => 'required|max:255',
            'industry_id' => 'required',
            'country_id' => 'required',
            'region_id' => 'required',
            'fax' => 'max:255',
            'website' => 'max:255',
            'address1' => 'max:255',
            'address2' => 'max:255',
            'postal_code' => 'max:255',
            'city' => 'max:255',
            'billing_address' => 'max:255',

            'currency_id' => 'max:255',
            /*            'pricebook_id' => 'max:255',*/
        ]);
        $input = $request->only('name', 'email', 'status', 'rating',
            'industry_id', 'country_id', 'region_id', 'fax', 'website',
            'address1', 'address2', 'postal_code', 'city',
            'billing_address', 'currency_id');
        $result = Customer::create($input);
        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully');
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
        Customer::find($id)->delete();
        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully');
    }

}