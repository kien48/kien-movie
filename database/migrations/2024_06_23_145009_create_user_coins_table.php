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
        if (!Schema::hasTable('user_coins')) {
            Schema::create('user_coins', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(\App\Models\User::class)->constrained();
                $table->integer('coin')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_coins');
    }
};
