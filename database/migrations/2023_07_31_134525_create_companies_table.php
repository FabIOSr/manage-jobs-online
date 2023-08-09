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
            $table->string('alias_name')->nullable();
            $table->string('social_name')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('complement ')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->enum('status', ['ACTIVE','INACTIVE', 'PENDING PAYMENT'])->default('ACTIVE');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->uuid('code')->default(DB::raw('(uuid())'));
            $table->string('email')->nullable();
            $table->string('due_date')->nullable();
            $table->unsignedBigInteger('owner')->nullable();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
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
