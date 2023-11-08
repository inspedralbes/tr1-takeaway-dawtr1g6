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
        Schema::create('linia_de_pedidos', function (Blueprint $table) {
            $table->id();
            $table->decimal('unit_price', 10, 2); // precio del producto cuando se hizo uso de él
            $table->integer('quantity');
            $table->decimal('sumatori', 10, 2);
            $table->foreignId('pedido_id')->constrained();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liniaPedidos');
    }
};
