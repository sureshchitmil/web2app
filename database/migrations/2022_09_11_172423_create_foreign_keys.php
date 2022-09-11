<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('tabs', function (Blueprint $table) {
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('user_agents', function (Blueprint $table) {
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('floating_buttons', function (Blueprint $table) {
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('walkthroughs', function (Blueprint $table) {
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('right_header_icons', function (Blueprint $table) {
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('menus', function (Blueprint $table) {
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('left_header_icons', function (Blueprint $table) {
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('app_settings', function (Blueprint $table) {
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });
    }
}
