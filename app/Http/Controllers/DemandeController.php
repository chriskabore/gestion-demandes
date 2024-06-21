<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Citoyen;
use App\Models\Service;
use App\Http\Requests\StoreDemandeRequest;
use App\Http\Requests\UpdateDemandeRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = Demande::with('citoyen', 'service')->get();
        return view('demandes.index', compact('demandes'));
    }


    /**
     * obtenir les demandes de l'utilisateur courant
     */

     public function mesDemandes(){
         // obtenir l'utilisateur courant
        $user = Auth::user();

        // Get orders associated with this user
        $citoyen = $user->citoyen;
        $demandes = $citoyen->demandes()->get();

        return view('dashboard', ['demandes' => $demandes]);
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDemandeRequest $request)
    {

        //$dateNow = Carbon::now()->toDateTimeString();
        $request->validate([
            'citoyen_id' => 'required|exists:citoyenss,id',
            'service_id' => 'required|exists:services,id',
            'numero' => 'required|string',
            'date' => 'string'
        ]);

        $demande = new Demande();
        $demande->citoyen_id = $request->input('citoyen_id');
        $demande->service_id = $request->input('service_id');
        $demande->numero = $request->input('numero');
        $demande->date = $request->input('date');
        $demande->save();

        return redirect()->back()->with('success', 'Demande créée!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Demande $demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDemandeRequest $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
        //
    }
}
