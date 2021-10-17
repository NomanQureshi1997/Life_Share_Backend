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
            // $table->foreignId('ngo_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('blood_group');
            $table->string('phone');
            $table->float('age');
            $table->date('idle_date')->nullable();
            $table->date('active_date')->nullable();
            $table->boolean('is_active')->nullable();
            $table->softDeletes('deleted_at');
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
