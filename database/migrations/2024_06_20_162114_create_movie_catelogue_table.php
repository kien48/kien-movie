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
        Schema::create('movie_catelogue', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Movie::class)->constrained();
            $table->foreignIdFor(\App\Models\Catelogue::class)->constrained();
            $table->primary(['movie_id', 'catelogue_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_catelogue');
    }
};
