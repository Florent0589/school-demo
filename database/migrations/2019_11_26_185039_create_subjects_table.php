<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('other_name')->nullable();
            $table->string('code')->nullable();
            $table->integer('user_id')->default(1);
            $table->float('passing_mark')->default(30);
            $table->integer('number_of_ca')->default(1);
            $table->float('ca_mark')->default(50);
            $table->float('exam_mark')->default(50);
            $table->integer('created_by')->default(1);
            $table->integer('status_id')->default(1);
            $table->timestamps();
        });

        Schema::table('grades', function (Blueprint $table) {
            $table->string('other_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
