<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des services') }}
        </h2>
    </x-slot>


    <div class="row justify-content-center mt-3">
        <div class="col-md-12">

            @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
            @endsession

            <div class="card">
                <div class="card-header">Liste des services</div>
                <div class="card-body">
                    <a href="{{ route('services.create') }}" class="btn btn-success btn-sm my-2"><i
                            class="bi bi-plus-circle"></i> Ajouter nouveau service</a>
                    <table class="table table-striped table-bordered">
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
                                                class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Voir</a>

                                            <a href="{{ route('services.edit', $service->id) }}"
                                                class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i>
                                                Modifier</a>

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Voulez-vous supprimer ce service?');"><i
                                                    class="bi bi-trash"></i> Supprimer</button>
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

                    {{ $services->links() }}

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
