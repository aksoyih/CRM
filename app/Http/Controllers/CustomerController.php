<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Displays all customers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::all();
        return view('customer.index', compact('customers'));
    }

    /**
     * Displays customer details.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customers::find($id)->first();
        return view('customer.detail', compact('customer'));
    }

    /**
     * Displays all complaints of a customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function complaints($id)
    {
        $complaints = Customers::find($id)->complaints()->get()->all();
        return view('customer.complaints', compact('complaints'));
    }

    /**
     * Displays all suggestions of a customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function suggestions($id)
    {
        $suggestions = Customers::find($id)->suggestions()->get()->all();
        return view('customer.suggestions', compact('suggestions'));
    }

}
