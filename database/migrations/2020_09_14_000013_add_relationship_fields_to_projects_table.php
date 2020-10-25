<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedInteger('type_id');
            $table->foreign('type_id', 'type_fk_2181866')->references('id')->on('project_types');
            $table->unsignedInteger('nature_id');
            $table->foreign('nature_id', 'nature_fk_2181867')->references('id')->on('project_natures');
            $table->unsignedInteger('directorate_id');
            $table->foreign('directorate_id', 'directorate_fk_2181889')->references('id')->on('directorates');
        });
    }
}
