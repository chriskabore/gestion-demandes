<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des pièces') }}
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
                    <div class="card-header">Liste des pièces</div>
                    <div class="card-body">
                        @if(Auth::user()->isAdmin())

                        <a href="{{ route('pieces.create') }}" class="btn btn-success btn-sm my-3">
                            <i class="bi bi-plus-circle mx-1"></i>
                            Ajouter nouvelle pièce
                        </a>
                        @endif


                        <table class="table table-bordered mt-5 mytab">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Intitulé</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pieces as $piece)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $piece->intitulé }}</td>
                                        <td>{{ $piece->description }}</td>
                                        <td>
                                            <form action="{{ route('pieces.destroy', $piece->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{ route('pieces.show', $piece->id) }}"
                                                    class="btn btn-warning btn-sm mx-1"><i class="bi bi-eye"></i> Voir</a>

                                                    <a href="{{ route('pieces.edit', $piece->id) }}"
                                                    class="btn btn-primary btn-sm mx-1"><i class="bi bi-pencil-square"></i>
                                                    Modifier</a>

                                                    <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                    onclick="return confirm('Voulez-vous supprimer cette pièce?');"><i
                                                        class="bi bi-trash"></i> Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="6">
                                        <span class="text-danger">
                                            <strong>Aucune pièce trouvée!</strong>
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
