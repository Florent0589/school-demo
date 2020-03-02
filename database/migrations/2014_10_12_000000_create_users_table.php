<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username');
            $table->date('date_of_birth');
            $table->integer('identification_type_id');
            $table->string('id_number')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->default('noimage.png');
            $table->integer('role_id');
            $table->integer('status_id')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        //add super user
        DB::table('users')->insert(
            [
                'first_name' => 'Administrator',
                'last_name' => 'Default',
                'username' => 'Admin',
                'date_of_birth' => '1989-05-20',
                'identification_type_id' => 1,
                'id_number' => '8905206100143',
                'passport_number' => null,
                'email' => 'administrator@default.com',
                'password' => Hash::make('902000916Aa!'),
                'role_id' => 1,
            ]
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
