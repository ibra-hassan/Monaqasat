<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGeneralManagersTable extends Migration
{
    public function up()
    {
        Schema::table('general_managers', function (Blueprint $table) {
            $table->integer('manageable_id')->nullable();
            $table->string('manageable_type')->default('Null');
        });
    }
}
