@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Department</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="departments.html">Department</a></li>
                        <li class="breadcrumb-item active">Edit Department</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ isset($departement) ? route('departement.update', $departement->id) : route('departement.save') }}">
                            @csrf
                            @if(isset($departement))
                                @method('PUT')
                            @endif
                            
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Department Details</span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Department ID <span class="login-danger">*</span></label>
                                        <input type="text" name="ID_depart" class="form-control" value="{{isset($departement) ? $departement->ID_depart : ''}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Department Name <span class="login-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{isset($departement) ? $departement->name : ''}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Head of Department <span class="login-danger">*</span></label>
                                        <input type="text" name="hod" class="form-control" value="{{isset($departement) ? $departement->hod : ''}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Department Start Date <span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" name="started_year" type="date" value="{{isset($departement) ? $departement->started_year : ''}}" placeholder="DD-MM-YYYY">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>No of Students <span class="login-danger">*</span></label>
                                        <input type="number" name="no_etudiant" class="form-control" value="{{isset($departement) ? $departement->no_etudiant : ''}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
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