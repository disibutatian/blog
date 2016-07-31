<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterfacePerfomanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interface_perfomance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('interface_id');
            $table->bigInteger('project_id');
            $table->bigInteger('server_id');
            $table->bigInteger('machine_room_id');
            $table->bigInteger('province_id');
            $table->bigInteger('response_time');
            $table->float('ave_link_time');
            $table->float('ave_process_time');
            $table->float('error_rate');
            $table->float('ave_page_size');
            $table->float('score');
            $table->timestamp('timestamp');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('interface_perfomance');
    }
}
