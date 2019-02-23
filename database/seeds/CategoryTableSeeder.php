<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoryTableSeeder extends Seeder
{
    /**
     * 顶级分类
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'id' => 1,
            'sort' => 0,
            'name' => '顶级分类',
            'p_id' => 0,
            'alias' => 'top'
        ]);
    }
}
