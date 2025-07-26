<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::all();
        return view('tournaments.index', compact('tournaments'));
    }

    public function create()
    {
        return view('tournaments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'Summer Cup',
            'game' => 'Mobile Legends',
            'start_date' => '2025-08-01',
            'end_date' => '2025-08-03',
            'type' => 'single_elim',
        ]);

        Tournament::create($validated);

        return redirect()->route('tournaments.index')->with('success', 'Turnamen berhasil ditambahkan');
    }

    public function show(Tournament $tournament)
    {
        return view('tournaments.show', compact('tournament'));
    }

    public function edit(Tournament $tournament)
    {
        return view('tournaments.edit', compact('tournament'));
    }

    public function update(Request $request, Tournament $tournament)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'game' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required|in:single_elim,double_elim,group',
        ]);

        $tournament->update($validated);

        return redirect()->route('tournaments.index')->with('success', 'Turnamen berhasil diperbarui');
    }

    public function destroy(Tournament $tournament)
    {
        $tournament->delete();
        return redirect()->route('tournaments.index')->with('success', 'Turnamen berhasil dihapus');
    }
}
