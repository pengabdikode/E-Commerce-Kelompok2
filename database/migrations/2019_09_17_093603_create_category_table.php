<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('photo');
            $table->string('url');
            $table->timestamps();
        });

        Schema::create('brand', function (Blueprint $table) {
               $table->Increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('logo');
            $table->string('url');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->double('harga');
            $table->string('foto');
            $table->text('description');
            $table->integer('status');
            $table->unsignedinteger('id_category');
            $table->foreign('id_category')
                ->references('id')
                ->on('categories');
            $table->unsignedinteger('id_brand');
            $table->foreign('id_brand')
                ->references('id')
                ->on('brand');
            $table->timestamps();
        });

        Schema::create('stock', function (Blueprint $table) {
           $table->Increments('id');
            $table->string('size');
            $table->bigInteger('amount');
            $table->unsignedinteger('id_product');
            $table->foreign('id_product')
                ->references('id')
                ->on('products');
            $table->timestamps();
        });

         Schema::create('bank', function (Blueprint $table) {
         $table->Increments('id');
         $table->string('name');
         $table->integer('code');
         $table->timestamps();
     });  

        Schema::create('transaksi', function (Blueprint $table) {
         $table->Increments('id');
         $table->unsignedinteger('id_user');
         $table->foreign('id_user')
         ->references('id')
         ->on('users');
         $table->string('size');
         $table->bigInteger('amount');
         $table->double('amount_money');
         $table->unsignedinteger('id_bank');
         $table->foreign('id_bank')
         ->references('id')
         ->on('bank');
         $table->unsignedinteger('id_product');
         $table->foreign('id_product')
         ->references('id')
         ->on('products');
         $table->timestamps();
     });   

        Schema::create('income', function (Blueprint $table) {
         $table->Increments('id');
         $table->unsignedinteger('id_user');
         $table->foreign('id_user')
         ->references('id')
         ->on('users');
         $table->string('payment_method');
         $table->unsignedinteger('id_bank');
         $table->foreign('id_bank')
         ->references('id')
         ->on('bank');
         $table->double('amount_money');
         $table->string('status');
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
        Schema::dropIfExists('categories');
        Schema::dropIfExists('brand');
        Schema::dropIfExists('products');
        Schema::dropIfExists('stock');
        Schema::dropIfExists('bank');
        Schema::dropIfExists('transaksi');
        Schema::dropIfExists('income');
    }
}
