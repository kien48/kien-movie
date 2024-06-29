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
        if (!Schema::hasTable('posts')) {
            Schema::create('posts', function (Blueprint $table) {
                $table->id();
                $table->string('tieu_de');
                $table->text('noi_dung');
                $table->string('anh')->nullable();
                $table->bigInteger('luot_xem')->default(0);
                $table->foreignIdFor(\App\Models\User::class)->constrained();
                $table->foreignIdFor(\App\Models\CateloguePost::class)->constrained();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
