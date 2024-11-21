<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('course_categories'))
        {
            Schema::create('course_categories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('category_image')->nullable();
                $table->string('status')->nullable();
                $table->longText('description')->nullable();
                $table->integer('workspace_id');
                $table->string('created_by');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_categories');
    }
};
