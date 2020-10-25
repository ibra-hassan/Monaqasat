<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBudgetsTable extends Migration
{
    public function up()
    {
        Schema::table('budgets', function (Blueprint $table) {
            $table->unsignedInteger('financial_year_id');
            $table->foreign('financial_year_id', 'financial_year_fk_2181866')->references('id')->on('financial_years');
            $table->unsignedInteger('directorate_id');
            $table->foreign('directorate_id', 'directorate_fk_2181867')->references('id')->on('directorates');

            $table->unique(['financial_year_id', 'directorate_id']);
        });
    }
}
