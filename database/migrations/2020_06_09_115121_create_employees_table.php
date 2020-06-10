<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',100)->nullable(false);
            $table->string('last_name',100)->nullable(false);
            $table->string('email',100);
            $table->string('phone',50);
            $table->bigInteger('company_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('employees', function(Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
