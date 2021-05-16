@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Utilisateurs</a></li>
        <li class="active">Liste utilisateur</li>
    </ol>
@endsection

@section('content')
<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des utilisateurs</strong><small> filtre</small></div>
            @include('admin.messages')
            <div class="card-header">
                
            </div>
            <div class="card-body card-block">


                <
                @if (Session::has('event_id'))
                    <p>{{Session::get('event_id')  }}</p>   
                @endif



            </div>
               
        </div>
    </div>
</div> 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@endsection