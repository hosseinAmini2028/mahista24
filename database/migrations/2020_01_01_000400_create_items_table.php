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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('logo_image')->nullable();
            $table->string('main_image');
            $table->unsignedInteger('price')->nullable();
            $table->json('image_gallery');
            $table->json('contact_data');
            $table->json('social_links')->default('[]');
            $table->json('location')->nullable();
            $table->foreignId('categore_id')->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->enum('status',[0,1])->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
