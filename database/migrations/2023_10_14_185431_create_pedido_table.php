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
        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->decimal('total', 10,2)->nullable();
            $table->string('tipo_pedido')->nullable();  //Proforma - Oficial
            $table->string('tipo_pago')->nullable();    //Qr - Tarjeta - Efectivo

            $table->unsignedBigInteger("cliente_id")->nullable();
            $table->foreign('cliente_id')->on('users')->references('id')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido');
    }
};
