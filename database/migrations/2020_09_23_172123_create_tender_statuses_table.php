<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('tender_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Title', 25)->unique();
            $table->string('Description', 100)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tender_statuses');
    }
}
