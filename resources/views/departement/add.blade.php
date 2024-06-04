@extends('layouts.app')
@stack('scripts')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Add Department</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="departments.html">Department</a></li>
                        <li class="breadcrumb-item active">Add Department</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{route('departement.save')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Department Details</span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Department ID <span class="login-danger">*</span></label>
                                        <input type="text" name="ID_depart"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Department Name <span class="login-danger">*</span></label>
                                        <input type="text" name="name"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Head of Department <span class="login-danger">*</span></label>
                                        <input type="text" name="hod"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Department Start Date <span
                                                class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker"  name="started_year" type="date"
                                            placeholder="DD-MM-YYYY">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>No of Students <span class="login-danger">*</span></label>
                                        <input type="number"  name="no_etudiant" class="form-control">
                                    </div>
                                </div>
                                <div>
                                    <label for="etat" class="form-label">Sexe</label>
                                        <div class="mb-3 form-check">
                                            <input type="radio" class="form-check-input" id="publie" name="sexe" value="Homme" {{ isset($document) && $document->sexe == 1 ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="publie">Homme</label>
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="radio" class="form-check-input" id="non-publie" name="sexe" value="Femme" {{ isset($document) && $document->sexe == 0 ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="non-publie">Femme</label>
                                </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Etat <span class="login-danger">*</span></label>
                                        <select class="form-control" name="etat" id="extension" required>
                                            <option value="1">Bon</option>
                                            <option value="0">Mauvais</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="file" name="file" class="form-control" id="inputGroupFile02">
                                        <label class="input-group-text" for="inputGroupFile02" accept=".pdf,.doc,.docx,.xlsx,.png,.jpg" >Fichier</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection