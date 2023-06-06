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
        //Create FK relationship with listas
        Schema::table("produtos", function (Blueprint $table){
            $table->foreign('listas_id')->references('id')->on('listas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Drop FK relationship with listas
        Schema::table('produtos', function(Blueprint $table){
            $table->dropForeign('produtos_listas_id_foreign');
        });
    }
};
