<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGovernorsTable extends Migration
{
    public function up()
    {
        Schema::table('governors', function (Blueprint $table) {
            $table->unsignedInteger('province_id')->unique();
            $table->foreign('province_id', 'province_fk_2061183')->references('id')->on('provinces');
        });
    }
}
