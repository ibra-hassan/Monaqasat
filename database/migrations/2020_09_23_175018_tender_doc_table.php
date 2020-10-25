<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TenderDocTable extends Migration
{
    public function up()
    {
        Schema::create('tender_required_doc', function (Blueprint $table) {
            $table->unsignedInteger('tender_id');
            $table->foreign('tender_id', 'tender_id_fk_2060379')->references('id')->on('tenders')->onDelete('cascade');
            $table->unsignedInteger('required_doc_id');
            $table->foreign('required_doc_id', 'required_doc_id_fk_2060379')->references('id')->on('required_docs')
                  ->onDelete('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('employee_id')->nullable();
            $table->foreign('employee_id', 'employee_id_fk_2062285')->references('id')->on('employees')
                  ->onDelete('cascade');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedInteger('employee_id')->nullable();
            $table->foreign('employee_id', 'employee_id_fk_2010285')->references('id')->on('employees')
                  ->onDelete('cascade');
        });

        Schema::table('quantities', function (Blueprint $table) {
            $table->unsignedInteger('tender_id');
            $table->foreign('tender_id', 'tender_id_fk_2012285')->references('id')->on('tenders')
                  ->onDelete('cascade');
        });

        Schema::table('quantity_items', function (Blueprint $table) {
            $table->unsignedInteger('unit_id');
            $table->foreign('unit_id', 'unit_id_fk_2089862')->references('id')->on('units')
                  ->onDelete('cascade');
            $table->unsignedInteger('quantity_id');
            $table->foreign('quantity_id', 'quantity_id_fk_231549')->references('id')->on('quantities')
                  ->onDelete('cascade');
        });

        Schema::table('estimated_costs', function (Blueprint $table) {
            $table->unsignedInteger('tender_id');
            $table->foreign('tender_id', 'tender_id_fk_223165')->references('id')->on('tenders')
                  ->onDelete('cascade');
        });

        Schema::table('cost_items', function (Blueprint $table) {
            $table->unsignedInteger('estimated_cost_id');
            $table->foreign('estimated_cost_id', 'estimated_cost_id_fk_298249')->references('id')->on('estimated_costs')
                  ->onDelete('cascade');
        });

        Schema::table('committees', function (Blueprint $table) {
            $table->unsignedInteger('project_id');
            $table->foreign('project_id', 'project_id_fk_298329')->references('id')->on('projects')
                  ->onDelete('cascade');
            $table->unsignedInteger('president_id')->nullable();
            $table->foreign('president_id', 'president_id_fk_293122')->references('id')->on('committee_members')
                  ->nullOnDelete();
        });

        Schema::table('committee_members', function (Blueprint $table) {
            $table->unsignedInteger('committee_id');
            $table->foreign('committee_id', 'committee_id_fk_286702')->references('id')->on('committees')
                  ->onDelete('cascade');
        });
    }

}
