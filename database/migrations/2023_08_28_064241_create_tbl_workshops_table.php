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
        Schema::create('tbl_workshops', function (Blueprint $table) {
            $table->increments("workshop_id");
            $table->string("workshop_name");
            $table->string("workshop_image");
            $table->longText("workshop_description");
            $table->integer("workshop_status")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_workshops');
    }
};
