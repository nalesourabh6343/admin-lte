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
        Schema::create('tbl_consultancies', function (Blueprint $table) {
            $table->increments("consultancy_id");
            $table->string("consultancy_name");
            $table->string("consultancy_image");
            $table->longText("consultancy_description");
            $table->integer("consultancy_status")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_consultancies');
    }
};
