<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTendersTable extends Migration
{
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->string('code', 50)->unique();
            $table->decimal('envelope_cost', 15, 0);
            $table->decimal('amount_warranty', 15, 0);
            $table->timestamp('last_date')->nullable();
            $table->timestamp('open_date')->nullable();
            $table->string('ad')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('required_docs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 25)->unique();
            $table->string('description', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('quantities', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 25)->unique();
            $table->string('description', 100)->nullable();
            $table->string('symbol', 10)->nullable();
        });

        Schema::create('quantity_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item', 50);
            $table->string('statement', 100)->nullable();
            $table->decimal('price', 15, 0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('estimated_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('cost_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item', 50);
            $table->string('statement', 100)->nullable();
            $table->decimal('price', 15, 0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('committees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('committee_members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->string('phone', 25)->nullable();
            $table->boolean('is_president')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tenders');
        Schema::dropIfExists('required_docs');
        Schema::dropIfExists('quantities');
        Schema::dropIfExists('units');
        Schema::dropIfExists('quantity_items');
        Schema::dropIfExists('estimated_costs');
        Schema::dropIfExists('cost_items');
        Schema::dropIfExists('committees');
    }
}
