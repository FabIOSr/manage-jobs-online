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
            $table->unsignedBigInteger('type_of_vacancy');
            $table->unsignedBigInteger('type_of_contract');
            $table->smallInteger('quantity')->default(0);
            $table->enum('status', ['REQUESTED','IN PROCESS','APPROVED','REJECTED','AWAITING PROCESS'])->default('REQUESTED');
            $table->longText('description')->nullable();
            $table->dateTime('request_date');
            $table->string('weekly_load');
            $table->string('reason_for_replacement');
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
