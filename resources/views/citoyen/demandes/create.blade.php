<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Faire ma demande') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center mt-3 px-2">
            <div class="col-md-8 offset-2">
                <div class="card my-3">
                    <form action="{{ route('demandes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="card-header">
                            Nouvelle demande
                        </div>
                        <div class="card-body">

                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="service_id">Utilisateur</label>
                                        <select name="service_id" id="service-select" class="form-select">
                                            <option disabled selected>Selectionner un service</option>
                                            @foreach ($services as $service)
                                            <option value="{{$service->id}}">{{$service->intitulé}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="numero">Numero</label>
                                        <input id="numero" name="numero" type="text" class="form-control"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input id="date" name="date" type="date" class="form-control"/>
                                    </div>
                                </div>
                            </div>


                            <div class="row my-2" id="pieces-container" style="display: none">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="pieces">Pièces</label>
                                        <div id="piece-uploads">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                        <div class="row ">
                            <div class="col-3 offset-9 align-self-end d.flex">
                                <div class="btn-group ml-auto">
                                    <a  href="{{route('citoyen.mes.demandes')}}" class="btn btn-light btn-sm mx-1 " > Annuler</a>
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
    <!-- get service pieces  script-->

    <script>
        $(document).ready(function() {
            $('#service-select').change(function() {
                var serviceId = $(this).val();
                if (serviceId) {
                    $('#pieces-container').show();
                    $.ajax({
                        url: '/services/' + serviceId + '/pieces',
                        crossDomain: true,
                        headers: {
                            "accept": "application/json",
                            "Access-Control-Allow-Origin":"*"
                        },
                        type: 'GET',
                        success: function(data) {
                            //var $labelHtml = '';
                            //var $fileInputHtml = '';
                            var pieceHtml =$('<div/>').attr('class', 'form-control mt-2');

                            $.each(data, function(index, piece) {

                                var $labelHtml = $('<label/>')
                                .attr('for', 'piece-'+piece.id)
                                .attr('class', 'form-label')
                                .text(piece.intitulé).appendTo(pieceHtml);
                              var $fileInputHtml = $('<input/>')
                                .attr('type', 'file')
                                .attr('name', 'piece-'+piece.id)
                                .attr('class', 'form-control')
                                .attr('id', 'piece-'+piece.id).appendTo(pieceHtml);


                            });

                            $('#piece-uploads').html(pieceHtml);
                        },
                        error: function() {
                            $('#piece-uploads').html('<p>Could not retrieve pieces.</p>');
                        }
                    });
                } else {
                    $('#pieces-container').show();

                }
            });
        });
    </script>



</x-app-layout>
