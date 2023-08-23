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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('document')->nullable()->unique();
            $table->string('shortName')->nullable();
            $table->string('companyName')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('address')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('neighbourhood')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->enum('status', ['ACTIVE','INACTIVE', 'PENDING PAYMENT'])->default('ACTIVE');
            $table->unsignedBigInteger('companyID')->nullable();
            $table->uuid('code')->default(DB::raw('(uuid())'));
            $table->string('email')->nullable();
            $table->string('dueDate')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('owner')->nullable();
            $table->unsignedBigInteger('createdBy')->nullable();
            $table->unsignedBigInteger('updatedBy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
