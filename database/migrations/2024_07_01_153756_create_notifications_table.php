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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Movie::class)->constrained();
            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->integer('tap');
            $table->text('noi_dung');
            $table->enum('trang_thai',['Đã fix','Chưa fix'])->default('Chưa fix');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
