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
        //Create column user_id and create FK to relationship 'user_id' column to users table
        Schema::table('listas', function (Blueprint $table){
            $table->unsignedBigInteger('user_id');
        });
        Schema::table('listas', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Delete FK and column user_id
        Schema::table('listas', function (Blueprint $table){
            $table->dropForeign('listas_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
