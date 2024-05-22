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
        Schema::create('veterinarians_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained();
            $table->foreignId("animal_id")->constrained();
            $table->string("animal_condition");
            $table->string("food");
            $table->integer("food_quantity");
            $table->text("details");
            $table->dateTime("visit_at");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veterinarians_reports');
    }
};
