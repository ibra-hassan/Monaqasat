<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOfficesTable extends Migration
{
    public function up()
    {
        Schema::table('offices', function (Blueprint $table) {
            $table->unsignedInteger('directorate_id');
            $table->foreign('directorate_id', 'directorate_fk_2061204')->references('id')->on('directorates');
        });
    }
}