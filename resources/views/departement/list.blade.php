@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Departments</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Departments</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="student-group-form">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search by ID ...">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search by Name ...">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search by Year ...">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="search-student-btn">
                        <button type="btn" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Departments</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="#" class="btn btn-outline-primary me-2"><i
                                            class="fas fa-download"></i> Download</a>
                                    <a href="add-department.html" class="btn btn-primary"><i
                                            class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>

                        <table
                            class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>
                                        <div class="form-check check-tables">
                                            <input class="form-check-input" type="checkbox"
                                                value="something">
                                        </div>
                                    </th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>HOD</th>
                                    <th>Started Year</th>
                                    <th>No of Students</th>
                                    <th>Sexe</th>
                                    <th>etat</th>
                                    <th>Fichier</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departements??[] as $departement )
                                <tr>
                                    <td>
                                        <div class="form-check check-tables">
                                            <input class="form-check-input" type="checkbox"
                                                value="something">
                                        </div>
                                    </td>
                                    <td>{{$departement->ID_depart}}</td>
                                    <td>{{$departement->name}}</td>
                                    <td>{{$departement->hod}}</td>
                                    <td>{{$departement->started_year}}</td>
                                    <td>{{$departement->no_etudiant}}</td>
                                    <td>{{$departement->sexe}}</td>
                                    <td>{{ $departement->etat == 1 ? 'Bon' : 'Mauvais' }}</td>
                                    <td>
                                        @if($departement->file_path)
                                        <a href="{{ asset('storage/' . $departement->file_path) }}" target="_blank" class="badge text-bg-primary">{{$departement->file_name}}</a>
                                    @else
                                        Aucun fichier
                                    @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="actions">
                                            @if($departement->file_path)
                                            <a href="{{ asset('storage/' . $departement->file_path) }}" class="btn btn-sm bg-success-light me-2" data-toggle="tooltip" data-placement="right" title="Voir le fichier">
                                                <i class="feather-eye"></i>
                                            </a>
                                            @endif
                                            
                                            <a href="{{ route('departement.mods', ['id' => $departement->id ]) }}" class="btn btn-sm bg-danger-light" data-toggle="tooltip" data-placement="right" title="Modifier">
                                                <i class="feather-edit" ></i>
                                            </a>
                                            
                                            <a href="{{ route('departement.delete', ['id' => $departement->id ]) }}" class="btn btn-sm bg-danger-light" data-toggle="tooltip" data-placement="right" title="Supprimer">
                                                <i class="feather-delete" ></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection