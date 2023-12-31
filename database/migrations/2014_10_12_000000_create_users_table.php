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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('userLevel',['USER','RECRUITER','REQUESTER','MANAGER','ADMIN','SUPER'])->default('USER');
            $table->enum('userType', ['RECRUITER','MANAGER','SUPER','ADMIN','REQUESTER'])->default('REQUESTER');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('status', ['ACTIVE','INACTIVE'])->default('ACTIVE');
            $table->unsignedBigInteger('companyID')->nullable();
            $table->uuid('code')->default(DB::raw('(uuid())'));
            $table->unsignedBigInteger('createdBy')->nullable();
            $table->unsignedBigInteger('updatedBy')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
