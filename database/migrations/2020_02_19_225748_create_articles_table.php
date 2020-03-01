<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('art_id');
            $table->integer('cate_id')->default('')->comment('分类ID');
            $table->string('art_title')->comment('标题');
            $table->string('art_tag')->default('')->comment('关键词');
            $table->string('art_description')->default('')->comment('描述');
            $table->string('art_thumb')->default('')->comment('缩略图');
            $table->string('art_content')->comment('内容');
            $table->string('art_editor')->default('')->comment('作者');
            $table->string('art_view')->default(0)->comment('次数');
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
        Schema::dropIfExists('articles');
    }
}
