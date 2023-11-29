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
        Schema::create('tbl_blogs', function (Blueprint $table) {
            $table->increments("blog_id");
            $table->string("blog_name");
            $table->string("blog_image");
            $table->longText("blog_description");
            $table->integer("blog_status")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_blogs');
    }
};
