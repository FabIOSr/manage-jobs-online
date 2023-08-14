<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vagas_solicitadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('solicitante');
            $table->unsignedBigInteger('departamento');
            $table->unsignedBigInteger('cargo');
            $table->unsignedBigInteger('tipo_vaga');
            $table->unsignedBigInteger('tipo_contrato');
            $table->smallInteger('quantidade')->default(0);
            $table->enum('status', ['SOLICITADO','EM PROCESSO','APROVADO','REJEITADO','AGUARDANDO PROCESSO'])->default('SOLICITADO');
            $table->longText('descricao')->nullable();
            $table->dateTime('data_solicitacao');
            $table->string('codigo')->default(DB::raw('(uuid())'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vagas_solicitadas');
    }
};
