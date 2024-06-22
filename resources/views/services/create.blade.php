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
                    <form action="{{ route('services.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                        Nouveau service
                        </div>
                        <div class="card-body">

                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="code">Code</label>
                                        <input id="code"name="code" type="text" class="form-control"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="intitulé">Intiulé</label>
                                        <input id="intitulé" name="intitulé" type="text" class="form-control"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="frais_dossier">Frais de dossier</label>
                                        <input id="frais_dossier" name="frais_dossier" type="text" class="form-control"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="pieces">Pièces</label>
                                        <select  id="pieces" name="pieces_ids[]" multiple class="form-control">
                                            <option disabled value="">Selectionner les pièces requises</option>
                                            @foreach ($pieces as $piece )
                                            <option value="{{$piece->id}}">{{$piece->intitulé}}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                        <div class="row ">
                            <div class="col-3 offset-9 align-self-end d.flex">
                                <div class="btn-group ml-auto">
                                    <a  href="{{route('admin.services')}}" class="btn btn-light btn-sm mx-1 " > Annuler</a>
                                    <button class="btn btn-primary btn-sm mx-1" type="submit"> Enregistrer</button>
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
