<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            
            $table->string('name',40);
            $table->integer('age');
            $table->string('address',100)->nullable();
            $table->double('contactno',10,0);
            $table->string('email',50);
            $table->integer('active');
            $table->unsignedBigInteger('companyid');
            $table->timestamps();
        });
    }

    /**$cust1
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
