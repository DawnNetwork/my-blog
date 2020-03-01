<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Nav;
use App\Models\Article;
use Illuminate\Support\Facades\View;

class CommonController extends Controller
{
	//在继承控制器中创建一个魔术方法，并用门脸方式分享到所有被继承控制器中。
    public function __construct()
    {
        //点击量最高的6篇文章
        $hot = Article::orderBy('art_view','desc')->take(5)->get();

        //最新发布文章8篇
        $new = Article::orderBy('created_at','desc')->take(8)->get();

        $navs = Nav::all();
        View::share('navs',$navs);
        View::share('hot',$hot);
        View::share('new',$new);
    }
}
