<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->bigIncrements('conf_id');
            $table->string('conf_title')->nullable($value = true)->comment('//标题');
            $table->string('conf_name')->nullable($value = true)->comment('//名称');
            $table->string('conf_content')->nullable($value = true)->comment('//变量值');
            $table->string('conf_order')->nullable($value = true)->comment('//排序');
            $table->string('conf_tips')->nullable($value = true)->comment('//描述');
            $table->string('field_type')->nullable($value = true)->comment('//字段类型');
            $table->string('field_value')->nullable($value = true)->comment('//类型值');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
