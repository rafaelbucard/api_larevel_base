<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createalltable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cpf')->unique();
            $table->string('remember_token')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('avatar')->nullable();
            $table->string('permission')->nullable();
            $table->datetime('created_at');
            $table->datetime('updated_at');
        });
        Schema::create('day', function(Blueprint $table){
            $table->id();
            $table->string('user_name');
            $table->string('description');
            $table->datetime('created_at');

        });
        Schema::create('delivery', function(Blueprint $table){
            $table->id();
            $table->integer('id_day');
            $table->string('type_delivery');
            $table->string('user_name');
            $table->string('client');
            $table->text('description');
            $table->string('price');
            $table->datetime('created_at');
            $table->datetime('delivery_data');
            $table->string('status');

        });
        /*
        Schema::create('Product', function(Blueprint $table){
            $table->id();
            $table->integer('number');
            $table->string('name');
            $table->string('price');
           

        }); */
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('day');
        Schema::dropIfExists('delivery');
        //Schema::dropIfExists('product');
    }
}
