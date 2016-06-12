<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('data_path')->nullable();
            $table->string('data_mime')->nullable();
            $table->string('data_ori_filename')->nullable();
            $table->tinyInteger('due')->nullable();
            $table->integer('budget')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('verified')->default(false);
            $table->boolean('claimed')->default(false);
            $table->integer('claimed_user_id')->nullable()->index();
            $table->boolean('completed')->default(false);
            $table->boolean('closed')->default(false);
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
        Schema::drop('tasks');
    }
}
