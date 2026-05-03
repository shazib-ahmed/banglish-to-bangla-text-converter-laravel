<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $translations = Translation::latest()->get();
        return view('pages.index', compact('translations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'banglish_text' => 'required',
            'bangla_text' => 'required',
        ]);

        Translation::create($request->all());

        return redirect()->route('translations.index')->with('success', 'Saved successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $translation = Translation::findOrFail($id);
        return view('pages.edit', compact('translation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'banglish_text' => 'required',
            'bangla_text' => 'required',
        ]);

        $translation = Translation::findOrFail($id);
        $translation->update($request->all());

        return redirect()->route('translations.index')->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Translation::destroy($id);
        return redirect()->back();
    }
}
