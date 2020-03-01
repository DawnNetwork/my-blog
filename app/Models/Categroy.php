<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categroy extends Model
{
    protected $table='categroys';
    protected $primaryKey='cate_id';
    protected $guarded=[];
    //public $timestamps=false;
    public function tree()
    {
    	$categorys = $this->orderBy('cate_order','asc')->get();
        return $this->getTree($categorys,'cate_name','cate_id','cate_pid');
    }
    //static将tree()转变成静态方法
    // public static function tree()
    // {
    // 	$categorys = Categroy::all();
    //     return (new Categroy)->getTree($categorys,'cate_name','cate_id','cate_pid');
    // }
    //在无限极循环的遍历过程中用到递归循环来遍历数据
    public function getTree($data,$field_name,$field_id='id',$field_pid='pid',$pid=0)
    {
        $arr = array();
        foreach ($data as $k=>$v){
            if($v->$field_pid==$pid){
                $data[$k]["_".$field_name] = $data[$k][$field_name];
                $arr[] = $data[$k];
                foreach ($data as $m=>$n){
                    if($n->$field_pid == $v->$field_id){
                        $data[$m]["_".$field_name] = '├─ '.$data[$m][$field_name];
                        $arr[] = $data[$m];
                    }
                }
            }
        }
        return $arr;
    }   
}
