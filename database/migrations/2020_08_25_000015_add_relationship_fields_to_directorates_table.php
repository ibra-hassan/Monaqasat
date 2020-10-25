<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDirectoratesTable extends Migration
{
    public function up()
    {
        Schema::table('directorates', function (Blueprint $table) {
            $table->unsignedInteger('province_id');
            $table->foreign('province_id', 'province_fk_2061197')->references('id')->on('provinces');
        });
    }
}
