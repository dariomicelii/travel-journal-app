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
        Schema::table('trips', function (Blueprint $table) {
            //Rimuoviamo la colonna rating

            $table->dropColumn('rating');
            $table->foreignId('rating_id')->nullable()->constrained();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->string('rating')->nullable();
            $table->dropForeign("trips_rating_id_foreign");
            $table->dropColumn('rating_id');
        });
    }
};
