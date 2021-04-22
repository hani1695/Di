@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Organismes</a></li>
        <li class="active">Liste Organismes</li>
    </ol>
@endsection

@section('content')
    <div class="row" style="margin-bottom: 100px;">

        <div class="col-lg">
            <div class="card">
                <div class="card-header"><strong>Créer un évènement</strong><small> Formulaire</small></div>
                <div class="card-header">
                    {{-- @if ($insertion == 1) --}}
                        <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Ajouter un organisme
                        </a>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="nom" class=" form-control-label">Nom <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="nom" placeholder="Nom de l'organisme" class="form-control"
                                            name="nom" autofocus>
                                    </div>                                    
                                    
                                    <div class="form-group">
                                        <label for="logo">Logo de l'organisme </label><span
                                        class="text-danger">*</span>
                                        <input type="file" class="form-control-file" id="logo" >
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class=" form-control-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" id="email" placeholder="Email du l'organisme" class="form-control"
                                            name="email" >
                                    </div>
                                    <div class="form-group">
                                        <label for="nom_reg" class=" form-control-label">Region <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="nom_reg" placeholder="Nom de la Region du l'organisme" class="form-control"
                                            name="nom_reg" autofocus>
                                    </div>

                                    
                                    @csrf
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block"
                                            onclick="enr(this)">
                                            <i class="fa fa-save fa-lg "></i>
                                            <span id="payment-button-amount">Enregistrer</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    {{-- @endif --}}
                </div>
                <div class="card-body card-block">



                    @include('organismes.tblaffichageorg')



                </div>

            </div>
        </div>
    </div>
@endsection
