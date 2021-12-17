<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');            
            $table->dateTime('ngay_sinh')->nullable();
            $table->tinyInteger('gioi_tinh')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('so_dt')->nullable();
            $table->text('anh')->nullable();
            $table->unsignedInteger('chuc_danh')->nullable();
            $table->unsignedInteger('bo_phan')->nullable();
            $table->tinyInteger('trang_thai')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('chuc_danh')->references('id')->on('tbl_chucdanh');
            $table->foreign('bo_phan')->references('id')->on('tbl_bophan');
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
    }
}
