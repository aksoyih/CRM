<?php

namespace App\Http\Controllers;

use App\Models\Suggestions;
use Illuminate\Http\Request;

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
     * Displays Complaint details.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suggestion = Suggestions::find($id)->with('Customer')->get()->first();
        return view('suggestion.detail', compact('suggestion'));
    }

    /**
     * Displays Complaint Update Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $suggestion = Suggestions::find($id)->with('Customer')->get()->first();
        return view('suggestion.update', compact('suggestion'));
    }
}
