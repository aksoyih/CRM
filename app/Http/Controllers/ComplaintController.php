<?php

namespace App\Http\Controllers;

use App\Models\Complaints;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Displays all Complaints.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaints::with('Customer')->get()->all();
        return view('complaint.index', compact('complaints'));
    }

    /**
     * Displays Complaint details.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint = Complaints::find($id)->with('Customer')->get()->first();
        return view('complaint.detail', compact('complaint'));
    }

    /**
     * Displays Complaint Update Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $complaint = Complaints::find($id)->with('Customer')->get()->first();
        return view('complaint.update', compact('complaint'));
    }
}