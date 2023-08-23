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
            $table->unsignedBigInteger('requester');
            $table->unsignedBigInteger('department');
            $table->unsignedBigInteger('office');
            $table->unsignedBigInteger('vacancy_type');
            $table->unsignedBigInteger('contract_type');
            $table->smallInteger('quantity')->default(0);
            $table->enum('status', ['REQUESTED','IN PROCESS','APPROVED','REJECTED','AWAITING PROCESS'])->default('REQUESTED');
            $table->longText('description_activities')->nullable();
            $table->longText('knowleadge_and_skills')->nullable();
            $table->dateTime('request_date');
            $table->string('workload');
            $table->string('duty');
            $table->string('scale');
            $table->string('workschedule');
            $table->string('reasonof_request');
            $table->string('employee_name')->nullable();
            $table->string('typeof_recruitment')->nullable();
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
