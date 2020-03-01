<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table='articles';
    protected $primaryKey='art_id';
    protected $fillable = ['cate_id','art_title','art_tag','art_description','art_thumb','art_content','art_editor','art_view','created_at','updated_at'];//可以注入的数据字段

}
