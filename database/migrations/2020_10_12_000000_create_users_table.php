<?php

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->enum('title',['user','company','admin']);
            $table->timestamps();
        });

        // Roles seeding
        $user = new Role();
        $user->title = 'user';
        $user->save();

        $company = new Role();
        $company->title = 'company';
        $company->save();

        $admin = new Role();
        $admin->title = 'admin';
        $admin->save();

        //=============================================================================================================

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('job_title')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->date('birth_date')->nullable();
            $table->text('cover_letter')->nullable();
            $table->foreignId('image_id')->nullable()->constrained();
            $table->foreignId('role_id')->default('1')->constrained();
            $table->string('company_name')->nullable();
            $table->rememberToken();
            $table->timestamp('blocked_at')->nullable();
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
}
