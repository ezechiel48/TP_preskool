<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('departements', function (Blueprint $table) {
        $table->id();
        $table->string('ID_depart', 200);
        $table->string('name', 200)->nullable();
        $table->string('hod', 200);
        $table->date('started_year');
        $table->integer('no_etudiant');
        $table->string('sexe', 10);
        $table->boolean('etat')->default(false);
        $table->timestamps();
    });
}

/**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departements');
    }

};
