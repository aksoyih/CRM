<?php

namespace App\Http\Controllers;

use App\Models\Updates;
use App\Models\Customers;
use App\Models\Complaints;
use App\Models\Suggestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $customer = Customers::find($id);

        $complaintCount = Complaints::where('customer_id', '=', $customer->id)->count();
        $suggestionCount = Suggestions::where('customer_id', '=', $customer->id)->count();

        $complaintStartedCount = DB::select("SELECT COUNT(id) as count FROM updates WHERE subject_id IN (select id from complaints where customer_id = $customer->id and complaints.deleted_at is null) AND update_type = 'started' AND subject_type = 'complaint' LIMIT 1")[0]->count;
        $complaintCompletedCount = DB::select("SELECT COUNT(id) as count FROM updates WHERE subject_id IN (select id from complaints where customer_id = $customer->id and complaints.deleted_at is null) AND update_type = 'completed' AND subject_type = 'complaint' LIMIT 1")[0]->count;
        $complaintCancelledCount = DB::select("SELECT COUNT(id) as count FROM updates WHERE subject_id IN (select id from complaints where customer_id = $customer->id and complaints.deleted_at is null) AND update_type = 'cancelled' AND subject_type = 'complaint' LIMIT 1")[0]->count;

        $suggestionStartedCount = DB::select("SELECT COUNT(id) as count FROM updates WHERE subject_id IN (select id from complaints where customer_id = $customer->id and complaints.deleted_at is null) AND update_type = 'started' AND subject_type = 'suggestion' LIMIT 1")[0]->count;
        $suggestionCompletedCount = DB::select("SELECT COUNT(id) as count FROM updates WHERE subject_id IN (select id from complaints where customer_id = $customer->id and complaints.deleted_at is null) AND update_type = 'completed' AND subject_type = 'suggestion' LIMIT 1")[0]->count;
        $suggestionCancelledCount = DB::select("SELECT COUNT(id) as count FROM updates WHERE subject_id IN (select id from complaints where customer_id = $customer->id and complaints.deleted_at is null) AND update_type = 'cancelled' AND subject_type = 'suggestion' LIMIT 1")[0]->count;

        $complaints = [
            'started' => $complaintStartedCount,
            'completed' => $complaintCompletedCount,
            'cancelled' => $complaintCancelledCount,
            'new' => ($complaintStartedCount + $complaintCompletedCount + $complaintCancelledCount) - $complaintCount,
            'count' => $complaintCount
        ];
        

        $suggestions = [
            'started' => $suggestionStartedCount,
            'completed' => $suggestionCompletedCount,
            'cancelled' => $suggestionCancelledCount,
            'new' => ($suggestionStartedCount + $suggestionCompletedCount + $suggestionCancelledCount) - $suggestionCount,
            'count' => $suggestionCount
        ];

        return view('customer.detail', [
            'customer' => $customer,
            'complaints' => $complaints,
            'suggestions' => $suggestions,
        ]);
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

    /**
     * New costumer form.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        return view('customer.new');
    }

    /**
     * Creates new customer
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'company' => 'required',
        ]);

        $customer = Customers::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'company' => $request->company,
            'created_by' => auth()->user()->id,
        ]);

        if($customer) {
            return redirect()->route('customer.detail', $customer->id)->with('success', 'Customer created successfully');
        } else {
            return redirect()->route('customer.new')->withErrors('error', 'Something went wrong');
        }

    }

}
