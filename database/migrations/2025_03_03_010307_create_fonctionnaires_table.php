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
        Schema::create('fonctionnaires', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('datenaiss');
            $table->string('lieunaiss');
            $table->string('adresse');
            $table->string('tel');
            $table->string('email');
            $table->string('situation');
            $table->string('dateentree');
            $table->string('datefin')->nullable();
            $table->foreignId('categorie_id')->constrained();
            $table->string('cnss');
            $table->string('cnamgs');
            $table->string('rib');
            $table->string('banque');
            $table->string('photo')->nullable();
            $table->string('cv')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fonctionnaires');
    }
};
