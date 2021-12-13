<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateUsersTable extends Migration
{
    /**
     * @description Migration database connection.
     */
    protected $connection = 'mysql';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('_id')->unique();
//            $table->charset = 'utf8mb4';
//            $table->collation = 'utf8mb4_unicode_ci';

            $table->string('city');
            $table->string('provider_id')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('adress')->nullable();
            $table->string('postcode')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable(); // Null for creating new users depending on OAuth providers.
            $table->string('payment_method');
            $table->string('payment_status');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
