<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes demandes') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center mt-3 px-3">
            <div class="col-md-12">

                @session('success')
                    <div class="alert alert-success" role="alert">
                        {{ $value }}
                    </div>
                @endsession

                <div class="card">
                    <div class="card-header">Toutes mes demandes</div>
                    <div class="card-body">
                        @if(Auth::user()->isCitoyen())

                        <a href="{{ route('demandes.create') }}" class="btn btn-success btn-sm my-3">
                            <i class="bi bi-plus-circle mx-1"></i>
                            Faire une demande
                        </a>

                        @endif


                        <table class="table table-bordered mt-5 mytab">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Numéro</th>
                                    <th scope="col">Date</th>
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
                                        <td>{{ $demande->service()->intitulé }}</td>
                                        <td>
                                            <form action="{{ route('demandes.destroy', $demande->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')


                                                <a href="{{ route('demandes.show', $demande->id) }}"
                                                    class="btn btn-warning btn-sm mx-2"><i class="bi bi-eye"></i> Voir</a>



                                                @if(Auth::user()->isAdmin())
                                                <a href="{{ route('demandes.edit', $demande->id) }}"
                                                    class="btn btn-primary btn-sm mx-2"><i class="bi bi-pencil-square"></i>
                                                    Modifier</a>

                                                <button type="submit" class="btn btn-danger btn-sm mx-2"
                                                    onclick="return confirm('Voulez-vous supprimer cette demande?');"><i
                                                        class="bi bi-trash"></i> Supprimer
                                                </button>
                                                @endif




                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="6">
                                        <span class="text-danger">
                                            <strong>Vous n'avez aucune demande.</strong>
                                        </span>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
