<?php

namespace App\Http\Controllers;

use App\Models\Updates;
use App\Models\Suggestions;
use Illuminate\Http\Request;
use Symfony\Component\Console\Completion\Suggestion;

class SuggestionController extends Controller
{
    /**
     * Displays all Suggestions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suggestions = Suggestions::with('Customer')->get()->all();
        return view('suggestion.index', compact('suggestions'));
    }

    /**
     * Displays Suggestion details.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suggestion = Suggestions::with('Customer')->with('Creator')->with('Updater')->find($id);
        $updates = Updates::where([['subject_id', $id], ['subject_type', 'suggestion']])->orderBy('id', 'desc')->get()->all();

        return view('suggestion.detail', compact('suggestion', 'updates'));
    }

    /**
     * Displays Suggestion Update Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $suggestion = Suggestions::with('Customer')->find($id);
        return view('suggestion.update', compact('suggestion'));
    }

    /**
     * Saves Suggestion Update Page.
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
            'subject_type' => 'suggestion',
            'created_by' => auth()->user()->id,
        ]);

        if($update) {
            return redirect()->route('suggestion.show', $id)->with('success', 'Suggestion Updated Successfully');
        }else{
            return redirect()->route('suggestion.update', $id)->with('error', 'Suggestion Update Failed');
        }
    }

    /**
     * Saves a new Suggestion.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request, $id)
    {
        $request->validate([
            'suggestion' => 'string'
        ]);

        $suggestion = Suggestions::create([
            'suggestion' => $request->suggestion,
            'customer_id' => $id,
            'created_by' => auth()->user()->id,
        ]);

        return redirect()->route('suggestion.detail', $suggestion->id);
    }
}
