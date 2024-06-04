<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DepartementController extends Controller
{
    public function index()
    {
        $departements= Departement::all();
        return view('departement.add', compact('departements'));
    }

    public function index2()
    {
        $departements = Departement::all();
        return view('departement.list', compact('departements'));
    }

    public function index3()
    {
        $departements= Departement::all();
        return view('departement.edit',compact('departements'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'ID_depart' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'hod' => 'required|string|max:255',
            'started_year' => 'required|date',
            'no_etudiant' => 'required|integer',
            'sexe' => 'required|string|max:10',
            'etat' => 'required|boolean',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xlsx,png,jpg|max:10248', // Validation du fichier
        ]);
    
        // Vérification si un fichier est envoyé avec la requête
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('documents', 'public');
            $fileName = $request->file('file')->getClientOriginalName();
        }
    
        // Création d'un tableau avec les données du formulaire
        $data = [
            'ID_depart' => $request->input('ID_depart'),
            'name' => $request->input('name'),
            'hod' => $request->input('hod'),
            'started_year' => $request->input('started_year'),
            'no_etudiant' => $request->input('no_etudiant'),
            'sexe' => $request->input('sexe'),
            'etat' => $request->input('etat'),
            'file_path' => $filePath ?? null,
            'file_name' => $fileName ?? null, //garder le nom du fichier original
        ];
    
        // Création d'un nouveau département avec les données et enregistrement dans la base de données
        Departement::create($data);
    
        // Redirection vers la liste des départements avec un message de succès
        return redirect()->route('departement.list')->with('success', 'Département créé avec succès');
    }
    



    public function edit($id)
{
    $departement = Departement::findOrFail($id);
    return view('departement.mods', compact('departement'));
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_depart' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'hod' => 'required|string|max:255',
            'started_year' => 'required|date',
            'no_etudiant' => 'required|integer',
            'sexe' => 'required|string|max:10',
            'etat' => 'required|boolean',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xlsx,png,jpg|max:10240', // Validation du fichier
        ]);

        $departement = Departement::findOrFail($id);

        if ($request->hasFile('file')) {
            // Supprimer le fichier précédent s'il existe
            if ($departement->file_path) {
                Storage::disk('public')->delete($departement->file_path);
            }
            
            // Téléchargez le nouveau fichier
            $filePath = $request->file('file')->store('documents', 'public');
            $fileName = $request->file('file')->getClientOriginalName();
            $departement->file_path = $filePath;
            $departement->file_name = $fileName;
        }



        $departement->update([
            'ID_depart' => $request->input('ID_depart'),
            'name' => $request->input('name'),
            'hod' => $request->input('hod'),
            'started_year' => $request->input('started_year'),
            'no_etudiant' => $request->input('no_etudiant'),
            'sexe' => $request->input('sexe'),
            'etat' => $request->input('etat'),
            'file_path' => $departement->file_path,
            'file_name' => $departement->file_name,
        ]);

        return redirect()->route('departement.list')->with('success', 'Département mis à jour avec succès');
    }

    public function delete($id)
    {
        $departement = Departement::findOrFail($id);
        $departement->delete();

        return redirect()->back()->with('success', 'Département supprimé avec succès');
    }
}
