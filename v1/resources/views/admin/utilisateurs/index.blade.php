@extends('admin.master')
@section('ol-title')    
    <h1>gestions</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li>Comptes</li>
        <li class="active">Liste des utilisateurs</li>
    </ol>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <strong class="card-title">Liste des utilisateurs</strong>
    </div>
    {{-- optionelle --}}
    <div class="card-header">
        <button class="btn btn-info ">Lorem, ipsum.</button>
    </div>
    {{--  --}}
    <div class="card-body">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Fonction</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $user->matricule }}</td>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->fonction }}</td>
                </tr>             
                    
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection