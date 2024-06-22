<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Piece;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->paginate(5);
        return view('services.index', compact('services'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pieces = Piece::all();
        return view('services.create', compact('pieces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


       $service = Service::create([
            'code' => $request->get('code'),
            'intitulé' => $request->get('intitulé'),
            'frais_dossier' => $request->get('frais_dossier'),
            'description' => $request->get('description'),
        ]);


        $pieces_ids = $request->get('pieces_ids');

        $service->pieces()->attach($pieces_ids);
        return redirect()->route('admin.services')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {

        $pieces = $service->pieces ;
        return view('services.show', compact('service', 'pieces'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }

    public function attachPiece(Request $request, Service $service ){

    }

    public function detachPiece(Request $request,  $service,  $piece){
        $piece = Piece::findOrFail($piece);
        $service = Service::findOrFail($service);
        $service->pieces()->detach($piece->id);
        $pieces = $service->pieces ;
        return redirect()->back()->with('success', 'pièce detached successfully.');
        //view('services.show', compact('service', 'pieces'));
    }

    public function createAttachPiece(){
        return view('services.attach.create');
    }
}
