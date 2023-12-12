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
        Schema::create('karangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('algae', 8, 2);
            $table->decimal('abiotik', 8, 2);
            $table->decimal('biota_lain', 8, 2);
            $table->decimal('karang_hidup', 8, 2);
            $table->decimal('karang_mati', 8, 2);
            $table->decimal('acb', 8, 2);
            $table->decimal('acd', 8, 2);
            $table->decimal('ace', 8, 2);
            $table->decimal('acs', 8, 2);
            $table->decimal('act', 8, 2);
            $table->decimal('cb', 8, 2);
            $table->decimal('cf', 8, 2);
            $table->decimal('ce', 8, 2);
            $table->decimal('cm', 8, 2);
            $table->decimal('cs', 8, 2);
            $table->decimal('cmr', 8, 2);
            $table->decimal('chl', 8, 2);
            $table->decimal('cme', 8, 2);
            $table->decimal('dc', 8, 2);
            $table->decimal('dca', 8, 2);
            $table->timestamps();

            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karangs');
    }
};
