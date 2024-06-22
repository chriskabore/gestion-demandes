<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creer service') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center mt-3 px-2">
            <div class="col-md-8 offset-2">
                <div class="card my-3">
                        <div class="card-header">
                        Details Service # {{$service->code}}
                        </div>
                        <div class="card-body">

                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="code">Code</label>
                                        <input disabled id="code"name="code" type="text" class="form-control" value="{{$service->code}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="intitulé">Intiulé</label>
                                        <input id="intitulé" disabled name="intitulé" type="text" class="form-control" value="{{$service->intitulé}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="frais_dossier">Frais de dossier</label>
                                        <input id="frais_dossier" disabled name="frais_dossier" type="text" class="form-control" value="{{$service->frais_dossier}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control"  disabled name="description" id="description">{{$service->description}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row border-top border border-light mt-3"></div>
                            <div class="row">
                                <div class="clearfix">
                                    <a href="{{route('services.edit', $service->id)}}" class="btn btn-success btn-sm my-3"><i class="bi bi-plus-circle mx-1"></i> Ajouter pièce</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
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
                                            @forelse($service->pieces as $piece)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>

                                                    <td>{{ $piece->intitulé }}</td>
                                                    <td>{{ $piece->description }}</td>
                                                    <td>
                                                        <form action="{{ route('services.detach.piece', $piece->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')

                                                            <a href="{{ route('pieces.show', $piece->id) }}"
                                                                class="btn btn-warning btn-sm mx-2"><i class="bi bi-eye"></i> Voir</a>






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
                                                        <strong>Aucune pièce n'a été ajouté!</strong>
                                                    </span>
                                                </td>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                        <div class="row ">
                            <div class="col-3 offset-9 align-self-end d.flex">
                                <div class="btn-group ml-auto">
                                    <a  href="{{route('admin.services')}}" class="btn btn-primary btn-sm mx-1 " > <i class="bi bi-arrow-left mx-1"></i> Retour</a>
                                </div>

                            </div>
                        </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
