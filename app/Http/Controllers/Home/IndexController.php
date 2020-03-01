<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Categroy;
use App\Models\Link;

class IndexController extends CommonController
{
	//网站首页
    public function index()
    {
        //点击量最高的6篇文章（站长推荐）
        $pics = Article::orderBy('art_view','desc')->take(6)->get();

        //点击量最高的6篇文章
        $hot = Article::orderBy('art_view','desc')->take(5)->get();

        //最新发布文章8篇
        $new = Article::orderBy('created_at','desc')->take(8)->get();

        //图文列表5篇（带分页）
        $data = Article::orderBy('created_at','desc')->paginate(5);

        //友情链接
        $links = Link::orderBy('link_order','asc')->get();

        return view('home.index',compact('hot','new','pics','data','links'));
    }
    //文章列表页
    public function cate($cate_id)
    {
        //图文列表4篇（带分页）
        $data = Article::where('cate_id',$cate_id)->orderBy('created_at','desc')->paginate(4);

        //查看次数自增
        Categroy::where('cate_id',$cate_id)->increment('cate_view');

        //当前分类的子分类
        $submenu = Categroy::where('cate_pid',$cate_id)->get();

        $field = Categroy::find($cate_id);
        return view('home.list',compact('field','data','submenu'));
    }
    //文章内容页
    public function article($art_id)
    {
        $field = Article::Join('categroys','articles.cate_id','=','categroys.cate_id')->where('art_id',$art_id)->first();

        //查看次数自增
        Article::where('art_id',$art_id)->increment('art_view');

        $article['pre'] = Article::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
        $article['next'] = Article::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();

        $data = Article::where('cate_id',$field->cate_id)->orderBy('art_id','desc')->take(6)->get();

        return view('home.new',compact('field','article','data'));
    }
}
 