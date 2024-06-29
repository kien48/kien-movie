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
        if (!Schema::hasTable('transaction_histories')) {
            Schema::create('transaction_histories', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(\App\Models\User::class)->constrained();
                $table->bigInteger('truoc_giao_dich');
                $table->bigInteger('sau_giao_dich');
                $table->string('bien_dong_so_du', 50);
                $table->text('mo_ta');
                $table->timestamps('ngay_tao');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_histories');
    }
};
