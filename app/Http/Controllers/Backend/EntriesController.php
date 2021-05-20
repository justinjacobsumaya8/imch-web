<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entry;

class EntriesController extends Controller
{
    public function index()
    {
    	$entries = Entry::active()->get();
    	return view('backend.entries.index', compact('entries'));
    }

    public function show($id)
    {
    	$entry = Entry::findOrFail($id);
        $statuses = ['Pending', 'Negative', 'Positive'];
    	return view('backend.entries.show', compact('entry', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $entry = Entry::findOrFail($id);
        $entry->status = $request->status;
        $entry->save();

        return redirect()->back()->with('flash_success', 'Status updated successfully.');
    }

    public function getEntries()
    {
    	$data = \App\Models\Entry::active()->get();
    	return response()->json(['data' => $data]);
    }
}
