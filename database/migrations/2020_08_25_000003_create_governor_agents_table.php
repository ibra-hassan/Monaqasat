<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGovernorAgentsTable extends Migration
{
    public function up()
    {
        Schema::create('governor_agents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('phone')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}