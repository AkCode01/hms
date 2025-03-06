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
        Schema::create('hospitals', function (Blueprint $table) {
            $table->bigIncrements('hospital_id'); // Custom Primary Key
            $table->string('hospital_name');
            $table->string('hospital_code')->unique(); // Unique hospital code
            $table->string('hospital_address');
            $table->string('hospital_contact_number');
            $table->string('hospital_email')->unique()->nullable(); // Unique & Nullable
            $table->string('hospital_website')->nullable();
            $table->enum('hospital_status', ['active', 'inactive'])->default('active'); // Use ENUM
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitals');
    }
};
