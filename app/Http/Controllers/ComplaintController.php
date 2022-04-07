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
        $complaint = Complaints::with('Customer')->with('Creator')->with('Updater')->find($id);
        $updates = Updates::where([['subject_id', $id], ['subject_type', 'complaint']])->orderBy('id', 'desc')->get()->all();

        return view('complaint.detail', compact('complaint', 'updates'));
    }

    /**
     * Displays Complaint Update Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $complaint = Complaints::with('Customer')->find($id);
        return view('complaint.update', compact('complaint'));
    }

    /**
     * Saves Complaint Update Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveUpdate(Request $request, $id)
    {
        $request->validate([
            'update_type' => 'required|in:started,completed,cancelled',
            'update' => 'string'
        ]);

        $update = Updates::create([
            'update' => $request->update,
            'update_type' => $request->update_type,
            'subject_id' => $id,
            'subject_type' => 'complaint',
            'created_by' => auth()->user()->id,
        ]);

        return redirect()->route('complaint.detail', $id);
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

    /**
     * Saves a new Complaint.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request, $id)
    {
        $request->validate([
            'complaint' => 'string'
        ]);

        $complaint = Complaints::create([
            'complaint' => $request->complaint,
            'customer_id' => $id,
            'created_by' => auth()->user()->id,
        ]);

        return redirect()->route('complaint.detail', $complaint->id);
    }
}