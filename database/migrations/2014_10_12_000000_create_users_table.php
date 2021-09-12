<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            /**
             * Our Additions [TR: Bizim Eklediklerimiz]
             */

            # patient/dentist/admin [TR: Hasta / Dis Hekimi / Site Yoneticisi]
            $table->integer('role_id');
            $table->string('gender');
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('status')->nullable();
            $table->string('department')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
        });
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
