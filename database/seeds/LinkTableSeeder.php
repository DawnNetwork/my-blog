<?php

use Illuminate\Database\Seeder;

class LinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'link_name' => '思图素材网',
                'link_title' => 'laravel基础教程案例',
                'link_url' => 'http://www.tinkpic.com',
                'link_order' => 1,
            ],
            [
                'link_name' => '思图素材网',
                'link_title' => '个人学习总结与分享',
                'link_url' => 'http://shop.tinkpic.com',
                'link_order' => 2,
            ]
        ];
        DB::table('links')->insert($data);
    }
}
