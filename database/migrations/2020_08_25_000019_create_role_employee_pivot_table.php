<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleEmployeePivotTable extends Migration
{
    public function up()
    {
        Schema::create('employee_role', function (Blueprint $table) {
            $table->unsignedInteger('employee_id');
            $table->foreign('employee_id', 'employee_id_fk_2060385')->references('id')->on('employees')->onDelete('cascade');
            $table->unsignedInteger('role_id');
            $table->foreign('role_id', 'role_id_fk_2060385')->references('id')->on('roles')->onDelete('cascade');
        });
    }
}
