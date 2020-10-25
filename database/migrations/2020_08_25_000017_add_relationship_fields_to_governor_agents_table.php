<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGovernorAgentsTable extends Migration
{
    public function up()
    {
        Schema::table('governor_agents', function (Blueprint $table) {
            $table->unsignedInteger('governor_id');
            $table->foreign('governor_id', 'governor_fk_2061211')->references('id')->on('governors');
        });
    }
}