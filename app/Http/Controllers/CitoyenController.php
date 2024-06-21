<?php

namespace App\Http\Controllers;

use App\Models\Citoyen;
use App\Models\User;
use App\Http\Requests\StoreCitoyenRequest;
use App\Http\Requests\UpdateCitoyenRequest;

class CitoyenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citoyens = Citoyen::latest()->paginate(5);
        return view('citoyens.index', compact('citoyens'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('citoyens.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCitoyenRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Citoyen $citoyen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Citoyen $citoyen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCitoyenRequest $request, Citoyen $citoyen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Citoyen $citoyen)
    {
        //
    }
}
