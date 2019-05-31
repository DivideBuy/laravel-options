<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_options', function (Blueprint $table) {
            $table->increments('id')->comment('Option Id Value');
            $table->string('key')->unique()->comment('Option Key: Searchable and Indexed Unique');
            $table->text('value')->nullable()->comment('Option Value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('db_options');
    }
}
