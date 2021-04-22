@extends('admin.master')
@section('ol-title')
    <h1>Pas d'accès</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="/">Accueil</a></li>
        <li class="active">Pas d'accès</li>
    </ol>
@endsection


@section('content')

        <div class="fondecran    sm:block">
            
            <h1>Accès restreint</h1>
            <p>Vous n'avez pas accès à cette rubrique.</p>

            <img src="{{ asset('images/acces_interdit.gif') }}" alt="DIMA" >

        </div> 
        
@endsection               