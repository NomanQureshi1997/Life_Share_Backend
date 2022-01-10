<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ngo_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->integer('age');
            $table->integer('weight');
            $table->string('blood');
            $table->string('gender');
            $table->string('address');
            $table->string('city');
            $table->string('phone');
            $table->string('email')->unique();
            $table->timestamp('last_donated')->nullable();
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
        Schema::dropIfExists('donors');
    }
}
