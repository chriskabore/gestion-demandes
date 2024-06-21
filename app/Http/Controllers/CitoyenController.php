<?php

namespace App\Http\Controllers;

use App\Models\Citoyen;
use App\Models\User;
//use App\Http\Requests\StoreCitoyenRequest;
//use App\Http\Requests\UpdateCitoyenRequest;
use Illuminate\Http\Request;


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
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenoms' => 'required|string',
            'date_naissance' => 'required|string',
            'lieu_naissance' => 'required|string',
            'sexe' => 'required|string',
            'telephone' => 'required|string',
            'cnib' => 'required|string',
            'user_id' => 'required|integer',
        ]);

        $user = User::find($request->get('user_id'));

        $citoyen = new Citoyen([
            'nom' => $request->get('nom'),
            'prenoms' => $request->get('prenoms'),
            'date_naissance' => $request->get('date_naissance'),
            'lieu_naissance' => $request->get('lieu_naissance'),
            'sexe' => $request->get('sexe'),
            'telephone' => $request->get('telephone'),
            'cnib' => $request->get('cnib'),
        ]);
        $citoyen->user()->associate($user)->save();
       return redirect()->route('admin.citoyens')->with('success', 'Citoyen created successfully.');


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
    public function update(Request $request, Citoyen $citoyen)
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
