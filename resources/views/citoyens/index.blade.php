<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des citoyens') }}
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
                    <div class="card-header">Liste des citoyens</div>
                    <div class="card-body">
                        @if(Auth::user()->isAdmin())

                        <a href="{{ route('citoyens.create') }}" class="btn btn-success btn-sm my-3">
                            <i class="bi bi-plus-circle mx-1"></i>
                            Ajouter nouveau citoyen
                        </a>
                        @endif


                        <table class="table table-bordered mt-5 mytab">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenoms</th>
                                    <th scope="col">Date de naissance</th>
                                    <th scope="col">Lieu de naissance</th>
                                    <th scope="col">Sexe</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">CNIB</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($citoyens as $citoyen)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $citoyen->nom }}</td>
                                        <td>{{ $citoyen->prenoms }}</td>
                                        <td>{{ $citoyen->date_naissance }}</td>
                                        <td>{{ $citoyen->lieu_naissance }}</td>
                                        <td>{{ $citoyen->sexe }}</td>
                                        <td>{{ $citoyen->telephone }}</td>
                                        <td>{{ $citoyen->cnib }}</td>
                                        <td>
                                            <form action="{{ route('citoyens.destroy', $citoyen->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{ route('citoyens.show', $citoyen->id) }}"
                                                    class="btn btn-warning btn-sm mx-1"><i class="bi bi-eye"></i> Voir</a>

                                                    <a href="{{ route('citoyens.edit', $citoyen->id) }}"
                                                    class="btn btn-primary btn-sm mx-1"><i class="bi bi-pencil-square"></i>
                                                    Modifier</a>

                                                    <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                    onclick="return confirm('Voulez-vous supprimer ce citoyen?');"><i
                                                        class="bi bi-trash"></i> Supprimer
                                                </button>


                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="6">
                                        <span class="text-danger">
                                            <strong>Aucun citoyen trouvé!</strong>
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
