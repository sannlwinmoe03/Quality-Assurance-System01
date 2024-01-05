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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('username')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_updated')->default(false);      // redirect user to update password if the password has not been updated for the first time
            $table->integer('department_id');
            $table->integer('role_id');
            $table->softDeletes();
            $table->timestamps();
            $table->timestamp('last_login_at')->nullable();


            /** constraints */
            // $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('users', function(Blueprint $table) {
        //     $table->dropSoftDeletes();
        // });

        Schema::dropIfExists('users');
    }
};
