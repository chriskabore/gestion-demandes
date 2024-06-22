<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use App\Http\Requests\StorePieceRequest;
use App\Http\Requests\UpdatePieceRequest;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pieces = Piece::latest()->paginate(5);
        return view('pieces.index', compact('pieces'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pieces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'intitulé' => 'required|string',
            'description' => 'required|string',
        ]);

        $piece = new Piece([
            'intitulé' => $request->get('intitulé'),
            'description' => $request->get('description'),
        ]);

        $piece->save();
        return redirect()->route('admin.pieces')->with('success', 'Piece created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Piece $piece)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Piece $piece)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Piece $piece)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Piece $piece)
    {
        //
    }
}
