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
        Schema::create('tbl_testimonials', function (Blueprint $table) {
            $table->increments("testimonil_id");
            $table->string("testimonil_name");
            $table->string("testimonil_image");
            $table->longText("testimonil_description");
            $table->integer("testimonil_status")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_testimonials');
    }
};
