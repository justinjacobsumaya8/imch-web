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
    	return view('backend.entries.show', compact('entry'));
    }

    public function getEntries()
    {
    	$data = \App\Models\Entry::active()->get();
    	return response()->json(['data' => $data]);
    }
}
