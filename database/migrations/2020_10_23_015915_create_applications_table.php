<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->json('skills')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')
                ->on('users')
                ->references('id')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('applications', function (Blueprint $table) {
            $table->primary(['job_id','user_id']);
            $table->foreignId('job_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('status',['applied','rejected','accepted']);
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
        Schema::dropIfExists('job');
        Schema::dropIfExists('applications');
    }
}
