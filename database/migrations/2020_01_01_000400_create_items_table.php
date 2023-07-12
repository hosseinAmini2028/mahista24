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
            $table->text('description')->after('title')->nullable();
            $table->string('main_image');
            $table->unsignedInteger('price')->nullable();
            $table->longText('image_gallery');
            $table->longText('contact_data');
            $table->longText('social_links')->nullable();
            $table->longText('location')->nullable();
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
