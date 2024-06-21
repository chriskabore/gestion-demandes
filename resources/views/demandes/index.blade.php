<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des demandes') }}
        </h2>
    </x-slot>


        <div class="row justify-content-center mt-3 px-2 ">
            <div class=" col col-md-12 col-lg-12">

                @session('success')
                    <div class="alert alert-success" role="alert">
                        {{ $value }}
                    </div>
                @endsession

                <div class="card">
                    <div class="card-header">Liste des demandes</div>
                    <div class="card-body">

                        <table class="table table-bordered mt-5 mytab">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Numero</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Demandeur</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($demandes as $demande)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $demande->numero }}</td>
                                        <td>{{ $demande->date }}</td>
                                        <td>{{ $demande->citoyen->nom.'-'.$demande->citoyen->prenoms }}</td>
                                        <td>{{ $demande->service->intitulé}}</td>
                                        <td>
                                            <form action="{{ route('demandes.destroy', $demande->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{ route('demandes.show', $demande->id) }}"
                                                    class="btn btn-warning btn-sm mx-1"><i class="bi bi-eye"></i> Voir</a>


                                                    <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                    onclick="return confirm('Voulez-vous supprimer cette demande?');"><i
                                                        class="bi bi-trash"></i> Supprimer
                                                </button>


                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="6">
                                        <span class="text-danger">
                                            <strong>Aucune demande trouvée!</strong>
                                        </span>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




</x-app-layout>
