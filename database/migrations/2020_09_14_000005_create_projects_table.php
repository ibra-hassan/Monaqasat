<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('target_number');
            $table->string('description')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->tinyInteger('estimated_year')->nullable();
            $table->decimal('cost_primary', 15, 0);
            $table->string('file_path')->unique()->nullable();
            $table->boolean('is_accepted')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
