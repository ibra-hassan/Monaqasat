<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTendersTable extends Migration
{
    public function up()
    {
        Schema::table('tenders', function (Blueprint $table) {
            $table->unsignedInteger('project_id');
            $table->foreign('project_id', 'project_id_fk_3216579')->references('id')->on('projects')
                  ->onDelete('cascade');
            $table->unsignedInteger('tender_status_id')->nullable();
            $table->foreign('tender_status_id', 'tender_status_fk_2241867')->references('id')->on('tender_statuses');
            $table->unsignedInteger('employee_id')->nullable();
            $table->foreign('employee_id', 'employee_id_fk_2241867')->references('id')->on('employees');
        });

    }
}
