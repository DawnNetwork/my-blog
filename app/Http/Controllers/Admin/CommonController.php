<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    //图片上传
    public function upload()
    {
        $file = Input::file('file');
        if($file -> isValid()){
            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;//重命名图片名称并且拼接上后缀
            $path = $file -> move(base_path().'/public/uploads',$newName);//存储图片路径设置
            $filepath = 'uploads/'.$newName;
            return $filepath;
        }
    }
}
