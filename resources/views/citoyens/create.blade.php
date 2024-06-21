<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creer citoyen') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center mt-3 px-2">
            <div class="col-md-8 offset-2">
                <div class="card my-3">
                    <div class="card-header">
                        Nouveau citoyen
                    </div>
                    <div class="card-body">
                        <form action="{{ route('citoyens.store') }}" method="POST">
                            @csrf
                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input id="nom" type="text" class="form-control"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="prenoms">Prenoms</label>
                                        <input id="prenoms" type="text" class="form-control"/>
                                    </div>
                                </div>
                            </div>



                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="date_naissance">Date de naissance</label>
                                        <input id="date_naissance" type="date" class="form-control"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="lieu_naissance">Lieu de naissance</label>
                                        <input id="lieu_naissance" type="text" class="form-control"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="sexe">Sexe</label>
                                        <select name="user" id="user" class="form-select">
                                            <option disabled>Selectionner sexe</option>
                                            <option value="Feminin">Feminin</option>
                                            <option value="Masculin">Masculin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="telephone">Telephone</label>
                                        <input id="telephone" type="text" class="form-control"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="cnib">CNIB</label>
                                        <input id="cnib" type="text" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="user">Utilisateur</label>
                                        <select name="user" id="user" class="form-select">
                                            <option disabled>Selectionner utilisateur</option>
                                            @foreach ($users as $user)
                                            <option value="{{$user}}">{{$user->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="row ">
                            <div class="col-3 offset-9 align-self-end d.flex">
                                <div class="btn-group ml-auto">
                                    <a  href="{{route('admin.citoyens')}}" class="btn btn-light btn-sm mx-1 " > Annuler</a>
                                    <button class="btn btn-primary btn-sm mx-1" type="submit"> Enregistrer</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
