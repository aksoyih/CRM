<?php

namespace App\Http\Controllers;

use App\Models\Updates;
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
        $complaint = Complaints::find($id)->with('Customer')->with('Creator')->with('Updater')->get()->first();
        $updates = Updates::where([['subject_id', $id], ['subject_type', 'complaint']])->get()->all();

        return view('complaint.detail', compact('complaint', 'updates'));
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

    /**
     * Displays New Complaint Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        return view('complaint.new');
    }
}