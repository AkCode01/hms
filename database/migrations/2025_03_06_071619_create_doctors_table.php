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
        Schema::create('doctors', function (Blueprint $table) {
                $table->id('doctor_id'); // Auto-increment primary key
                $table->string('dr_first_name', 100);
                $table->string('dr_last_name', 100);
                $table->string('dr_nic', 20);
                $table->string('dr_specialty', 150);
                $table->string('dr_contact', 20);
                $table->string('dr_email', 150);
                $table->text('dr_address')->nullable();
                $table->enum('dr_gender', ['Male', 'Female']);
                $table->string('dr_pic')->nullable();
                $table->string('dr_license_num', 100);
                $table->text('dr_credentials')->nullable();
                $table->integer('dr_experience')->default(0);
                $table->enum('dr_status', ['active', 'inactive'])->default('active');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
