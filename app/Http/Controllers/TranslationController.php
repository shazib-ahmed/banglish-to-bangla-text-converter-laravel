<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TranslationController extends Controller
{
    /**
     * Display a listing of the saved translations.
     */
    public function index(): View
    {
        $translations = Translation::latest()->get();
        return view('pages.index', compact('translations'));
    }

    /**
     * Store a newly created translation in database.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'banglish_text' => 'required|string',
            'bangla_text' => 'required|string',
        ]);

        Translation::create($request->only(['banglish_text', 'bangla_text']));

        return redirect()->route('translations.index')->with('success', 'Translation saved successfully!');
    }

    /**
     * Update an existing translation.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'banglish_text' => 'required|string',
            'bangla_text' => 'required|string',
        ]);

        $translation = Translation::findOrFail($id);
        $translation->update($request->only(['banglish_text', 'bangla_text']));

        return redirect()->route('translations.index')->with('success', 'Translation updated successfully!');
    }

    /**
     * Remove a translation from the database.
     */
    public function destroy(string $id): RedirectResponse
    {
        Translation::destroy($id);
        return redirect()->route('translations.index')->with('success', 'Translation deleted successfully!');
    }
}
