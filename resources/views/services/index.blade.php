<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Services disponibles') }}
        </h2>
    </x-slot>


        <div class="row justify-content-center mt-3 px-2">
            <div class="col-md-12">

                @session('success')
                    <div class="alert alert-success" role="alert">
                        {{ $value }}
                    </div>
                @endsession

                <div class="card">
                    <div class="card-header">Liste des services</div>
                    <div class="card-body">
                        @if(Auth::user()->isAdmin())

                        <a href="{{ route('services.create') }}" class="btn btn-success btn-sm my-3">
                            <i class="bi bi-plus-circle mx-1"></i>
                            Ajouter nouveau service
                        </a>

                        @endif


                        <table class="table table-bordered mt-5 mytab">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Intitulé</th>
                                    <th scope="col">Frais de dossier</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($services as $service)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $service->code }}</td>
                                        <td>{{ $service->intitulé }}</td>
                                        <td>{{ $service->frais_dossier }}</td>
                                        <td>
                                            <form action="{{ route('services.destroy', $service->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{ route('services.show', $service->id) }}"
                                                    class="btn btn-warning btn-sm mx-2"><i class="bi bi-eye"></i> Voir</a>

                                                    @if(Auth::user()->isCitoyen())

                                                    <a href="{{ route('demandes.create') }}" class="btn btn-primary btn-sm my-3">
                                                        <i class="bi bi-clipboard2 mx-1"></i>
                                                        Demander service
                                                    </a>

                                                    @endif

                                                @if(Auth::user()->isAdmin())
                                                    <a href="{{ route('services.edit', $service->id) }}"
                                                    class="btn btn-primary btn-sm mx-1"><i class="bi bi-pencil-square"></i>
                                                    Modifier</a>

                                                    <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                    onclick="return confirm('Voulez-vous supprimer ce service?');"><i
                                                        class="bi bi-trash"></i> Supprimer
                                                </button>

                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="6">
                                        <span class="text-danger">
                                            <strong>Aucun service trouvé!</strong>
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
