<?php

namespace Database\Factories;

use App\Models\Departement;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartementFactory extends Factory
{
    protected $model = Departement::class;

    public function definition()
    {

        $fileNameWithExtension = 'null';
        // Générer un nom de fichier complet avec une extension
        // Répertoire où se trouvent les fichiers
        $directory = storage_path('fakefile');

        if (is_dir($directory) && $files = glob($directory . '/*.*')) {
            // Sélectionner un fichier aléatoire dans le répertoire
            $randomFile = $this->faker->randomElement($files);
            // Extraire le nom de fichier avec l'extension
            $fileNameWithExtension = pathinfo($randomFile, PATHINFO_BASENAME);
        }

        return [
            'ID_depart' => $this->faker->unique()->bothify('DEP###'),
            'name' => $this->faker->word,
            'hod' => $this->faker->name,
            'started_year' => $this->faker->date,
            'no_etudiant' => $this->faker->numberBetween(50, 500),
            'sexe' => $this->faker->randomElement(['Homme', 'Femme']),
            'etat' => $this->faker->randomElement(['1', '0']),
            'file_path' => $fileNameWithExtension ? $directory . '/' . $fileNameWithExtension : 'null',
            'file_name' => $fileNameWithExtension,
        ];
    }
}
