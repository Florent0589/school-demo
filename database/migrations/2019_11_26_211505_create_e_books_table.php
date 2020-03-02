<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filename');
            $table->string('uuid');
            $table->string('size');
            $table->string('file_type');
            $table->integer('downloads')->default(0);
            $table->integer('downloadable')->default(1);
            $table->string('storage_path');
            $table->integer('created_by')->default(1);
            $table->integer('status_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('e_books');
    }
}
