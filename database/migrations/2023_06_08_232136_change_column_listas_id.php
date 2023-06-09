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
        //Change column name 
        Schema::table("produtos", function(Blueprint $table){
            $table->dropForeign("produtos_listas_id_foreign");
            $table->renameColumn('`listas_id`','lista_id');
            $table->foreign('lista_id')->references('id')->on('listas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Reverse change column name
        Schema::table("produtos", function(Blueprint $table){
            $table->dropForeign("produtos_lista_id_foreign");
            $table->renameColumn('`lista_id`', 'listas_id');
            $table->foreign("listas_id")->references('id')->on("listas");
        });
    }
};
