@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Department</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('departement.list') }}">Department</a></li>
                        <li class="breadcrumb-item active">Edit Department</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('departement.update', $departement->id) }}">
                            @csrf
                            @if ($departement)
                            @method('PUT')  
                            @endif
                            
                            
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Department Details</span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Department ID <span class="login-danger">*</span></label>
                                        <input type="text" name="ID_depart" class="form-control" value="{{ $departement->ID_depart }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Department Name <span class="login-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{ $departement->name }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Head of Department <span class="login-danger">*</span></label>
                                        <input type="text" name="hod" class="form-control" value="{{ $departement->hod }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Department Start Date <span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" name="started_year" type="date" value="{{ $departement->started_year }}" placeholder="DD-MM-YYYY">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>No of Students <span class="login-danger">*</span></label>
                                        <input type="number" name="no_etudiant" class="form-control" value="{{ $departement->no_etudiant }}">
                                    </div>
                                </div>
                                <div>
                                    <label for="etat" class="form-label">Sexe</label>
                                        <div class="mb-3 form-check">
                                            <input type="radio" class="form-check-input" id="publie" name="sexe" value="Homme" {{ isset($departement) && $departement->sexe == 'Homme' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="publie">Homme</label>
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="radio" class="form-check-input" id="non-publie" name="sexe" value="Femme" {{ isset($departement) && $departement->sexe == 'Femme' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="non-publie">Femme</label>
                                </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Etat <span class="login-danger">*</span></label>
                                        <select class="form-control" name="etat" id="extension" required>
                                            <option value="1" {{ isset($departement) && $departement->etat == "1" ? "selected" : "" }}>Bon</option>
                                            <option value="0" {{ isset($departement) && $departement->etat == "0" ? "selected" : "" }}>Mauvais</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    @if(isset($departement) && $departement->file_path)
                                    <small class="form-text text-muted">
                                        Fichier actuel : <a href="{{ asset('storage/' . $departement->file_path) }}" target="_blank">{{ $departement->file_name }}</a>
                                    </small>
                                    @endif
                                    <div class="input-group mb-3">
                                        <input type="file" name="file" class="form-control" id="inputGroupFile02">
                                        <label class="input-group-text" for="inputGroupFile02" accept=".pdf,.doc,.docx,.xlsx,.png,.jpg" >Fichier</label>
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

@push('scripts')
<script>
    // Ajouter un écouteur pour le succès de la soumission du formulaire
    document.getElementById('updateForm').addEventListener('submit', function (event) {
        // Empêcher la soumission normale du formulaire
        event.preventDefault();
        
        // Envoyer une requête Ajax au lieu d'une soumission de formulaire normale
        axios.put(this.action, new FormData(this))
            .then(response => {
                // Afficher une alerte SweetAlert2
                Swal.fire({
                    title: 'Mise à jour réussie',
                    text: 'Le département a été mis à jour avec succès.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000 // Délai de 2 secondes avant le déclenchement de l'événement then
                }).then((result) => {
                    // Vérifier si l'action est déclenchée par le délai de la temporisation
                    if (result.dismiss === Swal.DismissReason.timer) {
                        // Rediriger vers la liste des départements après le délai
                        window.location.href = "{{ route('departement.list') }}";
                    }
                });
            })
            .catch(error => {
                // Afficher une alerte SweetAlert2 en cas d'erreur
                Swal.fire({
                    title: 'Erreur!',
                    text: 'Une erreur s\'est produite lors de la mise à jour du département.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
    });
</script>
@endpush



@endsection