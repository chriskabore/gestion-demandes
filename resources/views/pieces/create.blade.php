<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creer pièce') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center mt-3 px-2">
            <div class="col-md-8 offset-2">
                <div class="card my-3">
                    <form action="{{ route('pieces.store') }}" method="POST">
                            @csrf
                        <div class="card-header">
                            Nouvelle pièce
                        </div>
                        <div class="card-body">
                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="intitulé">Intitulé</label>
                                        <input id="intitulé" name="intitulé" type="text" class="form-control"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control" cols="10" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                        <div class="row ">
                            <div class="col-3 offset-9 align-self-end d.flex">
                                <div class="btn-group ml-auto">
                                    <a  href="{{route('admin.pieces')}}" class="btn btn-light btn-sm mx-1 " > Annuler</a>
                                    <button class="btn btn-primary btn-sm mx-1" type="submit"> Enregistrer</button>
                                </div>

                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
