<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('section', ['men', 'women', 'kids']);
            $table->enum('category', [
                'kemeja',
                'kaos',
                'jaket',
                'celana_panjang',
                'celana_pendek',
                'hoodie',
                'dress',
                'rok',
                'sweater'
            ]);
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->json('images')->nullable();
            $table->decimal('ratings')->default(0);
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
