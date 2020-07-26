<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsActivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins_activations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admins_id')->unsigned();
            $table->foreign('admins_id')->references('id')->on('admins')->onDelete('cascade');
            $table->string('token');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::table('admins', function (Blueprint $table) { 

            $table->boolean('is_activated')->default(0);

        });

        Schema::table('users', function (Blueprint $table) { 

            $table->dropColumn('is_activated')->default(0);

        });

        Schema::drop('users_activations');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins_activations');
    }
}
