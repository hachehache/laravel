<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiquette_plat', function (Blueprint $table) {
    
            $table->foreignId('etiquette_id')->references('id')->on
            ('etiquette');
            $table->foreignId('plat_id')->references('id')->on
            ('plat');
        });
        //modification de la table plat
        schema::table('plat', function (Blueprint $table){
            // creation d'une clef etrangere qui relie un plat et sa photo
            $table->foreignId('photo_plat_id')->references('id')->on
            ('photo_plat');
            // creation d'un index ( facilite la recherche rapide) pour la clef étrangere
            $table->index('photo_plat_id');
            
            // creation d'une clef etrangere qui relie un plat et sa categorie
            $table->foreignId('categorie_id')->references('id')->on
            ('categorie');  
            // creation d'un index ( facilite la recherche rapide) pour la clef étrangere
            $table->index('categorie_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etiquette_plat');

        // modification de la table plat
        Schema::table('plat', function (Blueprint $table) {
            $table->dropIndex(['photo_plat_id']);
            $table->dropForeign(['photo_plat_id']);
            $table->dropColumn('photo_plat_id');

            $table->dropIndex(['categorie_id']);
            $table->dropForeign(['categorie_id']);
            $table->dropColumn('categorie_id');
    });
}
};
