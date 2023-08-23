<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vacancies_requested', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requesterUserID');
            $table->unsignedBigInteger('departmentID');
            $table->unsignedBigInteger('jobTitleID')->comment('cargo');
            $table->unsignedBigInteger('vacancyTypeID')->comment('tipo de vaga');
            $table->unsignedBigInteger('contractTypeID')->comment('tipo de contrato');
            $table->smallInteger('quantityOfVacancies')->default(1);
            $table->enum('status', ['REQUESTED','IN PROCESS','APPROVED','REJECTED','AWAITING PROCESS'])->default('REQUESTED');
            $table->longText('activityDescription')->nullable()->comment('descricao de atividade');
            $table->longText('knowledgeAndAbilities')->nullable()->comment('conhecimento s e habilidades');
            $table->dateTime('requisitionDate')->comment('data de requisição');
            $table->string('workload')->comment('carga horária');
            $table->string('onDuty')->comment('plantão');
            $table->string('scale')->comment('Escala');
            $table->string('workSchedule')->comment('horario de trabahlo');
            $table->string('requestReason')->comment('motivo da requisição');
            $table->string('employeeName')->nullable()->comment('nome do funcionario');;
            $table->string('recruitmentType')->nullable()->comment('tipo de recrutamento');
            $table->string('code')->default(DB::raw('(uuid())'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies_requested');
    }
};
