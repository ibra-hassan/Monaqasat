<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectoratesTable extends Migration
{
    public function up()
    {
        Schema::create('directorates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('phone')->unique();
            $table->bigInteger('total_budget')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
