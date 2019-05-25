<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministratorUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrator_user_roles', function (Blueprint $table) {
            $table->bigInteger('user_roles_id')
                ->unsigned();

            $table->foreign('user_roles_id')->references('id')
                ->on('user_roles')
                ->onDelete('cascade');

            $table->bigInteger('administrator_id')
                ->unsigned();

            $table->foreign('administrator_id')->references('id')
                ->on('administrators')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrator_user_roles');
    }
}
