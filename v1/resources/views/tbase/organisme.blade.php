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
                <div class="card-header"><strong>Liste Organismes</strong><small> Table</small></div>
                <div class="card-header">
                    @if ($privilege->insertion)
                        <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Ajouter un organisme
                        </a>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">

                                <form action="{{ route('tbase.ajouter_organisme') }}" method="post" enctype="multipart/form-data" >
                                    {{-- <div class="form-group">
                                        <label for="nom" class=" form-control-label">Nom <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="nom" placeholder="Nom du l'organisme" class="form-control"
                                            name="nom" autofocus>
                                    </div> --}}
                                    <div class="form-group ">
                                        <label for="nom" class=" form-control-label">Nom<span class="text-danger">*</span></label>
                                        <input type="text" id="nom" placeholder="nom" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}"autofocus>
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div> 

                                    {{-- <div class="form-group">
                                        <label for="logo">Logo du l'organisme </label><span class="text-danger">*</span>
                                        <input type="file" class="form-control-file" id="logo">
                                    </div> --}}
                                    <div class="form-group ">
                                        <label for="logo" class=" form-control-label">Logo du l'organisme<span class="text-danger">*</span></label>
                                        <input type="file" id="logo" placeholder="logo" class="form-control-file @error('logo') is-invalid @enderror" name="logo"  accept=".image/jpeg,image/png" value="{{ old('logo') }}"autofocus >
                                        {{-- <input type="file" value="" accept=".image/jpeg,image/png" name="logo" class="form-control"  > --}}
                                        @error('logo')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div> 
                                    {{-- <div class="form-group">
                                        <label for="email" class=" form-control-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" id="email" placeholder="Email du l'organisme"
                                            class="form-control" name="email">
                                    </div> --}}
                                    <div class="form-group ">
                                        <label for="email" class=" form-control-label">Email<span class="text-danger">*</span></label>
                                        <input type="email" id="email" placeholder="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div> 
                                    <div class="form-group ">
                                        <label for="phone" class=" form-control-label">phone<span class="text-danger">*</span></label>
                                        <input type="phone" id="phone" placeholder="ex:0555 5555 55" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"autofocus>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div> 
                                    
                                    {{-- <div class="form-group">
                                        <label for="description" class=" form-control-label">Region <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="nom_reg" placeholder="Nom de la Region du l'organisme"
                                            class="form-control" name="nom_reg" autofocus>
                                    </div> --}}
                                    <div class="form-group ">
                                        <label for="nom_reg" class=" form-control-label">Region<span class="text-danger">*</span></label>
                                        <input type="text" id="nom_reg" placeholder="nom_reg" class="form-control @error('nom_reg') is-invalid @enderror" name="nom_reg" value="{{ old('nom_reg') }}"autofocus>
                                        @error('nom_reg')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div>
                                    <div class="form-group ">
                                        <label for="description" class=" form-control-label">description<span class="text-danger">*</span></label>
                                        <input type="textarea" id="description" placeholder="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"autofocus>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div>
                                    
                                    <livewire:wilaya-commune>

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
                    @endif
                </div>
                <div class="card-body card-block">



                    <div class="row ">
                        
                        @foreach ($organismes as $organisme)
                       
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="
                                {{  asset('storage/logoOrganisme/'.$organisme->logo)}}"" class="card-img-top" alt="">
                                <div class="card-body">
                                  <h5 class="card-title ml-3"><u>{{$organisme->nom}}</u></h5>                                  
                                    
                                      <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo[{{ $loop->index }}]" aria-expanded="false" aria-controls="collapseTwo">
                                          Voir le détail
                                        </button>
                                      </h2>
                                    
                                    <div id="collapseTwo[{{ $loop->index }}]" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                      <div class="card-body">
                                        {{-- {{$organisme->description}} --}}
                                        {{$organisme->description}}</div>
                                    </div>                                  
                                  
                                </div>
                              </div>
                        </div>              
                             
                        
                        @endforeach

                    </div>



                </div>

            </div>
        </div>
    </div>
@endsection
